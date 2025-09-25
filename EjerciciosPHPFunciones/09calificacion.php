<?php

function calcularPromedio($numeros)
{
    $promedio = array_sum($numeros) / count($numeros);

    return $promedio;
}


$clasificar = function ($nota) {
    $cal = null;

    if ($nota < 5 && $nota > 0) {
        $cal = "Suspenso";
    } elseif ($nota < 7) {
        $cal = "Aprobado";
    } elseif ($nota < 9) {
        $cal = "Notable";
    } elseif ($nota <= 10) {
        $cal = "Sobresaliente";
    } else {
        $cal = null;
    }
    return $cal;
};

$notas = [1, 4, 2, 6, 4, 7, 9, 10, 2, 45];

print_r(array_map($clasificar, $notas));

print_r(array_filter($notas, fn($nota) => $nota >= 5));
