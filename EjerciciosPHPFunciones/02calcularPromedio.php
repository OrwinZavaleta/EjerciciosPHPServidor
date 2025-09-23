<?php

declare(strict_types=1);

function calcularPromedio(array $numeros): float
{
    $promedio = array_sum($numeros) / count($numeros);

    return $promedio;
}

$calcularPromedioAnonima = function (array $numeros): float {
    $promedio = array_sum($numeros) / count($numeros);

    return $promedio;
};

$calcularPromedioFlecha =  fn(array $numeros): float => array_sum($numeros) / count($numeros);


$numeros = [1, 2, 3, 4, 5, 6, 7];

echo calcularPromedio($numeros);
echo "\n";
echo $calcularPromedioAnonima($numeros);
echo "\n";
echo $calcularPromedioFlecha($numeros);
