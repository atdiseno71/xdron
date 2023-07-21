<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\V1\OperacionController;
use App\Http\Controllers\V1\ClienteController;
use App\Http\Controllers\V1\SuerteController;
use App\Http\Controllers\V1\FincaController;
use App\Http\Controllers\V1\ServicioController;
use App\Http\Controllers\V1\UserController;
use Illuminate\Support\Facades\Route;

/* RUTA DE INICIO PARA LAS PWA */
Route::get('/', function () {
    return redirect()->route('home.welcome');
});

//En caso de que no este logeado no le muestre nada
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.welcome');

    /* USUARIOS */
    Route::resource('users', UserController::class)
        ->only(['index','create','store','edit','update','destroy'])
        ->names('users');
    // Asignar roles a usuarios
    Route::post('users/{id}', [UserController::class, 'active'])->name('users.active');
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.asignar');
    Route::put('users/{user}', [UserController::class, 'updateRol']);
    /* CLIENTES */
    Route::resource('clientes', ClienteController::class);
    /* FINCAS */
    Route::resource('fincas', FincaController::class);
    /* SUERTES */
    Route::resource('suertes', SuerteController::class);
    /* OPERACIONES */
    Route::resource('operacion', OperacionController::class)->names('operaciones');
    /* SERVICIOS */
    Route::resource('servicios', ServicioController::class)->names('servicios');
    /* NOTIFICACIONES */
    Route::get('getNotifications', [UserController::class, 'getNotification']);
});

// Auth::routes();
//Personalizamos las vistas del Auth
Route::namespace('Auth')->group(function(){
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
