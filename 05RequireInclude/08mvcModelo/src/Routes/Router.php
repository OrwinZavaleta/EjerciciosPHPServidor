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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $controller->addUser($_POST);
        }
        break;
    case '/deleteUser':
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $controller->deleteUser($_GET);
        }
        break;
    case '/formEditUser':
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $controller->formEditUser($_GET);
        }
        break;
    case '/editUser':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $controller->editUser($_POST);
        }
        break;
    default:
        http_response_code(404);
        echo "Pagina no encontrada";
}
