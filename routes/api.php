<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ExcursionController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AuthController;
use App\Models\Excursion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function(){
    Route::post('logout',[AuthController::class,'logout']);
    Route::get('/user', function (Request $request) { 
        return $request->user();
    });
});

Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);



Route::apiResource('clients',ClientController::class);
Route::apiResource('excursions',ExcursionController::class);
// Route::apiResource('users',UserController::class);
Route::apiResource('reservations',ReservationController::class);
Route::apiResource('places',PlaceController::class);
Route::apiResource('images',ImageController::class)->except('update');

Route::middleware('api')->group(function(){
   
    Route::get('excursions/getReservationsByExcursion/{id}',[ExcursionController::class,'getReservationsByExcursion']);
    Route::get('excursions/getOpinionsByExcursion/{id}',[ExcursionController::class,'getOpinionsByExcursion']);
   
});



