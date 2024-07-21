<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index']);


// Route::middleware(['auth', 'role:admin'])->group(function () {
 
// });

Route::resource('articles', ArticleController::class);

