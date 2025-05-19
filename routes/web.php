<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::redirect('/', '/crud');

Route::resource('home', HomeController::class);
Route::resource('crud', CrudController::class);
