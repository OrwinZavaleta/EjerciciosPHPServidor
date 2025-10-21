<?php

namespace App\Models;

use App\Models\Depart;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public function __construct()
    {
        try {
            $capsule = new Capsule;

            $capsule->addConnection([
                "driver" => "mysql",
                "host" => "localhost",
                "database" => "01pdo",
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

    public function getDepart($id)
    {
        return Depart::find($id);
    }

    public function updateDepart($depart_no, $dnombre, $loc)
    {
        $depa = Depart::find($depart_no);
        if ($depa) {
            $depa->dnombre = $dnombre;
            $depa->loc = $loc;
            $depa->save();
            error_log("Actualizado con exito el departamento");
        } else {
            error_log("ese depart no existe.");
        }
    }
    public function delDepart($id)
    {
        $depa = Depart::find($id);
        if ($depa) {
            $depa->delete();
            error_log("Se elimino con exito");
        } else {
            error_log("Error al eliminar.");
        }
    }
    public function listDepart()
    {
        return Depart::all();
    }
    public function insertDepart($depart_no, $dnombre, $loc)
    {
        try {
            Depart::create([
                "depart_no" => $depart_no,
                "dnombre" => $dnombre,
                "loc" => $loc,
            ]);
            error_log("Se creo correctamente el departamento");
        } catch (\Exception $e) {
            error_log("Error al crear el departamento");
        }
    }
}
