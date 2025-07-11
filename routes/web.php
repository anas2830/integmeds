<?php


use Illuminate\Support\Str;

use Mews\Captcha\Facades\Captcha;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\HomePageController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\EditorController;
use App\Http\Controllers\Web\NewsletterController;
use App\Http\Controllers\Web\ShoppingCartController;
use Illuminate\Support\Facades\Artisan;

require __DIR__ . '/admin.php';

Auth::routes([ 'verify' => true, 'register' => false, 'reset' => true, 'login'=>false ]);


Route::get('/', [HomePageController::class, 'index'])->name('/');
Route::get('/category/{slug?}', [WebController::class, 'category'])->name('category');
Route::get('/bundle', [WebController::class, 'bundle'])->name('bundle');
Route::get('/bundle-details/{id}', [WebController::class, 'bundleDetails'])->name('bundle-details');
Route::get('/product-details/{slug?}', [WebController::class, 'productDetails'])->name('product-details');
Route::get('/about-us', [WebController::class, 'aboutUs'])->name('about-us');
Route::get('/search', [WebController::class, 'search'])->name('search');
Route::get('/search-suggestions', [WebController::class, 'searchSuggestions'])->name('search-suggestions');
Route::get('/product/quick-view', [WebController::class, 'productQuickView'])->name('product.quick.view');

//forgot password
Route::get('/forgot-password', [WebController::class, 'forgotPassword'])->name('forgot-password');
Route::post('/forgot-password', [WebController::class, 'forgotPasswordPost'])->name('forgot-password.post');
Route::get('/reset-password/{token}', [WebController::class, 'resetPassword'])->name('reset-password');
Route::post('/reset-password/{token}', [WebController::class, 'resetPasswordPost'])->name('reset-password.post');

Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::get('/reload-captcha', function () {
    $src = Captcha::src('flat'); // gets only the URL
    $src .= (Str::contains($src, '?') ? '&' : '?') . 'reload=' . uniqid();
    return response()->json(['captcha_src' => $src]);
})->name('reload.captcha');
Route::post('/contact-submit', [WebController::class, 'contactSubmit'])->name('contact.submit');




Route::get('/privacy-policy', [WebController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-condition', [WebController::class, 'termsCondition'])->name('terms-condition');
Route::get('/cart', [WebController::class, 'cart'])->name('cart');
Route::get('/wishlist', [WebController::class, 'wishlist'])->name('wishlist');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');


Route::controller(ShoppingCartController::class)->group(function () {
    Route::get('/cart', 'cart')->name('shopping.cart');
    Route::post('/cart', 'addToCart')->name('shopping.cart.submit');
    Route::post('/bundle-cart', 'addToBundleCart')->name('bundle.cart.submit');
    Route::post('/update/cart', 'updateCart')->name('shopping.cart.update');
    Route::get('/remove/cart/single/{rowId}', 'removeSingleItem')->name('shopping.cart.remove.single');
    Route::get('/ajax/remove/cart/single/{rowId}', 'removeSingleItemAjax')->name('shopping.cart.remove.single.ajax');
    Route::get('/remove/cart/all', 'removeAllItem')->name('shopping.cart.remove.all');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::post('/apply/coupon', 'applyCoupon')->name('coupon.apply');
    Route::get('/remove/coupon/{coupon_code}', 'removeCoupon')->name('coupon.remove');
    Route::post('/shipping/rates', 'getShippingRates')->name('shipping.rates');
});

Route::controller(OrderController::class)->group(function () {
    Route::post('/place/order', 'placeOrder')->name('place.order');
    Route::get('/order/complete/{id}', 'orderComplete')->name('order.complete');
    Route::get('/order/status', 'orderStatus')->name('order.status');
    Route::post('/success', 'success');
    Route::post('/fail', 'fail');
    Route::post('/cancel', 'cancel');
    Route::post('/ipn', 'ipn');
    Route::post('/update/shipping/cost', 'updateShippingCost')->name('update.shipping.cost');
});


// Route::prefix('user')->group(function () {
Route::prefix('user')->group(function () {

    Route::middleware(['auth.user'])->group(function () {
        //dashboard
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

        // Orders
        Route::get('/orders', [UserController::class, 'orders'])->name('user.orders');
        Route::get('/order-invoice/{id}', [UserController::class, 'orderInvoice'])->name('user.order-invoice');
        Route::post('/reorder/{id}', [UserController::class, 'reorder'])->name('user.reorder');

        // Account Details
        Route::get('/account', [UserController::class, 'accountDetails'])->name('user.account');
        Route::put('/account', [UserController::class, 'updateAccount'])->name('user.account.update');

        // Address
        Route::get('/address', [UserController::class, 'address'])->name('user.address');

        // Billing Address
        Route::get('/billing-address', [UserController::class, 'billingAddress'])->name('user.billing-address');
        Route::put('/billing-address', [UserController::class, 'updateBillingAddress'])->name('user.billing-address.update');

        // Shipping Address
        Route::get('/shipping-address', [UserController::class, 'shippingAddress'])->name('user.shipping-address');
        Route::put('/shipping-address', [UserController::class, 'updateShippingAddress'])->name('user.shipping-address.update');

        // Change Password
        Route::get('/change-password', [UserController::class, 'changePasswordForm'])->name('user.change-password');
        Route::put('/change-password', [UserController::class, 'changePassword'])->name('user.password.update');

        // Wishlist
        Route::get('/wishlist', [UserController::class, 'wishlist'])->name('user.wishlist');
        Route::post('/wishlist/add', [UserController::class, 'wishlistStore'])->name('user.wishlist.add');
        Route::get('/wishlist/remove/{id}', [UserController::class, 'removeWishlist'])->name('user.wishlist.remove');

        Route::post('/product/review', [UserController::class, 'reviewStoreOrUpdate']) ->name('product.review.submit'); 
        Route::post('/bundle/review', [UserController::class, 'bundleReviewStoreOrUpdate']) ->name('bundle.review.submit'); 
        // Logout
        Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
    });

    // Registration and Login (no auth middleware)
    Route::get('register', [UserController::class, 'showRegisterForm'])->name('user.register');
    Route::post('register', [UserController::class, 'register'])->name('user.register.post');
    
    Route::get('login', [UserController::class, 'showLoginForm'])->name('user.login');
    Route::post('login', [UserController::class, 'login'])->name('user.login.post');
});



Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login']);

//editor routes
Route::get('editor/login', [EditorController::class, 'showLoginForm'])->name('editor.login');
Route::post('editor/login', [EditorController::class, 'login']);


Route::get('/cache-clear', function () {
    Artisan::call('optimize:clear');
    return 'Cache cleared!';
});