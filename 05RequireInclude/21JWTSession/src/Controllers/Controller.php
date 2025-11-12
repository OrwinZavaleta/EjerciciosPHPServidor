<?php

namespace App\Controllers;

use Dotenv\Dotenv;
use App\Models\Database;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Firebase\JWT\JWT; // Esta es la libreria con la que funciona JWT
use Firebase\JWT\Key;

class Controller
{
    //Instanciar el modelo
    private $myModel;
    private $twig;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../..");
        $dotenv->load();
        $loader = new FilesystemLoader(__DIR__ . "/../Views");
        $this->twig = new Environment($loader);
        $this->myModel = new Database($_ENV["DB_HOST"], $_ENV["DB_DATABASE"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"]);

        $decoded = $this->comprobarJWT();
        if ($decoded !== false) {
            $this->twig->addGlobal("name", $decoded["user"]);
        }
    }

    public function index()
    {
        echo $this->twig->render("home.html.twig");
    }
    public function loginForm()
    {
        echo $this->twig->render("loginForm.html.twig");
    }
    public function login($request)
    {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        $user = $this->myModel->getUser($username);

        if (isset($user) && password_verify($password, $user->password)) {
            $this->crearJWT($username);
            echo $this->twig->render("session/success.html.twig", ["name" => $username]);
        } else {
            echo $this->twig->render("session/fail.html.twig");
        }
    }
    public function registerForm()
    {
        echo $this->twig->render("registerForm.html.twig");
    }
    public function register($request)
    {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        $user = $this->myModel->getUser($username) ?? null;

        if ($user === null) {
            $this->myModel->addUser($username, $password);

            $this->crearJWT($username);

            echo $this->twig->render("session/success.html.twig", ["name" => $username]);
        } else {
            echo $this->twig->render("session/fail.html.twig");
        }
    }
    public function logout()
    {
        setcookie("token", "", time() - 3600, "/", "", false, true);

        header("location: /");
    }

    public function crearJWT($username)
    {
        $key = $_ENV["KEY"];
        if ($key === false) {
            die("Error: La variable de entorno 'KEY' no esta definida.");
        }

        $payload = [
            "user" => $username,
            "iat" => time(),
            "exp" => time() + 3600,
        ];

        $jwt = JWT::encode($payload, $key, "HS256");

        setcookie("token", $jwt, time() + 3600, "/", "", false, true);
    }
    public function comprobarJWT()
    {
        $key = $_ENV["KEY"];
        $token = $_COOKIE["token"] ?? null;

        if ($token) {
            try {
                $decoded = JWT::decode($token, new Key($key, "HS256")); // son los datos del payload
                return json_decode(json_encode($decoded), true);
            } catch (\Exception $e) {
                return false;
            }
        } else {
            return false;
        }
    }
}
