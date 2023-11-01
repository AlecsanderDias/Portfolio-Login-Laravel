<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerificationController;
use App\Http\Middleware\Autenticador;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return to_route('login.index');
});
Route::resource('/login', LoginController::class)->only(['store','index']);
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
Route::resource('/register', RegisterController::class)->only(['store','index']);
Route::resource('/home', HomeController::class)->only(['index'])->middleware('autenticador');
Route::get('/verify', [VerificationController::class, 'warning'])->middleware('autenticador')->name('verification.warning');
Route::get('/verify/{hash}', [VerificationController::class, 'confirmation'])->middleware('autenticador','signed')->name('verification.confirmed');
Route::post('/verify/send', [VerificationController::class, 'resend'])->middleware('autenticador')->name('verification.send');
Route::get('/forgot-password', [PasswordController::class, 'forgotPassword'])->middleware('guest')->name('forgot.password');
Route::post('/forgot-password', [PasswordController::class, 'passwordRecovery'])->middleware('guest')->name('password.recovery');
Route::get('/reset-password/{token}/{email}', [PasswordController::class, 'passwordResetLink'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [PasswordController::class, 'passwordReset'])->middleware('guest')->name('reset.form');