<?php

namespace Orwin\Formulario\Routes;

use Orwin\Formulario\Controllers\HomeController;

$controller = new HomeController();

$path = $_SERVER["REQUEST_URI"];

switch ($path) {
    case '/':
        $controller->index();
        break;
    case '/procesar':
        $controller->procesar($_REQUEST);
        break;
    default:
        http_response_code(404);
        echo "Esa pagina no existe";
        break;
}
