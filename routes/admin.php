<?php
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Admin\UserController;


Route::prefix('admin')->middleware('auth')->group(function() {
Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');





});

Route::get('/users', [UserController::class, 'index'])->name('admin.users.create');
