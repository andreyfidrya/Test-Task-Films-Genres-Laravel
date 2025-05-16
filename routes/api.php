<?php

use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\FilmController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('genres', GenreController::class);
Route::apiResource('films', FilmController::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
