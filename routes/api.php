<?php

use App\Http\Controllers\API\V1\Auth\LoginController;
use App\Http\Controllers\API\V1\Auth\RegistrationContoller;
use Illuminate\Http\Request;
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

Route::group([
    'prefix' => '1.0',
    'as' => 'v1.',
    'namespace' => 'V1'
], function () {
    Route::group([
        'namespace' => 'Auth',
        'prefix' => 'auth',
        'as' => 'auth.'
    ], function () {
        Route::post('login', [LoginController::class, 'issueToken'])->name('login');
        Route::post('register', [RegistrationContoller::class, 'register'])->name('register');
    });
});
