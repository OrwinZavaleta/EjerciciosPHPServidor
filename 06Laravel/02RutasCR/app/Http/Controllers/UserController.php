<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class UserController extends Controller
{
    private $PATH = "usuarios.json";

    public function index()
    {
        $usuarios = $this->getUsers() ?? [];
        return view("home", compact("usuarios"));
    }

    public function create()
    {
        return view("create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "nombre" => "required|string",
            "email" => "required|email"
        ]);

        $nombre = $request->post("nombre");
        $email = $request->post("email");
        $usuarios = $this->getUsers();

        if (!isset($usuarios) || count($usuarios) === 0) {
            $lastId = 0;
        } else {
            $lastId = $usuarios[count($usuarios) - 1]["id"];
        }

        $usuarios[] = ["nombre" => "$nombre", "email" => "$email", "id" => ($lastId + 1)];

        // file_put_contents(storage_path($this->PATH), json_encode($usuarios));
        Storage::put($this->PATH, json_encode($usuarios));

        return redirect("/");
    }

    public function show($id)
    {
        $userSelect = $this->getUser($id) ?? ["id" => "Usuario no existente", "nombre" => "Anonymous", "email" => "Anonymous@no.existe"];

        return view("show", compact("userSelect"));
    }
    public function edit($id)
    {
        $userSelect = $this->getUser($id);

        return view("update", compact("userSelect"));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "nombre" => "required|string",
            "email" => "required|email"
        ]);

        $usuarios = $this->getUsers();

        for ($i = 0; $i < count($usuarios); $i++) {
            if ($usuarios[$i]["id"] == $id) {
                $usuarios[$i]["nombre"] = $request->get("nombre");
                $usuarios[$i]["email"] = $request->get("email");
                break;
            }
        }

        Storage::put($this->PATH, json_encode($usuarios));

        return redirect()->route("usuarios.index");
    }
    public function destroy($id)
    {
        $usuarios = $this->getUsers();

        for ($i = 0; $i < count($usuarios); $i++) {
            if ($usuarios[$i]["id"] == $id) {
                array_splice($usuarios, $i, 1);
                break;
            }
        }

        Storage::put($this->PATH, json_encode($usuarios));

        return redirect()->route("usuarios.index");
    }

    public function getUsers()
    {
        return json_decode(Storage::get($this->PATH), true);
        // return json_decode(file_get_contents(storage_path($this->PATH)), true);
    }

    public function getUser($id)
    {
        $users = $this->getUsers();
        $userSelect = null;
        foreach ($users as $user) {
            if ($user["id"] == $id) {
                $userSelect = $user;
                break;
            }
        }
        return $userSelect;
    }
}
