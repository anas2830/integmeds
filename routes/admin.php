<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admincontroller;
use App\Http\Controllers\Backend\EditorController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\FileUploadController;
use App\Http\Controllers\Backend\ManageEditorController;

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/admin/logout', [Admincontroller::class, 'logout'])->name('admin.logout');
    Route::prefix('backend')->group(function () {
        Route::resource('manage-editor', ManageEditorController::class);
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
    Route::resource('/product', ProductController::class);
    Route::post('/temp-file-upload', [FileUploadController::class, 'temporaryUpload'])->name('temp-file-upload');
    Route::post('/delete-temp-file', [FileUploadController::class, 'deleteTempFile'])->name('delete-temp-file');
});
