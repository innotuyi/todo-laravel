<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});





Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('articles', ArticleController::class);
});

