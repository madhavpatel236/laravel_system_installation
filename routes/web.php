<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/Home');

Route::resource('Home', HomeController::class);
Route::resource('Crud', CrudController::class);
