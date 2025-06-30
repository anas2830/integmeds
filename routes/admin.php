<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CuponController;
use App\Http\Controllers\Backend\EditorController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ClientsController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\HomePageSettingsController;
use App\Http\Controllers\Backend\FileUploadController;
use App\Http\Controllers\Backend\ProductTagController;
use App\Http\Controllers\Backend\ProductSizeController;
use App\Http\Controllers\Backend\BundleReviewController;
use App\Http\Controllers\Backend\ManageEditorController;
use App\Http\Controllers\Backend\ProductBrandController;
use App\Http\Controllers\Backend\ProductBundleController;
use App\Http\Controllers\Backend\ProductReviewController;
use App\Http\Controllers\Backend\ProductCategoryController;


Route::group(['middleware' => 'auth.admin'], function () {
    

    // Backend prefix group
    Route::prefix('backend')->group(function () {
        Route::resource('manage-editor', ManageEditorController::class)->middleware('auth.admin');
        Route::put('/manage-editor/statusUpdate/{id}', [ManageEditorController::class, 'statusUpdate'])->name('manage-editor.status-update')->middleware('auth.admin');

        // Admin profile routes
        Route::get('/admin-profile', [AdminController::class, 'showAdminProfile'])->name('admin.profile');
        Route::post('/update-profile', [AdminController::class, 'profileUpdate'])->name('profile.update');

        // Dashboard
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // File upload routes
        Route::post('/temp-file-upload', [FileUploadController::class, 'temporaryUpload'])->name('temp-file-upload');
        Route::post('/delete-temp-file', [FileUploadController::class, 'deleteTempFile'])->name('delete-temp-file');

        // Product category
        Route::resource('/product-category', ProductCategoryController::class);
        Route::put('/product-category/status/{id}', [ProductCategoryController::class, 'status'])->name('product-category.status');

        // Product brand
        Route::resource('/product-brand', ProductBrandController::class);
        Route::put('/product-brand/status/{id}', [ProductBrandController::class, 'status'])->name('product-brand.status');

        // Product tag
        Route::resource('/product-tag', ProductTagController::class);
        Route::put('/product-tag/status/{id}', [ProductTagController::class, 'status'])->name('product-tag.status');

        // Product size
        Route::resource('/product-size', ProductSizeController::class);
        Route::put('/product-size/status/{id}', [ProductSizeController::class, 'status'])->name('product-size.status');

        // Coupon
        Route::resource('/cupon', CuponController::class);
        Route::put('/cupon/status/{id}', [CuponController::class, 'status'])->name('cupon.status');

        // CKEditor upload
        Route::post('/ckeditor/upload', [FileUploadController::class, 'temporaryUpload'])->name('ckeditor.upload');

        // Product
        Route::resource('/product', ProductController::class)->except(['show']);
        Route::put('/product/status/{id}', [ProductController::class, 'status'])->name('product.status');

        // Product bundle
        Route::resource('/product-bundle', ProductBundleController::class);
        Route::put('/product-bundle/status/{id}', [ProductBundleController::class, 'status'])->name('product-bundle.status');

        // Slider
        Route::resource('/slider', SliderController::class);
        Route::put('/slider/status/{id}', [SliderController::class, 'status'])->name('slider.status');

        // Product review
        Route::get('/product-review', [ProductReviewController::class, 'index'])->name('product-review.index');
        Route::get('/product-review/create', [ProductReviewController::class, 'create'])->name('product-review.create');
        Route::post('/product-review/store', [ProductReviewController::class, 'store'])->name('product-review.store');
        Route::get('/product-review/edit/{id}', [ProductReviewController::class, 'edit'])->name('product-review.edit');
        Route::put('/product-review/update/{id}', [ProductReviewController::class, 'update'])->name('product-review.update');
        Route::put('/product-review/approve/{id}', [ProductReviewController::class, 'approve'])->name('product-review.approve');
        Route::delete('/product-review/{id}', [ProductReviewController::class, 'destroy'])->name('product-review.destroy');

        //bundle review
        Route::get('/bundle-review', [BundleReviewController::class, 'index'])->name('bundle-review.index');
        Route::get('/bundle-review/create', [BundleReviewController::class, 'create'])->name('bundle-review.create');
        Route::post('/bundle-review/store', [BundleReviewController::class, 'store'])->name('bundle-review.store');
        Route::get('/bundle-review/edit/{id}', [BundleReviewController::class, 'edit'])->name('bundle-review.edit');
        Route::put('/bundle-review/update/{id}', [BundleReviewController::class, 'update'])->name('bundle-review.update');
        Route::put('/bundle-review/approve/{id}', [BundleReviewController::class, 'approve'])->name('bundle-review.approve');
        Route::delete('/bundle-review/{id}', [BundleReviewController::class, 'destroy'])->name('bundle-review.destroy');

        // Clients
        Route::resource('/clients', ClientsController::class);
        Route::put('/clients/status/{id}', [ClientsController::class, 'status'])->name('clients.status');

        // Home page settings
        Route::get('/home-page-sidebar-settings', [HomePageSettingsController::class, 'homePageSidebarSettings'])->name('home.page.sidebar.settings');
        Route::put('/home-page-sidebar-settings/update', [HomePageSettingsController::class, 'updateHomePageSidebarSettings'])->name('home.page.sidebar.settings.update');
        Route::get('/home-page-body-settings', [HomePageSettingsController::class, 'homePageBodySettings'])->name('home.page.body.settings');
        Route::put('/home-page-body-settings/update', [HomePageSettingsController::class, 'updateHomePageBodySettings'])->name('home.page.body.settings.update');

        //order details
        Route::get('/order-details/{id}', [OrderController::class, 'show'])->name('order.details');

         //privacy policy
        Route::get('/privacy-policy-settings', [PageController::class, 'privacyPolicy'])->name('privacy-policy-settings');
        Route::put('/privacy-policy-settings/update', [PageController::class, 'updatePrivacyPolicy'])->name('privacy-policy-settings.update');

        //contact us
        Route::get('/contact-us-settings', [PageController::class, 'contactUs'])->name('contact-us-settings');
        Route::put('/contact-us-settings/update', [PageController::class, 'updateContactUs'])->name('contact-us-settings.update');

        //terms & conditions
        Route::get('/terms-condition-settings', [PageController::class, 'termsCondition'])->name('terms-condition-settings');
        Route::put('/terms-condition-settings/update', [PageController::class, 'updateTermsCondition'])->name('terms-condition-settings.update');

        //about us
        Route::get('/about-us-settings', [PageController::class, 'aboutUs'])->name('about-us-settings');
        Route::put('/about-us-settings/update', [PageController::class, 'updateAboutUs'])->name('about-us-settings.update');
    }); // end backend group

    // Editor logout route (outside backend prefix)
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/editor/logout', [EditorController::class, 'logout'])->name('editor.logout');
    // Editor prefix group
    Route::prefix('editor')->group(function () {
        Route::get('/editor-profile', [EditorController::class, 'showEditorProfile'])->name('editor.profile');
        Route::post('/update-editor-profile', [EditorController::class, 'editorProfileUpdate'])->name('editor-profile.update');
    });
});