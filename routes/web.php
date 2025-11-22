<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\IndexController;


    Route::get('/', [IndexController::class, 'index'])->name('frontend.index');
    Route::get('/shop', [ShopController::class, 'index'])->name('frontend.shop');
    Route::get('/product-details', [ProductDetailsController::class, 'index'])->name('product-details');
    Route::get('/home', [HomeController::class, 'index'])->name('frontend.home');




// Route::get('/', function () {
//     return view('frontend.index');

// });

Route::get('/dashboard', function () {
    return view('dashboard');



})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
// require __DIR__.'/user.php';
// require __DIR__.'/auth.php';
