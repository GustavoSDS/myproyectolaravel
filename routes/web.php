<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;


Route::get('/', [FormularioController::class, 'index'])->name('welcome');

Route::post('form-post', [FormularioController::class, 'store'])->name('form-post.store');
