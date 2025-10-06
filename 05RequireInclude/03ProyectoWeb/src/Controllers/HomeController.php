<?php

namespace Orwin\ProyectoWeb\Controllers;

class HomeController
{
    public function index()
    {
        $filePath = __DIR__ . "/../../public/home.html";

        if (file_exists($filePath)) {
            echo file_get_contents($filePath);
        } else {
            http_response_code(418);
            echo "418 I'm a teapod...";
        }
    }
    public function procesar($peticion)
    {
        if (isset($peticion['nombre']) && !empty($peticion['nombre'])) {
            $nombre = htmlspecialchars($peticion['nombre']);

            echo "<h1>Hola $nombre, Bienvenid@ a nuestra web...</h1>";
        } else {
            echo "<h1>Por favor introduce un nombr valido.</h1>";
        }
    }
}
