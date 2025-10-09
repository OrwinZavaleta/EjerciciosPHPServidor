<?php

namespace Orwin\Proyecto2\Routes;

class Router
{
    private $routes = [];

    public function __construct()
    {
        $this->loadRoutes();
    }

    public function loadRoutes()
    {
        $this->routes['/'] = ['controller' => 'HomeController', 'action' => 'index'];
        $this->routes['/formulario'] = ['controller' => 'HomeController', 'action' => 'formulario'];
        $this->routes['/contacto'] = ['controller' => 'HomeController', 'action' => 'contacto'];
        $this->routes['/formulario/procesar'] = ['controller' => 'HomeController', 'action' => 'procesar'];
        $this->routes['/about'] = ['controller' => 'HomeController', 'action' => 'about'];
    }

    public function handleRequest()
    {
        $path = $_SERVER['REQUEST_URI'];

        error_log("path: " . $path);

        if (isset($this->routes[$path])) {
            $route = $this->routes[$path];
            $controllerClass = '\\Orwin\\Proyecto2\\Controllers\\' . $route['controller'];

            $action = $route['action'];

            error_log("ruta: " . $route['controller'] . "   action: " . $action);

            if (class_exists($controllerClass) && method_exists($controllerClass, $action)) {
                // Se podria mandar la request a todos los mehtods y cada uno lo maneja si lo necesita.
                $controller = new $controllerClass();
                // Esto se agrego para que si hay un POST y la ruta es esa, se mande a procesar.
                /* if ($_SERVER['REQUEST_METHOD'] === 'POST' && $path === '/formulario/procesar') {
                    $controller->$action($_POST);
                } else {
                    $controller->$action();
                } */
                $controller->$action($_REQUEST);
            } else {
                http_response_code(404);
                echo "404 Not Found";
            }
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}

$router = new Router();
$router->handleRequest();