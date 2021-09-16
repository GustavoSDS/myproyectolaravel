<?php

use Illuminate\Support\Facades\Route;
use App\Http\Requests\RegisterUserRequest;


Route::get('/', function () {
    return view('welcome');
});

Route::post('form-post', function (RegisterUserRequest $request) {
    dd(request()->except('_token'));
 })->name('form-post');
