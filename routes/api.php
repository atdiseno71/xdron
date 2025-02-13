<?php

use App\Http\Controllers\V1\ZonaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* ZONAS */
Route::group(['middleware' => 'auth'], function () {
    Route::get('zonas/{id}', [ZonaController::class, 'zonaFinca'])->name('zonas.index');
});
