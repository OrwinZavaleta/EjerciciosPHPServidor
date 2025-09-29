<?php

$numeros = [23, 43, 12, 34, 54, 65, 20, 1, 2, 6];

$numerosPares = array_filter($numeros, fn($num) => $num % 2 === 0);

