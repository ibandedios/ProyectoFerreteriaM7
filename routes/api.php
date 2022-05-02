<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthController;
//use Laravel\Passport\Http\Controllers\AuthorizationController;
use App\Http\Controllers\Api\ProductesController;
//use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware('auth:api')->group(function () {
    Route::get('user', [App\Http\Controllers\Api\AuthController::class,'user']);
    Route::resource('Productes',App\Http\Controllers\Api\ProductesController::class);
});

Route::post('login', [App\Http\Controllers\Api\AuthController::class,'login']);
Route::post('register',[App\Http\Controllers\Api\AuthController::class,'register']);

//Route::resource('home', HomeController::class);

//Route::resource('productes', ProductesController::class);

Route::resource('Providers', App\Http\Controllers\Api\ProvidersController::class);

Route::resource('Productes', App\Http\Controllers\Api\ProductesController::class);


//Route::resource('providers', 'Api/ProvidersController');