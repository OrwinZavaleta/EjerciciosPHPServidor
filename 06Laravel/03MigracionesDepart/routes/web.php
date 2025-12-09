<?php

use App\Http\Controllers\DepartController;
use App\Http\Controllers\EmpleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("home");
});

Route::resource("departs", DepartController::class);
Route::resource("emples", EmpleController::class);
