<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route("usuarios.index");
});

/* Route::get("/index", [UserController::class, "index"]);
Route::get("/create", [UserController::class, "create"]);
Route::post("/store", [UserController::class, "store"]); */

// Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
// Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
// Route::post('/usuarios', [UserController::class, 'store'])->name('usuarios.store');
// Route::get('/usuarios/{id}', [UserController::class, 'show'])->name('usuarios.show');
// Route::get('/usuarios/{id}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
// Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update');
// Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');

Route::resource('usuarios', UserController::class);