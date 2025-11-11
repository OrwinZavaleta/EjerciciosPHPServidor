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
    public function register($request)
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
        echo "se cerro la sesion";

        session_unset();

        session_destroy();
        // $_SESSION["username"] = null;

        header("location: /");
    }
    public function compraForm()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        /* $user = $this->myModel->getUser($_SESSION["username"]);

        echo $this->twig->render("compraForm.html.twig", ["compra" => $user->compra]); */
        // print_r(json_decode($_COOKIE["compra"], true));
        $compra = json_decode($_COOKIE["compra"], true)[$_SESSION["username"]] ?? ""; // La solucion de Mikel es mas facil
        echo $this->twig->render("compraForm.html.twig", ["compra" => $compra]);
    }

    public function compra($request)
    {
        // $compra = filter_input(INPUT_POST, "compra", FILTER_SANITIZE_SPECIAL_CHARS); // No funciona bien // ---------------
        $compra = htmlspecialchars($request["compra"]);


        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        // $this->myModel->updateUser($_SESSION["username"], $compra);

        if (isset($_COOKIE["compra"])) {
            $compras = json_decode($_COOKIE["compra"], true);

            $compras[$_SESSION["username"]] = $compra;

            setcookie("compra", json_encode($compras), time() + 600, "/");
        } else {
            setcookie("compra", json_encode([$_SESSION["username"] => $compra]), time() + 600, "/");
        }

        header("location: /");
    }
}
