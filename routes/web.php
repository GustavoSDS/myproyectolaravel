<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;


Route::get('/', [FormularioController::class, 'index'])->name('welcome');

Route::post('form_post', [FormularioController::class, 'store'])->name('form.store');
