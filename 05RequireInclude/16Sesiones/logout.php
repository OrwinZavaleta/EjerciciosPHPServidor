<?php
ini_set("session.gc_maxlifetime", 10);
ini_set("session.cookie_lifetime", 10);

session_start();

session_unset();

session_destroy();

echo "<h2>Sesion cerrada</h2>";
echo "<p><a href='01inicio.php'>Volver al inicio</a></p>";
