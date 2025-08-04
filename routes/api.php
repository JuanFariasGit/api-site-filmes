<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\TmdbController;

Route::get('/movies', [TmdbController::class, 'getMovies']);

Route::get('/genres', [TmdbController::class, 'getGenres']);

Route::get('/favorites', [FavoriteController::class, 'index']);

Route::post('/favorites', [FavoriteController::class, 'store']);

Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy']);
