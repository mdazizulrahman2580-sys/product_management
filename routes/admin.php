<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;



Route::prefix('admin')->middleware('auth')->group(function() {
Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');

Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');

});

Route::get('/users', [UserController::class, 'index'])->name('admin.users.create');


// Backend  Route

