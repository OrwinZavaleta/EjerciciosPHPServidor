<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function mostrar()
    {
        $contenido = file_get_contents(storage_path("app/datos.txt"));
        return view("prueba.static", compact("contenido"));
    }
}
