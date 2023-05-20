<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\V1\UserController;
use App\Http\Controllers\FincaController;
use App\Http\Controllers\ZonaController;
use Illuminate\Support\Facades\Route;

//En caso de que no este logeado no le muestre nada
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', function () {
        return view('welcome');
    });

    /* USUARIOS */
    Route::resource('users', UserController::class);
    /* FINCAS */
    Route::resource('fincas', FincaController::class);
    /* ZONAS */
    Route::resource('zonas', ZonaController::class);
});

// Auth::routes();
//Personalizamos las vistas del Auth
Route::namespace('Auth')->group(function(){
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
