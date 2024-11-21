<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;

Route::get('/', function () {
    return view('main.index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('{page}', [IndexController::class, 'index'])->where('page', '.*');
