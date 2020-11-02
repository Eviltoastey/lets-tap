<?php

use App\Http\Controllers\BeerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return [
        'Error' => '404: not found',
        'Tips' => [
            'Headers' => 'Make sure to set the header to application/json',
            'Permissions' => 'Make sure that you hae to correct permissions',
            'Routes' => 'Make sure to call an existing route',
        ]
    ];
});