<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
Route::get('/email/verify', function () {
    return to_route('home.index');
})->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Link de verificação foi enviado ao seu email!');
})->middleware('autenticador')->name('verification.send');