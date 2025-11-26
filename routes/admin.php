<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;


Route::prefix('admin')->middleware('auth')->group(function() {
Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

});


    Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {

    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/show', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}/update', [UserController::class, 'update'])->name('users.update');

    Route::delete('/users/{id}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
});



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






