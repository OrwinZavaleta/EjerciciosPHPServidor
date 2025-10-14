<?php

namespace Orwin\Model\Controllers;

use Orwin\Model\Models\UserModel;

class HomeController
{
    private $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function index()
    {

        // Se puede remplazar por un array y en la vista un foreach.
        // $users = "<ul>";

        $users = $this->model->getNames();

        // if ($usersM) {
        //     foreach ($usersM as $id => $user) {
        //         $users .= "<li>$user <a href='/deleteUser?id=$id'>Eliminar</a></li>";
        //     }
        // }

        // $users .= "</ul>";

        // ob_start();
        require __DIR__ . "/../Views/home.php";
        // echo ob_get_clean();
    }

    public function addUser($datos)
    {
        $name = htmlspecialchars(trim($datos["name"]));
        $correcto = -1;
        if (isset($name) && !empty($name)) {
            if ($this->model->saveName($name)) {
                $correcto = 1;
            } else {
                $correcto = 0;
            }
        }
        // ob_start();
        require __DIR__ . "/../Views/welcome.php";
        // echo ob_get_clean();
    }
    
    public function deleteUser($peticion)
    {
        $id = $peticion["id"];
        
        $nameD = $this->model->delName($id);
                
        require __DIR__ . "/../Views/despedida.php";

        // header("location: /");
        // http_response_code(303);
    }
}
