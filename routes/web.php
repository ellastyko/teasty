<?php

use App\Http\Controllers\Web\LandingController;
use App\Http\Controllers\Web\Auth\{PasswordResetController,};
use App\Http\Controllers\Web\Auth\ForgotPasswordController;
use App\Http\Controllers\Web\Auth\LoginController;
use App\Http\Controllers\Web\Auth\RegisterController;
use App\Http\Controllers\Web\Receipt\{ReceiptListingController};
use App\Http\Controllers\Web\Receipt\CreateReceiptController;
use App\Http\Controllers\Web\Receipt\ShowReceiptController;
use App\Http\Controllers\Web\User\{UsersController};
use App\Http\Controllers\Web\User\FavoriteController;
use App\Http\Controllers\Web\User\ProfileController;
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

Route::get('/', LandingController::class);

Route::get('/users', UsersController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', ProfileController::class);
    Route::get('/favorites', FavoriteController::class);
});

Route::group(['middleware' => 'guest:sanctum'], function () {
    Route::get('/login', LoginController::class)->name('login');
    Route::get('/register', RegisterController::class);
    Route::get('/forgot-password', ForgotPasswordController::class);
    Route::get('/password-reset/{token}', PasswordResetController::class);
});

Route::group([
    'prefix' => 'receipts',
], function () {
    Route::get('/', ReceiptListingController::class);
    Route::get('/create', CreateReceiptController::class)->middleware('auth:sanctum');
    Route::get('/{id}', ShowReceiptController::class);
});

Route::group([
    'prefix'     => 'admin',
    'middleware' => 'admin:sanctum',
], function () {
    Route::get('/', function () {
        return 'You are admin';
    });
});

