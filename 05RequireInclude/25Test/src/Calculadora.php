<?php

namespace App;

use InvalidArgumentException;

class Calculadora
{
    public function __construct() {}

    public function sumar($num1, $num2)
    {
        return $num1 + $num2;
    }

    public function restar($min, $sus)
    {
        return $min - $sus;
    }

    public function multiplicar($fac1, $fac2)
    {
        return $fac1 * $fac2;
    }

    public function dividir($num, $dem)
    {
        if ($dem === 0) {
            throw new InvalidArgumentException("No se puede dividir por 0", 1);
        }
        return $num / $dem;
    }
}
