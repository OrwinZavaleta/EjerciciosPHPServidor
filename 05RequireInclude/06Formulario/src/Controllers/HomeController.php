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
        $respuesta = [];
        $name = $peticion["name"];
        $email = $peticion["email"];
        $password = $peticion["password"];
        $namePattern = "/^[a-zA-Z\s]+$/";
        $passPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

        if (isset($name) && !empty($name)) {
            if (!preg_match($namePattern, $name)) {
                $respuesta[] = "El nombre no es valido";
            }
        } else {
            $respuesta[] = "Nombre vacio";
        }

        if (isset($email) && !empty($email)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $respuesta[] = "El email no es valido";
            }
        } else {
            $respuesta[] = "Email vacio";
        }

        if (isset($password) && !empty($password)) {
            if (!preg_match($passPattern, $password)) {
                $respuesta[] = "La contraseña no es valido";
            }
        } else {
            $respuesta[] = "Password vacio";
        }

        if (strlen(count($respuesta) == 0)) {
            echo "<h1>Bienvenido a nuestra web $name</h1>";
        } else {
            echo "<ul>";
            foreach ($respuesta as $val) {
                echo "<li>$val</li>";
            }
            echo "</ul>";
        }
    }
}
