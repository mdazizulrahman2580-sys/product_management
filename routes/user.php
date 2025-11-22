<?php
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->middleware('auth')->group(function() {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});
