<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\V1\SuerteController;
use App\Http\Controllers\V1\FincaController;
use App\Http\Controllers\V1\ZonaController;
use App\Http\Controllers\V1\UserController;
use Illuminate\Support\Facades\Route;

/* RUTA DE INICIO PARA LAS PWA */
Route::get('/', function () {
    return redirect()->route('home');
});

//En caso de que no este logeado no le muestre nada
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
    Route::get('/', function () {
        return view('welcome');
    })->name('home.welcome');

    /* USUARIOS */
    Route::resource('users', UserController::class);
    /* FINCAS */
    Route::resource('fincas', FincaController::class);
    /* ZONAS */
    Route::resource('zonas', ZonaController::class);
    /* SUERTES */
    Route::resource('suertes', SuerteController::class);
});

// Auth::routes();
//Personalizamos las vistas del Auth
Route::namespace('Auth')->group(function(){
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
