<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CiclosController;
use App\Http\Controllers\DatatableController;

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('admin/dashboard');
})->name('admin');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('ciclos', CiclosController::class)->parameters(['ciclos' => 'ciclo'])->names('ciclos');
    Route::get('datatable/{id}/inscriptos', [DatatableController::class, 'inscriptos'])->name('datatable.inscriptos');
    Route::get('datatable/fechas', [DatatableController::class, 'fechas'])->name('datatable.fechas');
});
