<?php

namespace App\Controllers;

use App\Models\Database;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{
    //Instanciar el modelo
    private $twig;
    private $user;
    private $pass;
    private $isLog = false;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . "/../Views");
        $this->twig = new Environment($loader);

        ini_set("session.cookie_httponly", true);
        ini_set("session.gc_maxlifetime", 100);
        ini_set("session.cookie_lifetime", 100);
        ini_set("session.cookie_strictmode", true);


        $this->user = "admin";
        $this->pass = password_hash("admin", PASSWORD_BCRYPT);
        if (session_status() != PHP_SESSION_ACTIVE) { // si la sesion esta o no activa
            session_start();                           // es decir si se puso session_start antes o no
        }
        if (isset($_SESSION["user"])) {
            $this->isLog = true;
        } else {
            $this->isLog = false;
        }
    }

    public function index()
    {
        echo $this->twig->render("home.html.twig", ["isLog" => $this->isLog]);
    }
    public function loginForm()
    {
        echo $this->twig->render("loginForm.html.twig",  ["isLog" => $this->isLog]);
    }
    public function login($request)
    {
        // $user = $request["user"];
        // $pass = $request["password"];

        $user = filter_input(INPUT_POST, "user", FILTER_SANITIZE_SPECIAL_CHARS);
        $pass = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        // $user = htmlspecialchars($user);
        // $pass = htmlspecialchars($pass);

        // $passHash = passwsord_hash($pass, PASSWORD_BCRYPT);

        if ($user === $this->user && password_verify($pass, $this->pass)) {
            session_start();
            $_SESSION["user"] = $user;
            $_SESSION["pass"] = $pass;
            $this->isLog = true;
            echo $this->twig->render("session/success.html.twig",  ["isLog" => $this->isLog, "name" => $_SESSION["user"] = $user]);
        } else {
            echo $this->twig->render("session/fail.html.twig", ["isLog" => $this->isLog]);
        }
    }
    public function logout()
    {
        ini_set("session.gc_maxlifetime", 100);
        ini_set("session.cookie_lifetime", 100);
        session_start();
        session_unset();
        session_destroy();
        // $this->isLog = false;
        // echo $this->twig->render("home.html.twig", ["isLog" => $this->isLog]);
        header("location: /");
    }
}
