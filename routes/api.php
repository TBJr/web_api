<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ExcursionController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) { 
    return $request->user();
});

Route::get('api/excursions/getReservationsByExcursion/{id}',[ExcursionController::class,'getReservationsByExcursion']);



Route::apiResource('clients',ClientController::class);
Route::apiResource('excursions',ExcursionController::class);
Route::apiResource('users',UserController::class);
Route::apiResource('reservations',ReservationController::class);
Route::apiResource('places',PlaceController::class);

Route::group(['middleware' => ['api']], function(){
   
    Route::get('excursions/getReservationsByExcursion/{id}',[ExcursionController::class,'getReservationsByExcursion']);
    Route::get('excursions/getOpinionsByExcursion/{id}',[ExcursionController::class,'getOpinionsByExcursion']);

});



