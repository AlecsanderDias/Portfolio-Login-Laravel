<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\Autenticador;
use Illuminate\Support\Facades\Route;

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
Route::resource('/home', HomeController::class)->only(['index'])->middleware(Autenticador::class);