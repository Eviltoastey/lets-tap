<?php

use App\Http\Controllers\BeerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
Route::post('user/register', [RegisterController::class, 'register']);

// admin routes protected with admin role and JWT
Route::middleware(['auth:api', 'is.admin'])->group(function () {

    // admin crud routes
    Route::resource('users', UserController::class);
    Route::resource('beers', BeerController::class);

});

// user routes protected with user role and JWT
Route::middleware(['auth:api', 'is.user'])->group(function () {

});