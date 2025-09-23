<?php

$numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

print_r(array_filter($numeros, fn($num) => $num % 2 === 0));
