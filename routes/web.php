<?php

use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientsController;
use Illuminate\Support\Facades\Route;

Route::resource('/',HomeController::class);
Route::resource('/departments',DepartmentsController::class);
Route::resource('/patients',PatientsController::class);