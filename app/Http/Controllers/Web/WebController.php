<?php

namespace App\Http\Controllers\Web;

use Carbon\Carbon;
use App\Models\Page;
use App\Models\User;
use App\Models\Client;
use App\Models\Bundle;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\BundleReview;
use Illuminate\Http\Request;
use App\Services\PageService;
use App\Models\ProductReview;
use App\Jobs\SendContactEmailJob;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\Web\SidebarService;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendResetPasswordEmailJob;
use Illuminate\Support\Facades\Validator;
use App\Models\Porduct; // Assuming Porduct is a model for products
use App\Models\ProductCategory;
use App\Models\ProductTag;

class WebController extends SidebarService
{

    public function category($slug = null)
    {
        $minPrice = request('min_price', 0);
        $maxPrice = request('max_price', 10000);
        $sort = request('sort');
        $sort = $sort ?? 'latest';
        $tagIds = request('tags', []);
        if ($slug) {
            $category = ProductCategory::where('slug', $slug)->firstOrFail();
            $query = $category->products()->where('status', 1)->with(['firstImage:id,product_id,image_url']);
        }else{
            $query = Product::where('status', 1)->with(['firstImage:id,product_id,image_url']);
        }

        $query->select('id', 'product_name', 'slug', 'regular_price', 'sale_price', 'discount_percentage');

        if ($minPrice !== null && $maxPrice !== null) {
            $query->whereBetween('sale_price', [$minPrice, $maxPrice]);
        }

        // Tag filter
        if (!empty($tagIds)) {
            $query->whereHas('tags', function ($q) use ($tagIds) {
                $q->whereIn('product_tags.id', $tagIds);
            });
        }

        switch ($sort) {
            case 'price_asc':
                $query->orderBy('sale_price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('sale_price', 'desc');
                break;
            case 'best_selling':
                $query->withSum('orderDetails', 'quantity')->orderBy('order_details_sum_quantity', 'desc');
                break;
            case 'rating':
                $query->withAvg('productReviews', 'rating')->orderBy('product_reviews_avg_rating', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }
        $categoryProducts = $query->paginate(12)->appends(request()->query());

        $productBundles = $this->productBundles();
        $specialOffers = $this->specialOffers();
        $categories = ProductCategory::where('status', 1)->get(['id', 'name', 'slug']);
        $tags =ProductTag::where('status', 1)->get(['id', 'name', 'slug']);

        return view('Web.Layout.pages.category', compact('categoryProducts', 'productBundles', 'specialOffers', 'categories', 'tags'));
    }


    public function bundle()
    {
        $productBundles = Bundle::select('id', 'name', 'icon_path')->with(['firstImage:id,bundle_id,image_url'])->where('status', 1)->orderBy('id', 'desc')->paginate(10);
        return view('Web.Layout.pages.bundle', compact('productBundles'));
    }
    public function bundleDetails($id)
    {

        $bundle = Bundle::with([
            'bundleImages:id,bundle_id,image_url',
            'products:id,product_name,slug,regular_price,sale_price,discount_percentage',
            'bundleReviews:id,bundle_id,rating,review,user_id',
        ])
        ->withAvg('bundleReviews', 'rating')
        ->where('id', $id)
        ->where('status', 1)
        ->firstOrFail();

        $userReview = null;
        if (auth()->check()) {
            $userReview = BundleReview::where('bundle_id', $bundle->id)
                ->where('user_id', auth()->id())
                ->first();
        }

        $productBundles = $this->productBundles();
        $bestSellingProducts = $this->bestSellingProducts();
        return view('Web.Layout.pages.bundle-details', compact('bundle', 'productBundles', 'bestSellingProducts', 'userReview'));
    }
    public function productDetails($slug)
    {

        $product = Product::with([
            'brands:id,name',
            'categories:id,name,slug',
            'tags:id,name',
            'images:id,product_id,image_url',
            'videos:id,product_id,video_url',
            'productReviews:id,product_id,rating,review,user_id',
        ])
        ->withAvg('productReviews', 'rating')
        ->where('slug', $slug)
        ->where('status', 1) // ✅ Only fetch if product is active
        ->firstOrFail();

        $userReview = null;
        if (auth()->check()) {
            $userReview = ProductReview::where('product_id', $product->id)
                ->where('user_id', auth()->id())
                ->first();
        }

        $productBundles = $this->productBundles();
        $bestSellingProducts = $this->bestSellingProducts();
        $relatedProducts = $this->getRelatedProducts($product);
        $alreadyInWishlist = false;
        if (auth()->check()) {
            $alreadyInWishlist = auth()->user()->wishlists()
                ->where('product_id', $product->id)
                ->exists();
        }

        return view('Web.Layout.pages.product-details', compact('product', 'productBundles', 'bestSellingProducts', 'userReview', 'relatedProducts', 'alreadyInWishlist'));
    }
    private function getRelatedProducts(Product $product)
    {
        // Ensure categories are loaded
        $categoryIds = $product->categories()->pluck('id');

        return Product::select('id', 'product_name', 'regular_price', 'sale_price', 'discount_percentage', 'slug')
            ->with(['firstImage:id,product_id,image_url'])
            ->where('status', 1)
            ->where('id', '!=', $product->id)
            ->whereHas('categories', function ($query) use ($categoryIds) {
                $query->whereIn('id', $categoryIds);
            })
            ->inRandomOrder()
            ->take(4)
            ->get();
    }

    /**
     * Shows the about us page.
     *
     * @return \Illuminate\Http\Response
     */

    public function aboutUs()
    {
        $data = (new PageService)->getAboutUsData();
        $data['clients'] = Client::where('status', 1)->get();
        return view('Web.Layout.pages.about-us', $data);
    }

    //search
    public function search(Request $request)
    {
        $data['search'] = $request->search;
        $data['products'] = Product::with('firstImage')->where('product_name', 'like', '%' . $data['search'] . '%')->paginate(16);
        $data['productBundles'] = $this->productBundles();
        $data['specialOffers'] = $this->specialOffers();
        return view('Web.Layout.pages.search', $data);
    }

    //search suggestions
    public function searchSuggestions(Request $request)
    {
        $query = $request->query('query');
        $products = Product::with('firstImage')
        ->where('product_name', 'like', '%' . $query . '%')
        ->select('id', 'product_name', 'regular_price', 'sale_price', 'discount_percentage', 'slug')
        ->take(5)
        ->get()
        ->map(function($product){
            return [
                'id' => $product->id,
                'product_name' => $product->product_name,
                'regular_price' => $product->regular_price,
                'sale_price' => $product->sale_price,
                'discount_percentage' => $product->discount_percentage, 
                'slug' => $product->slug,
                'image_url' => $product->firstImage?->image_url ? asset($product->firstImage?->image_url) : asset('web_assets/images/product-img/default.jpg'),
            ];
        });
        return response()->json($products);
    }

    //forgot password
    public function forgotPassword()
    {
        return view('Web.Layout.pages.forgot-password');
    }

    //forgot password post
    public function forgotPasswordPost(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        $token = Str::random(60);
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $token,
                'created_at' => now(),
            ]
        );

        $url = url('/reset-password/' . $token);
        SendResetPasswordEmailJob::dispatch($user, $url);
        
        return redirect()->back()->with('success', 'We have e-mailed your password reset link!');
    }

    //reset password
    public function resetPassword($token)
    {
        return view('Web.Layout.pages.reset-password', compact('token'));
    }

    //reset password post
    public function resetPasswordPost(Request $request, $token)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8|max:50',
            'password_confirmation' => 'required|string|min:8|max:50|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //check if token is expired
        $passwordReset = DB::table('password_reset_tokens')->where('token', $token)->first();
        if (!$passwordReset) {
            return redirect()->back()->with('error', 'Invalid token');
        }
        if (Carbon::parse($passwordReset->created_at)->addMinutes(60)->isPast()) {
            return redirect()->back()->with('error', 'Token expired');
        }

        $user = User::where('email', $passwordReset->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        DB::table('password_reset_tokens')->where('email', $user->email)->delete();
        return redirect()->back()->with('success', 'Password reset successfully');
    }

    public function productQuickView(Request $request)
    {
        $product = Product::with([
            'brands:id,name',
            'categories:id,name,slug',
            'tags:id,name',
            'images:id,product_id,image_url',
            'productReviews:id,product_id,rating,review,user_id',
        ])
        ->withAvg('productReviews', 'rating')
        ->where('id', $request->id)
        ->where('status', 1)
        ->firstOrFail();

        $alreadyInWishlist = false;
        if (auth()->check()) {
            $alreadyInWishlist = auth()->user()->wishlists()
                ->where('product_id', $product->id)
                ->exists();
        }

        $html = view('Web.Layout.partials.product.quick-view-modal', compact('product', 'alreadyInWishlist'))->render();

        return response()->json(['html' => $html]);
    }

    //contact
    public function contact()
    {
        $data['contact'] = (new PageService)->getContactUsData();
        return view('Web.Layout.pages.contact', $data);
    }

    //contact submit
    public function contactSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'captcha' => 'required|captcha',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        SendContactEmailJob::dispatch($request->only('name', 'email', 'subject', 'message'), config('app.admin_email'));
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }


    public function privacyPolicy()
    {
        $data['privacyPolicy'] = Page::where('slug', 'privacy-policy')->first();
        return view('Web.Layout.pages.privacy-policy', $data);
    }
    public function termsCondition()
    {
        $data['termsCondition'] = Page::where('slug', 'terms-condition')->first();
        return view('Web.Layout.pages.terms-condition', $data);
    }
}
