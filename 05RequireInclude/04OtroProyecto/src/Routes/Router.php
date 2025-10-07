<?php

namespace Orwin\Proyecto2\Routes;

use Orwin\Proyecto2\Controllers\HomeController;

$controller = new HomeController();

$ruta = $_SERVER["REQUEST_URI"];


switch ($ruta) {
    case '/':
        $controller->index();
        break;
    case '/formulario':
        $controller->formulario();
        break;
    case '/contacto':
        $controller->contacto();
        break;
    case '/formulario/procesar':
        $controller->procesar($_POST);
        break;
    case '/about':
        $controller->about();
        break;

    default:
        http_response_code(404);
        echo "Error 404.";
        break;
}
            