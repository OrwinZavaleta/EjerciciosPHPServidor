<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect("/usuarios");
});

Route::get("/usuarios", [UserController::class, "index"]);
Route::get("/usuarios/create", [UserController::class, "create"]);
Route::post("/usuarios", [UserController::class, "store"]);
