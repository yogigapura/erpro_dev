<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\GroupController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'index']);

Route::resource('customers',CustomerController::class);
Route::resource('projects',ProjectController::class);
Route::resource('users',UserController::class);
Route::resource('budgets',BudgetController::class);
Route::resource('costs',CostController::class);
Route::resource('groups',GroupController::class);


// Route::get('/projects/{id}/details', [ProjectController::class, 'details']);