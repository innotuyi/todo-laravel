<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index'])->name('home');


// Route::middleware(['auth', 'role:admin'])->group(function () {
 
// });

Route::resource('articles', ArticleController::class);



Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::prefix('admin')->group(function () {
    Route::get('roles', [AdminController::class, 'roles'])->name('admin.roles');
    Route::post('roles', [AdminController::class, 'createRole']);
    Route::post('roles/{role}/permissions', [AdminController::class, 'assignPermissions'])->name('admin.roles.assignPermissions');
    Route::get('permissions', [AdminController::class, 'permissions'])->name('admin.permissions');
    Route::post('permissions', [AdminController::class, 'createPermission']);
});