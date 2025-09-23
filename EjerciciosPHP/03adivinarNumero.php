<?php

$random = rand(1, 100);
$entrada;

$contador = 0;

do {
    echo "Adivina el numero (0-100): ";
    $entrada = trim(fgets(STDIN));
    $entrada = intval($entrada);
    $contador++;

    echo match (true) {
        $entrada < $random => "El numero que ingresaste es menor\n",
        $entrada > $random => "El numero que ingresaste es mayor\n",
        default => "El numero es igual, Felicitaciones!!!!!!!!!!!!!!\n"
    };
} while ($entrada !== $random);

echo "Lo completaste en $contador intentos";

