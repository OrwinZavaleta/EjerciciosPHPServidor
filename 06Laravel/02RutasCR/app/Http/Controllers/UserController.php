<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = json_decode(file_get_contents(storage_path("app/private/usuarios.json")));
        return view("home", compact("usuarios"));
    }
    public function create() {
        return view("create");
    }
    public function store() {}
}
