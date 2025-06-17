<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CuponController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\Backend\EditorController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\FileUploadController;
use App\Http\Controllers\Backend\ProductTagController;
use App\Http\Controllers\Backend\ProductSizeController;
use App\Http\Controllers\Backend\ManageEditorController;
use App\Http\Controllers\Backend\ProductBrandController;
use App\Http\Controllers\Backend\ProductBundleController;
use App\Http\Controllers\Backend\ProductCategoryController;


Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/admin/logout', [Admincontroller::class, 'logout'])->name('admin.logout');
    Route::prefix('backend')->group(function () {
        Route::resource('manage-editor', ManageEditorController::class);
        Route::put('/manage-editor/statusUpdate/{id}', [ManageEditorController::class, 'statusUpdate'])->name('manage-editor.status-update');
        //admin profile
        Route::get('/admin-profile', [AdminController::class, 'showAdminProfile'])->name('admin.profile');
        Route::post('/update-profile', [AdminController::class, 'profileUpdate'])->name('profile.update');
    });
});

// Protected Editor Routes
Route::group(['middleware' => 'auth:editor'], function () {
    Route::get('/editor/logout', [EditorController::class, 'logout'])->name('editor.logout');
    Route::prefix('editor')->group(function () {
        Route::get('/editor-profile', [EditorController::class, 'showEditorProfile'])->name('editor.profile');
        Route::post('/update-editor-profile', [EditorController::class, 'editorProfileUpdate'])->name('editor-profile.update');
    });
});


Route::group(['middleware' => ['auth:admin,editor']], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/temp-file-upload', [FileUploadController::class, 'temporaryUpload'])->name('temp-file-upload');
    Route::post('/delete-temp-file', [FileUploadController::class, 'deleteTempFile'])->name('delete-temp-file');

    //create product category
    Route::resource('/product-category', ProductCategoryController::class);
    Route::put('/product-category/status/{id}', [ProductCategoryController::class, 'status'])->name('product-category.status');

    //create product brand
    Route::resource('/product-brand', ProductBrandController::class);
    Route::put('/product-brand/status/{id}', [ProductBrandController::class, 'status'])->name('product-brand.status');

    //create product tag
    Route::resource('/product-tag', ProductTagController::class);
    Route::put('/product-tag/status/{id}', [ProductTagController::class, 'status'])->name('product-tag.status');

    //create product size
    Route::resource('/product-size', ProductSizeController::class);
    Route::put('/product-size/status/{id}', [ProductSizeController::class, 'status'])->name('product-size.status');

    //create cupon
    Route::resource('/cupon', CuponController::class);
    Route::put('/cupon/status/{id}', [CuponController::class, 'status'])->name('cupon.status');

    Route::post('/ckeditor/upload', [FileUploadController::class, 'temporaryUpload'])->name('ckeditor.upload');


    //create product
    Route::resource('/product', ProductController::class);
    Route::put('/product/status/{id}', [ProductController::class, 'status'])->name('product.status');

    //create product bundle
    Route::resource('/product-bundle', ProductBundleController::class);
    Route::put('/product-bundle/status/{id}', [ProductBundleController::class, 'status'])->name('product-bundle.status');

    // create slider
    Route::resource('/slider', SliderController::class);
    Route::put('/slider/status/{id}', [SliderController::class, 'status'])->name('slider.status');

    // manage product review
    Route::get('/product-review', [ProductReviewController::class, 'index'])->name('product-review.index');
    Route::put('/product-review/approve/{id}', [ProductReviewController::class, 'approve'])->name('product-review.approve');
    Route::delete('/product-review/{id}', [ProductReviewController::class, 'destroy'])->name('product-review.destroy');


    //order details
    Route::get('/order-details/{id}', [OrderController::class, 'show'])->name('order.details');
});
