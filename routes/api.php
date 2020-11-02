<?php

use App\Http\Controllers\BeerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

// For these routes an bearer token is needed
Route::middleware(['auth:api', 'role'])->group(function () {

    // admin crud routes
    Route::resource('users', UserController::class);
    Route::resource('beers', BeerController::class);

});
