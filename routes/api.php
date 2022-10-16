<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ReceiptController;
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
    'prefix'     => 'auth',
    'controller' => AuthController::class,
], function () {

    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
    Route::post('/forgot-password', 'forgotPassword');
    Route::post('/password-reset', 'passwordReset');
});

Route::group([
    'prefix'     => 'receipts',
    'middleware' => 'auth:sanctum',
    'controller' => ReceiptController::class,
], function () {

    Route::get('/', 'index')->withoutMiddleware('auth:sanctum');
    Route::get('/{id}', 'show');
    Route::post('/logout', 'logout');
    Route::post('/forgot-password', 'forgotPassword');
    Route::post('/password-reset', 'passwordReset');
});
