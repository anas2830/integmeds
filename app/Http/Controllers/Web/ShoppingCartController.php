<?php

namespace App\Http\Controllers\Web;

use Cart;
use App\Models\Order;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\Web\OrderService;
use App\Services\Web\CouponService;
use App\Services\Web\SidebarService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Services\Web\ProductCartService;
use Illuminate\Validation\ValidationException;

class ShoppingCartController extends SidebarService
{
    protected $productService;
    protected $couponService;
    protected $orderService;


    public function __construct(ProductCartService $productService, CouponService $couponService, OrderService $orderService)
    {
        $this->productService = $productService;
        $this->couponService = $couponService;
        $this->orderService = $orderService;
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
                $this->couponService->refreshCouponAndValidate((float) Cart::getSubTotal());
            }
        }else{
            return response()->json(['status'=> 'out-of-stock', 'message'=>'Product out of stock']);
        }
        
        $cartData = Cart::getContent();
        $cartSubtotal = Cart::getSubTotal();

        $miniart = view('Web.Layout.partials.cart.minicart', compact('cartData','cartSubtotal'))->render();
        return response()->json(['status' => 'success', 'message' => 'Product added to cart successfully!', 'cart_count' => Cart::getTotalQuantity(),'minicart'=>$miniart]);
    }

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

        $subtotal = Cart::getSubTotal();
        $this->couponService->refreshCouponAndValidate($subtotal);

        return back()->with('success', 'Cart updated successfully');
    }

    public  function removeSingleItem($rowID){
        Cart::remove($rowID);
        // $this->couponService->couponReValidate();
        $subtotal = Cart::getSubTotal();
        $this->couponService->refreshCouponAndValidate($subtotal);
        return back()->with('success','Item successfully removed from cart');
    }

    public function removeSingleItemAjax($rowID){
        Cart::remove($rowID);
        $subtotal = Cart::getSubTotal();
        $this->couponService->refreshCouponAndValidate($subtotal);
        return response()->json([
            'status' => 'success',
            'message' => 'Product successfully removed from cart!',
            'cart_count' => Cart::getTotalQuantity(),
            'cartSubtotal'=> $subtotal, 
            'couponAmount'=> Session::get('coupon_amount'),
            'totalPrice'=> $subtotal - Session::get('coupon_amount'),
            'coupon_code'=>Session::get('coupon_code')
        ]);
    }

    public  function removeAllItem(){
        Cart::clear();
        $this->couponService->removeSessionCoupon();
        return back()->with('success','Cart has been cleared successfully');
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string|max:100',
        ]);

        try {
            $subtotal = Cart::getSubTotal(); // Replace with your own subtotal logic if needed
            $coupon = $this->couponService->applyCoupon($request->coupon_code, $subtotal);

            return response()->json([
                'status' => 'success',
                'message' => 'Coupon applied successfully.',
                ...$coupon
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function removeCoupon(string $code)
    {
        if (empty($code)) {
            return redirect()->back()->with('error', 'Invalid coupon code.');
        }

        if ($this->couponService->removeCoupon($code)) {
            return redirect()->back()->with('success', 'Coupon removed successfully.');
        }

        return redirect()->back()->with('error', 'No matching coupon found in session.');
    }

    public function checkout()
    {
        $cartContents = Cart::getContent();
        $cartCount = $cartContents->count();

        if ($cartCount === 0) {
            return to_route('shopping.cart');
        }

        $shippingAddress = null;
        $billingAddress = null;

        if (Auth::check()) {
            $shippingAddress = json_decode(Auth::user()->shipping_address ?? '{}');
            $billingAddress = json_decode(Auth::user()->billing_address ?? '{}');
        }

        $countries = Country::all();
        $cartSubtotal = Cart::getSubTotal();
        $this->couponService->refreshCouponAndValidate($cartSubtotal);

        return view('Web.Layout.pages.checkout', [
            'cartCount' => $cartCount,
            'cartSubtotal' => $cartSubtotal,
            'countries' => $countries,
            'specialOffers' => $this->specialOffers(),
            'productBundles' => $this->productBundles(),
            'shippingAddress' => $shippingAddress,
            'billingAddress' => $billingAddress,
            'couponAmount' => Session::get('coupon_amount'),
        ]);
    }

    public function addToBundleCart(Request $request)
    {
        $request->validate([
            'product_ids' => 'required|array',
            'quantity' => 'required|array',
        ]);

        $productIds = $request->product_ids;
        $quantities = $request->input('quantity');

        // Make sure both arrays exist and match in length
        if (count($productIds) !== count($quantities)) {
            return back()->withInput()->with('error', 'Bundle data mismatch. Please try again.');
        }

        $outOfStockItems = [];
        $addedItems = [];

        foreach ($productIds as $index => $productId) {
            $quantity = (int) ($quantities[$index]);

            $product = Product::find($productId);

            if (!$product || $product->status != 1 || $quantity < 1 || $product->quantity < $quantity) {
                $outOfStockItems[] = $productId;
                continue;
            }

            $existingItem = Cart::get($productId);
            $totalQty = $existingItem ? $existingItem->quantity + $quantity : $quantity;

            if ($totalQty > $product->quantity) {
                $outOfStockItems[] = $productId;
                continue;
            }

            $product_image = optional($product->firstImage)->image_url;
            $salePrice = $product->sale_price;
            $regularPrice = $product->regular_price;

            $data = [
                'id' => $productId,
                'name' => $product->product_name,
                'price' => $salePrice,
                'quantity' => $quantity,
                'attributes' => [
                    'slug' => $product->slug,
                    'regular_price' => $regularPrice,
                    'sale_price' => $salePrice,
                    'product_image' => $product_image,
                    'product_id' => $productId,
                ],
            ];

            if ($existingItem) {
                Cart::update($productId, ['quantity' => $quantity]);
            } else {
                Cart::add($data);
            }

            $addedItems[] = $productId;
        }

        if (!empty($outOfStockItems)) {
            $errors = [];

            foreach ($outOfStockItems as $itemId) {
                $errors["quantities.{$itemId}"] = 'This requested quantity is currently out of stock.';
            }

            // Flash all errors to session
            return back()
                ->withInput()
                ->withErrors($errors);
        }

        $this->couponService->refreshCouponAndValidate(Cart::getSubTotal());

        return redirect()->route('shopping.cart')->with('success', 'Bundle added to cart successfully.');
    }
}
