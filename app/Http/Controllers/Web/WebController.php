<?php

namespace App\Http\Controllers\Web;

use Carbon\Carbon;
use App\Models\Page;
use App\Models\User;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\PageService;
use App\Jobs\SendContactEmailJob;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendResetPasswordEmailJob;
use Illuminate\Support\Facades\Validator;
use App\Models\Porduct; // Assuming Porduct is a model for products

class WebController extends Controller
{
    public function category()
    {
        return view('Web.Layout.pages.category');
    }
    public function bundle()
    {
        return view('Web.Layout.pages.bundle');
    }
    public function bundleDetails()
    {
        return view('Web.Layout.pages.bundle-details');
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
        return view('Web.Layout.pages.product-details', compact('product'));
    }

    public function aboutUs()
    {
        $data = (new PageService)->getAboutUsData();
        $data['clients'] = Client::where('status', 1)->get();
        return view('Web.Layout.pages.about-us', $data);
    }
    public function search()
    {
        return view('Web.Layout.pages.search');
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
    public function cart()
    {
        return view('Web.Layout.pages.cart');
    }
    public function checkout()
    {
        return view('Web.Layout.pages.checkout');
    }
}
