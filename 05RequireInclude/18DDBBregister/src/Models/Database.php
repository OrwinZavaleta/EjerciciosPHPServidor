<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public function __construct()
    {
        try {
            $capsule = new Capsule();

            $capsule->addConnection([
                "driver" => "mysql",
                "host" => "localhost",
                "database" => "logInOut",
                "username" => "root",
                "password" => "",
                "charset" => "utf8mb4",
                "collation" => "utf8mb4_general_ci",
                "prefix" => "",
            ]);

            $capsule->setAsGlobal();
            $capsule->bootEloquent();
            error_log("coneccion exitosa.");
        } catch (\Exception $e) {
            die("Error al conectar a la base de datos: " . $e->getMessage());
        }
    }

    public function addUser($user, $passHash)
    {


        try {
            /* User::create([
                "username" => $user,
                "password" => $passHash,
            ]); */

            $userObj = new User();

            $userObj->username = $user;
            $userObj->password = $passHash;
            $userObj->save();

            error_log("Ususario insertado");
        } catch (\Exception $e) {
            error_log("Error al agregar el usuario " . $e->getMessage());
        }
    }

    public function getUser($username)
    {
        try {
            $user = User::where("username", $username)->first();
        } catch (\Exception $e) {
            error_log("Error al buscar el usuario " . $e->getMessage());
        }
        return $user ?? null;
    }
}
