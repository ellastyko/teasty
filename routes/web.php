<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\{
    Auth\ForgotPasswordController,
    Auth\LoginController,
    Auth\PasswordResetController,
    Auth\RegisterController,
    LandingController,
    ProfileController,
    UsersController
};

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

Route::get('/', LandingController::class)->name('landing');

Route::get('/login', LoginController::class)->name('login');
Route::get('/register', RegisterController::class)->name('register');
Route::get('/forgot-password', ForgotPasswordController::class)->name('forgot-password');
Route::get('/password-reset/{token}', PasswordResetController::class)->name('password-reset');

Route::get('/users', UsersController::class);

Route::get('/profile', ProfileController::class);
