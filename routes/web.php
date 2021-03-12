<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/cer/{id}', [App\Http\Controllers\HomeController::class, 'cer']);
Route::apiResource('/certificado', \App\Http\Controllers\CertificadoController::class)->middleware('auth');
Route::apiResource('/detalle', \App\Http\Controllers\DetalleController::class)->middleware('auth');
Route::apiResource('/participante', \App\Http\Controllers\ParticipanteController::class)->middleware('auth');
