<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'index']);

Route::resource('customers',CustomerController::class);
Route::resource('users',UserController::class);
