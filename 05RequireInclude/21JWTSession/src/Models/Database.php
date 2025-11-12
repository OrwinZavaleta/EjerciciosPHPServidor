<?php

namespace App\Models;

use App\Models\User;
use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public function __construct($host, $database, $username, $password)
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../..");
        $dotenv->load();

        try {
            $capsule = new Capsule();
            $capsule->addConnection([
                "driver" => "mysql",
                "host" => $host,
                "database" => $database,
                "username" => $username,
                "password" => $password,
                "charset" => "utf8mb4",
                "collation" => "utf8mb4_general_ci",
                "prefix" => "",
            ]);

            $capsule->setAsGlobal();
            $capsule->bootEloquent();
            error_log("coneccion exitosaa");
        } catch (\Exception $e) {
            error_log("no se conecto a la bbdd");
        }
    }

    public function addUser($username, $password)
    {
        try {
            User::create([
                "username" => $username,
                "password" => $password,
            ]);
            error_log("Usuario creado");
        } catch (\Exception $e) {
            error_log("Error al crear el ususario " . $e->getMessage());
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
