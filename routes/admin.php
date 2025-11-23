<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;


Route::prefix('admin')->middleware('auth')->group(function() {
Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');



});

Route::get('/users', [UserController::class, 'index'])->name('admin.users.create');


// Backend  Route

Route::prefix('admin')->name('admin.')->group(function () {

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





// Route::prefix('admin')->name('admin.')->group(function() {
//     Route::get('/', [ProductController::class, 'index'])->name('products.index');
//     // Route::get('products/create',[ProductController::class, 'index'])->name('products.index');
//     Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
//     Route::post('products', [ProductController::class, 'store'])->name('products.store');
//     Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
//     Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');
//     Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
//     Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

// });

// Route::prefix('admin')->name('admin.')->group(function () {

//     Route::get('/', [ProductController::class, 'index'])->name('products.index');

//     Route::get('/products/create', [ProductController::class, 'index'])
//         ->name('products.create');

//     Route::get('/products/{id}/edit', [ProductController::class, 'index'])
//         ->name('products.edit');

//     Route::get('/products/{id}/show', [ProductController::class, 'index'])
//         ->name('products.show');
// });



