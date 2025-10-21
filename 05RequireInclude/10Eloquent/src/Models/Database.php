<?php

namespace App\Models;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public function __construct()
    {
        try {
            $capsule = new Capsule;

            $capsule->addConnection([
                "driver" => "mysql",
                "host" => "127.0.0.1",
                "database" => "01pdo",
                "username" => "root",
                "password" => "",
                "charset" => "utf8",
                "cllation" => "utf8_unicode_ci",
                "prefix" => "",
            ]);

            $capsule->setAsGlobal();
            $capsule->bootEloquent();

            error_log("coneccion exitosa.");
        } catch (\Exception $e) {
            die("Error al conectar a la base de datos: " . $e->getMessage());
        }
    }
}
