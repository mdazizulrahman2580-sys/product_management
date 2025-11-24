<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;


Route::prefix('admin')->middleware('auth')->group(function() {
Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');



});

Route::get('/users', [UserController::class, 'index'])->name('admin.users.create');


// Backend  Route

Route::prefix('product')->name('admin.')->group(function () {

    // Only ONE controller page
    Route::get('/', [ProductController::class, 'index'])->name('products.index');

    // Livewire Routes
    Route::get('/products/create', [ProductController::class, 'index'])
        ->name('products.create');

    Route::get('/products/{id}/edit', [ProductController::class, 'index'])
        ->name('products.edit');

    Route::get('/products/{id}/show', [ProductController::class, 'index'])
        ->name('products.show');
});

Route::prefix('order')->name('admin.')->group(function () {

    Route::get('/',[OrderController::class, 'index'])->name('orders.index');

    Route::get('/orders/create', [OrderController::class, 'index'])
        ->name('orders.create');

    Route::get('/orders/{id}/edit', [OrderController::class, 'index'])
        ->name('orders.edit');

    Route::get('/orders/{id}/show', [OrderController::class, 'index'])
        ->name('orders.show');

});






