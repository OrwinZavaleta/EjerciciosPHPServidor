<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect("/index");
});

Route::get("/index", [UserController::class, "index"]);
Route::get("/create", [UserController::class, "create"]);
Route::post("/store", [UserController::class, "store"]);
