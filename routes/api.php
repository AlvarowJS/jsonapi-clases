<?php

use App\Http\Controllers\Api\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('articles/{article}', [ArticleController::class, 'show']);
Route::get('articles', [ArticleController::class, 'index']);
Route::post('articles', [ArticleController::class, 'create']);
    // ->name('api.v1.articles.show');

