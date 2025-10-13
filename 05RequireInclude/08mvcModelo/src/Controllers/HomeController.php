<?php

namespace Orwin\Model\Controllers;

use Orwin\Model\Models\UserModel;

class HomeController
{
    public function index()
    {
        $model = new UserModel();

        $users = "<ul>";

        $usersM = $model->getNames();

        if ($usersM) {
            foreach ($usersM as $id => $user) {
                $users .= "<li>$user <a href='/deleteUser?id=$id'>Eliminar</a></li>";
            }
        }

        $users .= "</ul>";

        ob_start();
        require __DIR__ . "/../Views/home.php";
        echo ob_get_clean();
    }

    public function addUser($datos)
    {
        $model = new UserModel();
        $texto = ""; // Se usa en el archivo de welcome.

        $name = trim($datos["name"]);
        if (isset($name) && !empty($name)) {
            if ($model->saveName($name)) {
                $texto = "Bienvenido $name, todo salio bien";
            } else {
                $texto = "Hubo un error, no pudimos agregarle.";
            }
        } else {
            $texto = "Nombre incorrecto, no se le ha agregado.";
        }

        ob_start();
        require __DIR__ . "/../Views/welcome.php";
        echo ob_get_clean();
    }

    public function deleteUser($peticion)
    {
        $model = new UserModel();
        $id = $peticion["id"];

        $model->delName($id);

        header("location: /");
        http_response_code(303);
    }
}
