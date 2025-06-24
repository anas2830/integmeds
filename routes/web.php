<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Web\HomePageController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\EditorController;

require __DIR__ . '/admin.php';

Auth::routes([ 'verify' => true, 'register' => false, 'reset' => true, 'login'=>false ]);


Route::get('/', [HomePageController::class, 'index'])->name('/');
Route::get('/category', [WebController::class, 'category'])->name('category');
Route::get('/bundle', [WebController::class, 'bundle'])->name('bundle');
Route::get('/bundle-details', [WebController::class, 'bundleDetails'])->name('bundle-details');
Route::get('/product-details', [WebController::class, 'productDetails'])->name('product-details');
Route::get('/about-us', [WebController::class, 'aboutUs'])->name('about-us');
Route::get('/search', [WebController::class, 'search'])->name('search');

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
Route::get('/checkout', [WebController::class, 'checkout'])->name('checkout');
Route::get('/wishlist', [WebController::class, 'wishlist'])->name('wishlist');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');




// Route::prefix('user')->group(function () {
Route::prefix('user')->group(function () {

    Route::middleware(['auth.user'])->group(function () {
        //dashboard
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

        // Orders
        Route::get('/orders', [UserController::class, 'orders'])->name('user.orders');

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
        Route::get('/wishlist/remove/{id}', [UserController::class, 'removeWishlist'])->name('user.wishlist.remove');

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
