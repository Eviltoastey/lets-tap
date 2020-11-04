<?php

use App\Http\Controllers\BarController;
use App\Http\Controllers\BeerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BreweryController;
use App\Http\Controllers\FlavourController;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\LocationController;

use Illuminate\Support\Facades\Route;


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

// login and registration routes
Route::post('user/login', [LoginController::class, 'login']);
Route::post('user/register', [RegisterController::class, 'register']);

// admin routes protected with admin role and JWT
Route::middleware(['auth:api', 'is.admin'])->group(function () {

    // admin crud routes
    Route::resource('users', UserController::class);
    Route::resource('beers', BeerController::class);
    Route::resource('bars', BarController::class);
    Route::resource('breweries', BreweryController::class);
    Route::resource('flavours', FlavourController::class);
    Route::resource('styles', StyleController::class);
    Route::resource('stores', StoreController::class);
    Route::resource('locations', LocationController::class);

});

// user routes protected with user role and JWT
Route::middleware(['auth:api', 'is.user'])->group(function () {

});