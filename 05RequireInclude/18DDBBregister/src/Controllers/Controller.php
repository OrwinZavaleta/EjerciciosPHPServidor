<?php

namespace App\Controllers;

use App\Models\Database;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{
    //Instanciar el modelo
    private $myModel;
    private $twig;

    public function __construct()
    {
        $this->myModel = new Database();
        $loader = new FilesystemLoader(__DIR__ . "/../Views");
        $this->twig = new Environment($loader);

        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (isset($_SESSION["username"])) {
            $this->twig->addGlobal("name", $_SESSION["username"]);
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

        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        $_SESSION["username"] = $username;

        if (password_verify($password, $user["password"])) {
            echo $this->twig->render("session/success.html.twig", ["name" => $_SESSION["username"]]);
        } else {
            echo $this->twig->render("session/fail.html.twig");
        }
    }
    public function registerForm()
    {
        echo $this->twig->render("registerForm.html.twig");
    }
    public function register($request) // No funciona
    {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $private = filter_input(INPUT_POST, "private", FILTER_SANITIZE_SPECIAL_CHARS);

        $passHash = password_hash($password, PASSWORD_BCRYPT);

        try {
            $this->myModel->addUser($username, $passHash);

            if (session_status() != PHP_SESSION_ACTIVE) {
                session_start();
            }

            $_SESSION["username"] = $username;
            $_SESSION["private"] = $private;

            echo $this->twig->render("session/success.html.twig", ["name" => $_SESSION["username"]]);
        } catch (\Exception $e) {
            echo $this->twig->render("session/fail.html.twig");
        }
    }
    public function logout()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        session_unset();

        session_destroy();
        // $_SESSION["username"] = null;

        header("location: /");
    }
    public function private()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        echo $this->twig->render("private.html.twig", ["private" => $_SESSION["private"]]);
    }
}
