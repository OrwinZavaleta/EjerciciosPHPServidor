<?php

$redirigir = false;
$titulo = "proyecto Buffer";
$encabezado = "Proyecto de Bufferes";
$contenido = "Lorem Ipsum";


ob_start();

require "template.php";

$web = ob_get_clean();

if ($redirigir) {
    header("Location: /otraWeb.html");
} else {
    $web = str_replace("Lorem Ipsum", "Otra cosa muy distinta", $web);
    echo $web;
}
