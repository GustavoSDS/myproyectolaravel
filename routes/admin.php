<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CiclosController;
use App\Http\Controllers\UserController;

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('admin/dashboard');
})->name('admin');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('ciclos', CiclosController::class)->parameters(['ciclos' => 'ciclo'])->names('ciclos');

    Route::resource('fecha', UserController::class);
    Route::get('dataTableUSer', [UserController::class ,'dataTable'])->name('dataTableUser');
    Route::get('dataTableInscriptos', [UserController::class ,'inscriptos'])->name('dataTableInscriptos');
});
