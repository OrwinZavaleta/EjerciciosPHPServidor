<?php
ini_set("session.gc_maxlifetime", 10);
ini_set("session.cookie_lifetime", 10);

session_start();


if (isset($_SESSION['usuario'])) {
    echo "<h2>Sesion activa</h2>";
    echo "<p>Usuario: {$_SESSION['usuario']}</p>";
    echo "<p>Hora: {$_SESSION['hora']}</p>";
} else {
    echo "<h2>No hay una sesion</h2>";
}

echo "<p><a href='01inicio.php'>Volver al inicio</a></p>";
