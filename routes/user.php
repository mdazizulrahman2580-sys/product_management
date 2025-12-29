<?php

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Livewire\Frontend\User\Myorder;
use App\Livewire\Frontend\User\Orders;

Route::prefix('user')->middleware('auth')->group(function() {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});


Route::prefix('user')->middleware('auth')->name('user.')->group(function () {

    Route::get('/dashboard', fn() => view('user.dashboard'))->name('dashboard');

    Route::get('/', [ProfileController::class, 'index'])->name('profile');

    Route::get('/orders', Myorder::class)->name('orders');


    Route::get('/wishlist', fn() => view('user.wishlist'))->name('wishlist');
    Route::get('/reviews', fn() => view('user.reviews'))->name('reviews');
    Route::get('/address', fn() => view('user.address'))->name('address');
    Route::get('/notifications', fn() => view('user.notifications'))->name('notifications');

});
