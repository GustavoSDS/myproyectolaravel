<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CiclosController;

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('admin/dashboard');
})->name('admin');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('ciclos', CiclosController::class)->parameters(['ciclos' => 'ciclo'])->names('ciclos');

    // Route::get('ciclos', [CiclosController::class, 'show'])->name('ciclos.show');

    // Route::get('ciclos/create', [CiclosController::class, 'create'])->name('ciclos.create');

    // Route::post('ciclos', [CiclosController::class, 'store'])->name('ciclos.store');

    // Route::delete('ciclos/{id}', [CiclosController::class, 'destroy'])->name('ciclos.destroy');

});
