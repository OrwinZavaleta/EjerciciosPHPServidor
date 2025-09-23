<?php

function crearMultiplicador($factor)
{
    return function ($num) use ($factor) {
        return $factor * $num;
    };
}

$por2 = crearMultiplicador(2);

echo $por2(7);
