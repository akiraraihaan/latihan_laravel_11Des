<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\Api\BeanController;
use App\Http\Controllers\WisherController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('beans', BeanController::class);

Route::post('/beans', [WisherController::class, 'store']);
Route::delete('/beans/delete/{id}', [WisherController::class, 'destroy']);

Route::get('/weather/regions', [WeatherController::class, 'regions']);
Route::get('/weather/nearest', [WeatherController::class, 'nearestRegion']);
Route::get('/weather/forecast/{regionId}', [WeatherController::class, 'forecast']);
