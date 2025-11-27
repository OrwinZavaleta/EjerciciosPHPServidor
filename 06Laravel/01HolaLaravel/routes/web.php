<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/estatico", function () {
    $contenido = file_get_contents(public_path("static.html"));
    // return response()->file();
    echo $contenido;
});
Route::get("/html", function () {
    return "<h1>hola mundo</h1>";
});



// Route::get("/estatico/vista", function () {
//     return view("prueba.static", ["nombre" => "juan"]);
// });

// Route::get("/static", function () {
//     return redirect("/estatico");
// });


// Route::get("/public", function () {
//     return redirect("static.html");
// });

Route::get("/nombre", [HomeController::class, "mostrar"]);
