<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::post('/form_post', [HomeController::class, 'store'])->name('form.store');


Route::get('/suggestions', [HomeController::class, 'suggestions'])->name('suggestions');
Route::post('/suggestions', [HomeController::class, 'post'])->name('suggestions.post');
