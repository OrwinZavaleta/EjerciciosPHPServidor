<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private $PATH = "app/private/usuarios.json";

    public function index()
    {
        $usuarios = $this->getUsers();
        return view("home", compact("usuarios"));
    }

    public function create()
    {
        return view("create");
    }

    public function store(Request $request)
    {
        $nombre = $request->post("nombre");
        $email = $request->post("email");
        $usuarios = $this->getUsers();

        $lastId = $usuarios[count($usuarios) - 1]["id"];

        $usuarios[] = ["nombre" => "$nombre", "email" => "$email", "id" => ($lastId + 1)];

        file_put_contents(storage_path($this->PATH), json_encode($usuarios));

        return redirect("/");
    }

    public function show($id) {
        // $users = $this->getUsers();
        // foreach ($users as $user) {
        //     $user->
        // }
    }
    public function edit($id) {}
    public function update($id) {}
    public function destroy($id) {}

    public function getUsers()
    {
        return json_decode(file_get_contents(storage_path($this->PATH)), true);
    }
}
