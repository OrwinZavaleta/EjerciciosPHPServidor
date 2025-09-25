<?php

function suma($a, $b)
{
    return $a + $b;
}

$resta = function ($a, $b) {
    return $a - $b;
};

$producto = fn($a, $b) => $a * $b;

$division = function ($a, $b) {
    if ($b ==0) throw new Exception("No se puede dividor por 0 !!!!!!!!!");
    return $a / $b;
};

function comprobarNumerico($num)
{
    if (!is_numeric($num)) {
        return null;
    } else {
        return floatval($num);
    }
}

function pedirNumero($posicion)
{
    echo "ingrese el numero $posicion\n";
    $num1 = trim(fgets(STDIN));
    $num1 = comprobarNumerico($num1);

    while ($num1 === null) {
        echo "Entrada incorrecta: \n";
        $num1 = trim(fgets(STDIN));
        $num1 = comprobarNumerico($num1);
    }

    return $num1;
}

$entrada = -1;
while ($entrada != 0) {
    echo "\n\n
        Calculadora:

        1. suma
        2. resta
        3. multiplicacion
        4. division
        0. salir

        ingrese opcion: 
    ";

    $num1 = null;
    $num2 = null;

    # Entrada de opcion
    $entrada = trim(fgets(STDIN));

    $entrada = comprobarNumerico($entrada);

    while ($entrada === null || $entrada < 0 || $entrada > 4) {
        echo "Entrada incorrecta: \n";
        $entrada = trim(fgets(STDIN));
        $entrada = comprobarNumerico($entrada);
    }

    if ($entrada == 0) {
        break;
    }


    # Entrada de num1
    $num1 = pedirNumero(1);


    # Entrada de num2
    $num2 = pedirNumero(2);


    switch ($entrada) {
        case 1:
            echo "El resultado de la suma es: ";
            echo suma($num1, $num2);
            break;
        case 2:
            echo "El resultado de la resta es: ";
            echo $resta($num1, $num2);
            break;
        case 3:
            echo "El resultado del producto es: ";
            echo $producto($num1, $num2);
            break;
        case 4:
            $div;
            try {
                $div = $division($num1, $num2);
            } catch (Exception $e) {
                echo "NO SE PUEDE DIVIDIR POR 0 !!!". $e->getMessage();
            } finally {
                echo "Division realizada ";
            }
            break;            
    }
}

echo "Saliendo del programa... ";
