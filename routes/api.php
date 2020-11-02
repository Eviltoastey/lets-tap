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

// admin crud routes
Route::resource('beers', BeerController::class);

// For these routes an bearer token is needed
Route::middleware(['auth:api'])->group(function () {
    Route::get('user/all', [UserController::class, 'index']);
});