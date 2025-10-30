<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;

// use App\Controllers\Controller;

// $controller = new Controller();
/*
// $path = $_SERVER["REQUEST_URI"];
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); //Para recordar.


switch ($path) {
    case '/':
        $controller->index($_GET);
        break;
    case '/delDepart':
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $controller->delDepart($_GET);
        }
        break;
    case '/updateDepartForm':
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $controller->updateDepartForm($_GET);
        }
        break;
    case '/updateDepart':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $controller->updateDepart($_POST);
        }
        break;
    case '/createDepartForm':
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $controller->createDepartForm($_GET);
        }
        break;
    case '/createDepart':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $controller->createDepart($_POST);
        }
        break;
    default:
        error_log("por aqui");
        $controller->error404();
        break;
}
 */

class Router
{
    private $routes = [];

    public function __construct()
    {
        $this->loadRoutes();
    }

    public function loadRoutes()
    {
        $this->routes["/"] = ["controller" => "Controller", "action" => "index"];
        $this->routes["/updateDepartForm"] = ["controller" => "Controller", "action" => "updateDepartForm"];
        $this->routes["/delDepart"] = ["controller" => "Controller", "action" => "delDepart"];
        $this->routes["/updateDepart"] = ["controller" => "Controller", "action" => "updateDepart"];
        $this->routes["/createDepartForm"] = ["controller" => "Controller", "action" => "createDepartForm"];
        $this->routes["/createDepart"] = ["controller" => "Controller", "action" => "createDepart"];
    }

    public function handleRequest()
    {
        $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

        if (isset($this->routes[$path])) {
            $route = $this->routes[$path];

            $controllerClass = "\\App\\Controllers\\" . $route["controller"];

            $action = $route["action"];

            if (class_exists($controllerClass) && method_exists($controllerClass, $action)) {
                $controller = new $controllerClass();

                // if ($_SERVER["REQUEST_METHOD"] == "POST") {
                //     $controller->$action($_POST);
                // } else if ($_SERVER["REQUEST_METHOD"] == "GET") {
                //     $controller->$action($_GET);
                // }
                $controller->$action($_REQUEST);
            } else {
                $controller = new \App\Controllers\Controller();

                $controller->error404();
            }
        } else {
            $controller = new \App\Controllers\Controller();

            $controller->error404();
        }
    }
}


$router = new Router();

$router->handleRequest();
