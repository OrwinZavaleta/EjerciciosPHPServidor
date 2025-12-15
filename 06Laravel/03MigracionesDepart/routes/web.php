<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartController;
use App\Http\Controllers\EmpleController;

Route::get('/', function () {
    return view('home');
})->name("home");

// Route::get('/dashboard', function () {
//     return redirect("");
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource("emples", EmpleController::class);
});

Route::get("/saludo/{nombre}", [DepartController::class, "saludo"])->where("nombre", "[a-zA-Z]+");
Route::get("/saludo2/{nombre?}", [DepartController::class, "saludo2"])->where("nombre", "[a-zA-Z]+");
Route::get("/saludo3/{depart}", [DepartController::class, "saludo3"]);
Route::resource("departs", DepartController::class);

require __DIR__ . '/auth.php';
