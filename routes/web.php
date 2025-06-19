<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Web\UserController;
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
Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::get('/privacy-policy', [WebController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-condition', [WebController::class, 'termsCondition'])->name('terms-condition');
Route::get('/cart', [WebController::class, 'cart'])->name('cart');
Route::get('/checkout', [WebController::class, 'checkout'])->name('checkout');
Route::get('/wishlist', [WebController::class, 'wishlist'])->name('wishlist');

Route::prefix('user')->group(function () {
// Route::prefix('user')->middleware(['auth.user'])->group(function () {

    //dashboard
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

    // Orders
    Route::get('/orders', [UserController::class, 'orders'])->name('user.orders');

    // Account Details
    Route::get('/account', [UserController::class, 'accountDetails'])->name('user.account');

    // Address
    Route::get('/address', [UserController::class, 'address'])->name('user.address');
    Route::post('/address', [UserController::class, 'updateAddress'])->name('user.address.update');

    Route::get('/billing-shipping-address', [UserController::class, 'billingShippingAddress'])->name('user.billing-shipping-address');



    // Change Password
    Route::get('/change-password', [UserController::class, 'changePasswordForm'])->name('user.change-password');
    Route::post('/change-password', [UserController::class, 'changePassword'])->name('user.password.update');

    // Wishlist
    Route::get('/wishlist', [UserController::class, 'wishlist'])->name('user.wishlist');

    // Logout
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

    // });
    Route::get('register', [UserController::class, 'showRegisterForm'])->name('user.register');
    Route::post('register', [UserController::class, 'register']);
    
    Route::get('login', [UserController::class, 'showLoginForm'])->name('user.login');
    Route::post('login', [UserController::class, 'login']);
});


Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login']);

//editor routes
Route::get('editor/login', [EditorController::class, 'showLoginForm'])->name('editor.login');
Route::post('editor/login', [EditorController::class, 'login']);
