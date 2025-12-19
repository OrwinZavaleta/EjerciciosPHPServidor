<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post("/login", [AuthController::class, "login"]);
Route::post("/register", [AuthController::class, "register"]);

Route::middleware(["auth:sanctum"])->group(function () {
    Route::apiResource("products", ProductController::class);
    Route::get("/user", [AuthController::class, "user"]);
    Route::post("/logout", [AuthController::class, "logout"]);
});

// Individuales
// Route::post("/logout", [AuthController::class, "logout"])->middleware(["auth:sanctum"]);
