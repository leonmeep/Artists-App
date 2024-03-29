<?php

use App\Http\Controllers\ArtistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(ArtistController::class)->group(function () {

    Route::get('/artists', 'getAll');
    Route::get('/artists/{id}', 'getSingle');
    Route::post('/artists', 'create');
    Route::put('/artists/{id}', 'update');
    Route::delete('/artists/{id}', 'delete');

});
