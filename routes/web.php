<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\HomePageController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\EditorController;

require __DIR__ . '/admin.php';

Auth::routes([
    'verify' => true
]);

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('/', [HomePageController::class, 'index'])->name('/');

Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login']);

//editor routes
Route::get('editor/login', [EditorController::class, 'showLoginForm'])->name('editor.login');
Route::post('editor/login', [EditorController::class, 'login']);
