<?php

namespace App\Http\Controllers\Web;

use Cart;
use App\Models\City;
use App\Models\Order;
use App\Models\State;
use App\Models\Coupon;
use App\Models\Country;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Wishlist;
use App\Models\CouponCat;
use App\Models\CouponUser;
use Illuminate\Http\Request;
use App\Models\CouponProduct;
use App\Models\VariantOption;
use App\Models\ProductVariant;
use App\Services\CouponService;

use App\Http\Controllers\Controller;
use App\Services\Web\ProductService;
use App\Services\Web\SidebarService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends SidebarService
{
    protected $productService;
    protected $couponService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
        // $this->couponService = $couponService;
    }
    public function cart(){

        $cartContents = Cart::getContent();
        $cartSubtotal = Cart::getSubTotal();
        // $outOfStockItems = $this->productService->productStockCheck($cartContents);
        $outOfStockItems = [];

        $productBundles = $this->productBundles();
        $bestSellingProducts = $this->bestSellingProducts();

        // dd($cartContents, $outOfStockItems);
        return view('Web.Layout.pages.cart', compact('cartContents','cartSubtotal','outOfStockItems','productBundles','bestSellingProducts'));
    } 

    public function addToCart(Request $request)
    {
        $request->validate([
            'quantity' => 'required|min:1|max:100',
        ]);

        $salePrice = null;
        $regularPrice = null;
        $product =  Product::with('images')->find($request->product_id);
        if(empty($product)){
            return response()->json(['status' => '404', 'message' => 'Product not found']);
        }
        $product_image = $product->firstImage->image_url;


        // Check if the product is already in the cart
        $existingItem = Cart::get($product->id);
        if(!empty($existingItem)){
            $totalQty = $existingItem->quantity + $request->quantity;
        }else{
            $totalQty = $request->quantity;
        }
        // return response()->json($existingItem->quantity);  
        if ($product->quantity > 0  && $totalQty <= $product->quantity ) {
            {
                $salePrice = $product->sale_price;
                $regularPrice = $product->regular_price;
                $data = array();
                $data['id'] = $product->id;
                $data['name'] = $product->product_name;
                $data['price'] = $salePrice;
                $data['attributes']['slug'] = $product->slug;
                $data['attributes']['regular_price'] = $regularPrice;
                $data['attributes']['sale_price'] = $salePrice;
                $data['attributes']['product_image'] = $product_image;
                $data['attributes']['product_id'] = $product->id;

                if ($existingItem) {
                    // If the product exists, increase its quantity
                    // Increment the quantity
                    Cart::update($product->id, array(
                        'quantity' => $request->quantity ?? 1
                    ));
                } else {
                    // If the product doesn't exist in the cart, set quantity to 1 and add it
                    $data['quantity'] = $request->quantity ?? 1; // Set quantity to 1
                    Cart::add($data);
                }
            }
        }else{
            return response()->json(['status'=> 'out-of-stock', 'message'=>'Product out of stock']);
        }
        
        $cartData = Cart::getContent();
        $cartSubtotal = Cart::getSubTotal();
        $miniart = view('Web.Layout.partials.cart.minicart', compact('cartData','cartSubtotal'))->render();
        return response()->json(['status' => 'success', 'message' => 'Product added to cart successfully!', 'cart_count' => Cart::getTotalQuantity(),'minicart'=>$miniart]);
    }
    // public function updateCart(Request $request){
    //     $request->validate([
    //         'rowId' => ['required', 'array'],
    //         'rowId.*' => ['required', 'integer'],
    //         'qty' => ['required', 'array'],
    //         'qty.*' => ['required', 'integer', 'min:1', 'max:100'],
    //     ]);

    //     foreach ($request->rowId as $key => $rowId) {
    //         $cartItem = Cart::get($rowId);
    //         if ($cartItem) {
    //             $quantity = $request->qty[$key];

    //             Cart::update($rowId, [
    //                 'quantity' => [
    //                     'relative' => false,
    //                     'value' => $quantity,
    //                 ],
    //             ]);
    //         }
    //     }
    //     // $this->couponService->couponReValidate();
    //     return back()->with('success', 'Cart updated successfully');
    // }
    public function updateCart(Request $request)
    {
        $cart = Cart::getContent();

        // Build a map of [rowId => requestedQty]
        $requestedQuantities = [];
        foreach ($request->rowId as $index => $rowId) {
            $requestedQuantities[$rowId] = $request->qty[$index];
        }

        // Pass cart and requested quantities for validation
        $stockIssues = $this->productService->productCartStockCheck($cart, $requestedQuantities);

        $failedRowIds = array_column($stockIssues, 'rowId');
        $messages = array_column($stockIssues, 'message');

        foreach ($requestedQuantities as $rowId => $quantity) {
            if (in_array($rowId, $failedRowIds)) continue;

            Cart::update($rowId, [
                'quantity' => [
                    'relative' => false,
                    'value' => $quantity,
                ],
            ]);
        }

        if (!empty($messages)) {
            return back()->withErrors([
                'stock_errors' => $messages,
                'out_of_stock_ids' => $failedRowIds,
            ]);
        }

        return back()->with('success', 'Cart updated successfully');
    }




    public  function removeSingleItem($rowID){
        Cart::remove($rowID);
        // $this->couponService->couponReValidate();
        return back()->with('success','Item successfully removed from cart');
    }

    public function removeSingleItemAjax($rowID){
        Cart::remove($rowID);
        return response()->json([
            'status' => 'success',
            'message' => 'Product successfully removed from cart!',
            'cart_count' => Cart::getTotalQuantity(),
            'cartSubtotal'=> Cart::getSubTotal(), 
            'couponDiscountAmount'=> Session::get('coupon_amount'),
            'coupon_code'=>Session::get('coupon_code')
        ]);
    }

    public  function removeAllItem(){
        Cart::clear();
        $this->couponService->removeCouponSession();
        return back()->with('success','Item successfully removed from cart');
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'nullable|string|max:100',
        ]);

        if (Session::has('coupon_code')) {
            return response()->json(['success' => false, 'message' => 'You can apply only one coupon at a time']);
        }

        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Please login to continue'], 401);
        }

        $coupon = Coupon::where('coupon_code', $request->coupon_code)->where('status', 1)->first();

        if (!$coupon) {
            return response()->json(['success' => false, 'message' => 'Coupon is invalid']);
        }

        $couponUsed = Order::where('user_id', Auth::id())->where('coupon_id', $coupon->id)->count();

        $today = now()->format('Y-m-d');
        $start = $coupon->start_date->format('Y-m-d');
        $expire = $coupon->expire_date ? $coupon->expire_date->format('Y-m-d') : null;

        if ($expire && $today > $expire) {
            return response()->json(['success' => false, 'message' => 'Coupon is expired']);
        }

        if ($today < $start) {
            return response()->json(['success' => false, 'message' => 'Coupon is not active yet']);
        }

        if ($coupon->coupon_usage === 1 && $coupon->usage_limit && $coupon->usage_limit <= $couponUsed) {
            return response()->json(['success' => false, 'message' => 'Coupon usage limit reached']);
        }

        $result = $this->couponAmountByType($coupon);
        if ($result['coupon-error']) {
            return response()->json(['success' => false, 'message' => $result['message']]);
        }

        // If success, store in session
        Session::put('coupon_code', $request->coupon_code);

        $html = view('layouts.partials.checkout-summary')->render();

        if (request()->ajax()) {
            return response()->json(['success' => true, 'message' => $result['message'], 'html' => $html]);
        }
        return back()->with('success', $result['message']);

    }

    public  function couponAmountByType($coupon)
    {
        $cartSubTotal = Cart::getSubTotal();
        $couponDiscountAmount = 0;
        // check coupon type
        // fixed amount in bdt
        if ($coupon->coupon_type === 1) {
            $couponDiscountAmount = $coupon->amount;

            if ($coupon->max_amount > 0 && $couponDiscountAmount > $coupon->max_amount) {
                $couponDiscountAmount = $coupon->max_amount;
            }
            return $this->couponApplyFor($coupon, $cartSubTotal, $couponDiscountAmount);
        }
        // amount in percentage(%)
        elseif ($coupon->coupon_type === 2) {
            $couponDiscountAmount = ($cartSubTotal * $coupon->amount) / 100;
            // dd($couponDiscountAmount);
            // dd($couponDiscountAmount, $coupon->max_amount);
            if ($coupon->max_amount > 0 && $couponDiscountAmount > $coupon->max_amount) {
                $couponDiscountAmount = $coupon->max_amount;
            }
            return $this->couponApplyFor($coupon, $cartSubTotal, $couponDiscountAmount);
        } // free shipping
        elseif ($coupon->coupon_type === 3) {
            // dd($coupon->free_shipping_min, $cartSubTotal,  $coupon->free_shipping_min <= $cartSubTotal);
            if ($cartSubTotal < $coupon->free_shipping_min) {
                return [
                    'coupon-error' => true,
                    'message' => 'Minimum order amount should be ' . $coupon->free_shipping_min . ' to apply this coupon',
                ];
            } else {
                return $this->couponService->storeCouponInSession($coupon, $couponDiscountAmount);
            }
        }
    }

    public  function couponApplyFor($coupon, $cartSubTotal, $couponDiscountAmount)
    {
        if ($coupon->apply_for === 1) {
            if ($coupon->max_amount > 0 && $couponDiscountAmount > $coupon->max_amount) {
                $couponDiscountAmount = $coupon->max_amount;
            }
            return $this->couponService->storeCouponInSession($coupon, $couponDiscountAmount);
        } elseif ($coupon->apply_for === 2) {
            if ($coupon->order_from_amount > $cartSubTotal) {
                return [
                    'coupon-error' => true,
                    'message' => 'Coupon is valid for order amount ' . $coupon->order_from_amount . ' or more',
                ];
            } else {
                if ($coupon->max_amount > 0 && $couponDiscountAmount > $coupon->max_amount) {
                    $couponDiscountAmount = $coupon->max_amount;
                }
                return $this->couponService->storeCouponInSession($coupon, $couponDiscountAmount);
            }
        } elseif ($coupon->apply_for === 3) {
            // Get unique product IDs from the cart
            $uniqueProductIds = Cart::getContent()->pluck('attributes.product_id')->unique();

            // Get categories of products in the cart
            $cartCategories = Product::whereIn('id', $uniqueProductIds)->distinct()->pluck('cat_id');

            // Get categories associated with the coupon
            $couponCategories = CouponCat::where('coupon_id', $coupon->id)->pluck('cat_id');

            // Find common categories between cart and coupon
            $commonCategories = $couponCategories->intersect($cartCategories);

            if ($commonCategories->isEmpty()) {
                return [
                    'coupon-error' => true,
                    'message' => 'This coupon is not applicable for your cart.',
                ];
            }

            // Filter cart items eligible for the coupon
            $eligibleProductIds = Product::whereIn('cat_id', $commonCategories)->pluck('id');
            $eligibleCartItems = Cart::getContent()->filter(function ($item) use ($eligibleProductIds) {
                return $eligibleProductIds->contains($item->attributes->product_id);
            });
            // Initialize total discount amount
            $productCouponDiscountAmount = 0;

            // Loop through eligible cart items to calculate the discount
            foreach ($eligibleCartItems as $cartContent) {
                $productPrice = $cartContent->price;

                if ($coupon->coupon_type === 1) {
                    // Fixed amount discount
                    $discount = $coupon->amount * $cartContent->quantity;
                    $productCouponDiscountAmount += $discount; // Add fixed discount
                } elseif ($coupon->coupon_type === 2) {
                    // Percentage-based discount
                    $discount = (($productPrice * $coupon->amount) / 100) * $cartContent->quantity;
                    $productCouponDiscountAmount += max(0, $discount); // Ensure no negative values
                }
            }
            if ($coupon->max_amount > 0 && $productCouponDiscountAmount > $coupon->max_amount) {
                $productCouponDiscountAmount = $coupon->max_amount;
            }

            return $this->couponService->storeCouponInSession($coupon, $productCouponDiscountAmount);
            // return back()->with('success', 'Coupon applied successfully');

        } elseif ($coupon->apply_for === 4) {
            $uniqueProductIds = Cart::getContent()->pluck('attributes.product_id')->unique();
            $couponProducts = CouponProduct::where('coupon_id', $coupon->id)->pluck('product_id');
            $commonProducts = $couponProducts->intersect($uniqueProductIds);

            if ($commonProducts->isEmpty()) {
                return [
                    'coupon-error' => true,
                    'message' => 'This coupon is not applicable for your cart.',
                ];
            }
            $productCouponDiscountAmount = 0; // Initialize the discount amount

            // Get the cart instances with the matching product IDs
            $cartContents = Cart::getContent()->filter(function ($cartItem) use ($commonProducts) {
                return $commonProducts->contains($cartItem->attributes->product_id);
            });

            // dd($cartContents,$commonProducts);

            foreach ($cartContents as $cartContent) {
                $productPrice = $cartContent->price;

                if ($coupon->coupon_type === 1) {
                    // Fixed amount discount
                    $discount = $coupon->amount * $cartContent->quantity;
                    $productCouponDiscountAmount +=   $discount; // Avoid negative discounts
                } elseif ($coupon->coupon_type === 2) {
                    // Percentage-based discount
                    $discount = (($productPrice * $coupon->amount) / 100) * $cartContent->quantity;
                    $productCouponDiscountAmount += max(0, $discount); // Ensure no negative values
                    // dump($productCouponDiscountAmount);
                }
            }
            // dd($productCouponDiscountAmount);
            if ($coupon->max_amount > 0 && $productCouponDiscountAmount > $coupon->max_amount) {
                $productCouponDiscountAmount = $coupon->max_amount;
            }
            return $this->couponService->storeCouponInSession($coupon, $productCouponDiscountAmount);

            // return back()->with('success', 'Coupon applied successfully');

        } elseif ($coupon->apply_for === 5) {
            $authUserId = Auth::id();
            $commonUserExists = CouponUser::where('coupon_id', $coupon->id)
                ->where('user_id', $authUserId)
                ->exists();

            if (!$commonUserExists) {
                return [
                    'coupon-error' => true,
                    'message' => 'This coupon is not applicable for your cart.',
                ];
            }

            return $this->couponService->storeCouponInSession($coupon, $couponDiscountAmount);
        } elseif ($coupon->apply_for === 6) {
            $checkCouponApplied = Order::where('user_id', Auth::id())->where('coupon_id', $coupon->id)->exists();
            if ($checkCouponApplied) {
                return [
                    'coupon-error' => true,
                    'message' => 'Coupon already applied',
                ];
            }
            // dd($couponDiscountAmount);\
            if ($coupon->max_amount > 0 && $couponDiscountAmount > $coupon->max_amount) {
                $couponDiscountAmount = $coupon->max_amount;
            }
            return $this->couponService->storeCouponInSession($coupon, $couponDiscountAmount);
            // return back()->with('success', 'Coupon applied successfully');
        } elseif ($coupon->apply_for === 7) {
            // Get unique product IDs from the cart
            $uniqueProductIds = Cart::getContent()->pluck('attributes.product_id')->unique();

            // Get the store ID associated with the coupon
            $couponStoreId = $coupon->store_id;

            // Get the store ID of each product in the cart
            $productStores = Product::whereIn('id', $uniqueProductIds)->pluck('store_id', 'id');

            // Filter the products that belong to the coupon's store
            $eligibleProductIds = $productStores->filter(function ($storeId) use ($couponStoreId) {
                return $storeId == $couponStoreId;
            })->keys();

            $cartContents = Cart::getContent()->filter(function ($item) use ($eligibleProductIds) {
                return $eligibleProductIds->contains($item->attributes->product_id);
            });


            // Check if there are any products from the coupon's store in the cart
            if ($eligibleProductIds->isEmpty()) {
                return [
                    'coupon-error' => true,
                    'message' => 'This coupon is not applicable for the cart.',
                ];
            }

            $productCouponDiscountAmount = 0; // Initialize the discount amount

            foreach ($cartContents as $cartContent) {
                $productPrice = $cartContent->price;

                if ($coupon->coupon_type === 1) {
                    // Fixed amount discount
                    $discount = $coupon->amount  *  $cartContent->quantity;
                    $productCouponDiscountAmount +=   $discount; // Avoid negative discounts
                } elseif ($coupon->coupon_type === 2) {
                    // Percentage-based discount
                    $discount = (($productPrice * $coupon->amount) / 100) *  $cartContent->quantity;
                    $productCouponDiscountAmount += max(0, $discount); // Ensure no negative values
                    // dump($productCouponDiscountAmount);
                }
            }

            if ($coupon->max_amount > 0 && $productCouponDiscountAmount > $coupon->max_amount) {
                $productCouponDiscountAmount = $coupon->max_amount;
            }
            // dd($productCouponDiscountAmount);
            return $this->couponService->storeCouponInSession($coupon, $productCouponDiscountAmount);
        }
    }
    public function removeCoupon(){
        $this->couponService->removeCouponSession();

        // If it's an AJAX request (checkout page)
        if (request()->ajax()) {
            $html = view('layouts.partials.checkout-summary')->render();
            return response()->json([
                'success' => true,
                'message' => 'Coupon removed successfully',
                'html' => $html,
            ]);
        }

        // If it's a regular request (cart page)
        return redirect()->back()->with('success', 'Coupon removed successfully');
    }
    public function checkout()
    {
        $specialOffers = $this->specialOffers();
        $productBundles = $this->productBundles();
        $cartSubtotal = Cart::getSubTotal();
        $cartContents = Cart::getContent();
        $cart_count = $cartContents->count();
        $countries = Country::all();
        if ($cart_count > 0) {
            return view('Web.Layout.pages.checkout', compact('cartContents', 'cartSubtotal', 'countries', 'productBundles', 'specialOffers'));
        }
        return to_route('shopping.cart');
    }
}
