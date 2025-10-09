<?php

namespace Orwin\Formulario\Controllers;

class HomeController
{
    public function index()
    {
        $path = __DIR__ . "/../Views/formulario.html";
        if (file_exists($path)) {
            echo file_get_contents($path);
        } else {
            http_response_code(404);
            echo "Esa pagina no existe";
        }
    }
    public function procesar($peticion)
    {
        $respuesta = "<ul>";
        $name = $peticion["name"];
        $email = $peticion["email"];
        $password = $peticion["password"];
        $namePattern = "/^[a-zA-Z\s]+$/";
        $passPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

        if (isset($name) && !empty($name)) {
            if (!preg_match($namePattern, $name)) {
                $respuesta .= "<li>El nombre no es valido</li>";
            }
        } else {
            $respuesta .= "<li>Nombre vacio</li>";
        }

        if (isset($email) && !empty($email)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $respuesta .= "<li>El email no es valido</li>";
            }
        } else {
            $respuesta .= "<li>Email vacio</li>";
        }

        if (isset($password) && !empty($password)) {
            if (!preg_match($passPattern, $password)) {
                $respuesta .= "<li>La contraseña no es valido</li>";
            }
        } else {
            $respuesta .= "<li>Password vacio</li>";
        }

        if ($respuesta == "<ul>") {
            echo "<h1>Bienvenido a nuestra web $name</h1>";
        } else {
            echo $respuesta . "</ul>";
        }
    }
}
