<?php
$PATH = "colores.txt";

// ===== Escribiendo el archivo =====
$file = fopen($PATH, "w+");

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


    // ===== Leyendo el archivo =====
    fseek($file, 0, SEEK_SET);
    // $contenido = file_get_contents($PATH);
    $contenido = fread($file, filesize($PATH));
    if ($contenido) {
        echo $contenido;
    } else {
        echo "No se pudo leer el archivo.";
    }

    // ===== Sobreescribiendo el archivo =====
    // file_put_contents($PATH, "magenta\n");
    // $contenido = file_get_contents($PATH);

    ftruncate($file, 0); //borrarlo todo
    fwrite($file, "magenta"); //escribir

    fseek($file, 0, SEEK_SET); //cursor al inicio
    $contenido = fread($file, filesize($PATH)); //leer

    if ($contenido) {
        echo $contenido;
    } else {
        echo "No se pudo leer el archivo.";
    }

    fclose($file);
} else {
    echo "No se puede abrir el archivo.";
}
