<?php

namespace Orwin\Model\Routes;

use Orwin\Model\Controllers\HomeController;

$controller = new HomeController();
// $path = $_SERVER["REQUEST_URI"];
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); //Para recordar.


switch ($path) {
    case '/':
        $controller->index();
        break;
    case '/addUser':
        $controller->addUser($_REQUEST);
        break;
    case '/deleteUser':
        $controller->deleteUser($_GET);
        break;
    default:
        http_response_code(404);
        echo "Pagina no encontrada";
}
