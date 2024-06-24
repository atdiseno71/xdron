<?php

use App\Http\Controllers\V2\MunicipalityController;
use App\Http\Controllers\V2\TypeProductController;
use App\Http\Controllers\V2\DepartmentController;
use App\Http\Controllers\V2\AssistantController;
use App\Http\Controllers\V2\OperationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\V2\ProductController;
use App\Http\Controllers\V2\ClientController;
use App\Http\Controllers\V2\EstateController;
use App\Http\Controllers\V2\StatusController;
use App\Http\Controllers\V1\UserController;
use App\Http\Controllers\V2\DronController;
use App\Http\Controllers\V2\LuckController;
use App\Http\Controllers\V2\MailController;
use Illuminate\Support\Facades\Route;

Route::get('/sendemail/{id}', [MailController::class, 'index'])->name('mail.index');

// Aceptar operacion
Route::get('/accept/{id}', [OperationController::class, 'acceptOperationIndex']);
Route::post('/accept/{id}', [OperationController::class, 'acceptOperation'])->name('operation.accept');

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
    /* NOTIFICACIONES */
    Route::get('getNotifications', [UserController::class, 'getNotification']);
    /* LLENAR SELECTS */
    // Route::get('/get-fincas-by-cliente', [OperacionController::class, 'getFincasByCliente'])->name('get-fincas-by-cliente');

    /* Tanqueadores */
    Route::resource('assistants', AssistantController::class)->names('assistants');

    Route::resource('clients', ClientController::class)->names('clients');

    Route::resource('departments', DepartmentController::class)->names('departments');
    Route::resource('drons', DronController::class)->names('drons');
    Route::resource('estates', EstateController::class)->names('estates');
    Route::resource('lucks', LuckController::class)->names('lucks');
    Route::resource('municipalities', MunicipalityController::class)->names('municipalities');
    Route::resource('operations', OperationController::class)->names('operations');
    Route::resource('products', ProductController::class)->names('products');
    Route::resource('statuses', StatusController::class)->names('statuses');
    Route::resource('type-products', TypeProductController::class)->names('type-products');

    // Descargar zip
    Route::get('downloadZip/{id}', [OperationController::class, 'download'])->name('operations.download');
    // Descargar excel
    Route::get('downloadExcelOperacion', [OperationController::class, 'downloadExcelOperacion'])->name('downloadExcelOperacion');

    // Subir registros desde los modals
    Route::post('uploadClient', [ClientController::class, 'storeFromUser'])->name('clients.uploadClient');
    Route::post('uploadTypeProduct', [TypeProductController::class, 'store'])->name('typeProduct.uploadTypeProduct');
    Route::post('uploadAsistent', [AssistantController::class, 'storeFromModal'])->name('assistants.uploadAsistent');
    Route::post('uploadEstate', [EstateController::class, 'store'])->name('estates.uploadEstate');
    Route::post('uploadLuck', [LuckController::class, 'store'])->name('lucks.uploadLuck');
    Route::post('uploadDron', [DronController::class, 'store'])->name('drons.uploadDron');

    // SELECTS
    Route::get('getAsistents', [AssistantController::class, 'getSelects']);
    Route::get('getClients', [ClientController::class, 'getSelects']);
    Route::get('getTypeProducts', [TypeProductController::class, 'getSelects']);
    Route::get('getEstates', [EstateController::class, 'getSelects']);
    Route::get('getLucks', [LuckController::class, 'getSelects']);
    Route::get('getDrons', [DronController::class, 'getSelects']);
    Route::get('getLucks', [OperationController::class, 'getLucksByClient'])->name('lucks.getLucks');

});

// Auth::routes();
//Personalizamos las vistas del Auth
Route::namespace('Auth')->group(function(){
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
