<?php
$PATH = "colores.txt";

// ===== Escribiendo el archivo =====
$file = fopen($PATH, "w");

if ($file) {
    if (flock($file, LOCK_EX)) {
        // Escribiendo
        fwrite($file, "rojo\n");
        fwrite($file, "verde\n");
        fwrite($file, "azul\n");

        flock($file, LOCK_UN);
    } else {
        echo "No se puede bloquear el archivo.";
    }

    fclose($file);
} else {
    echo "No se puede abrir el archivo.";
}

// ===== Leyendo el archivo =====
$contenido = file_get_contents($PATH);
if ($contenido) {
    echo $contenido;
} else {
    echo "No se pudo leer el archivo.";
}

// ===== Sobreescribiendo el archivo =====
file_put_contents($PATH, "magenta\n");
$contenido = file_get_contents($PATH);
if ($contenido) {
    echo $contenido;
} else {
    echo "No se pudo leer el archivo.";
}