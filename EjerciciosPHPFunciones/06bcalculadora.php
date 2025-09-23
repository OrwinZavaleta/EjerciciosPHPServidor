<?php

$operaciones = ["suma", "resta", "producto", "division"];

function suma($a, $b)
{
    return $a + $b;
}

$resta = function ($a, $b) {
    return $a - $b;
};

$producto = fn($a, $b) => $a * $b;

$division = function ($a, $b) {
    if ($b == 0) {
        return null;
    } else {
        return $a / $b;
    }
};



// Inicio del programa
$respuesta = null;
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $num1 = $_REQUEST["num1"];
    $num2 = $_REQUEST["num2"];

    if (!is_numeric($num1)) {
        $mensaje = "La entrada 1 es una cadena... Extraño...";
        $_REQUEST["operacion"] = "otraCosa";
    } else {
        $num1 = floatval($num1);
    }

    if (!is_numeric($num2)) {
        $mensaje = "La entrada 2 es una cadena... Extraño...";
        $_REQUEST["operacion"] = "otraCosa";
    } else {
        $num2 = floatval($num2);
    }

    switch ($_REQUEST["operacion"]) {
        case "suma":
            $respuesta = suma($num1, $num2);
            break;
        case "resta":
            $respuesta = $resta($num1, $num2);
            break;
        case "producto":
            $respuesta = $producto($num1, $num2);
            break;
        case "division":
            $div = $division($num1, $num2);
            if ($div === null) {
                $mensaje = "NO SE PUEDE DIVIDIR POR 0 !!!";
            } else {
                $respuesta = $div;
            }
            break;
        default:
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Formulario:</h1>
    <form method="post">
        <label for="operacion">Indique la operacion: </label>
        <select name="operacion" id="operacion" required>
            <option value="" selected disabled>Elegir</option>
            <?php for ($i = 0; $i < count($operaciones); $i++): ?>
                <option value="<?= $operaciones[$i] ?>"><?= $operaciones[$i] ?></option>
            <?php endfor; ?>

        </select><br>

        <label for="num1">Ingrese el primer numero: </label>
        <input type="number" name="num1" id="num1" required><br>

        <label for="num2">Ingrese el segundo numero: </label>
        <input type="number" name="num2" id="num2" required>

        <input type="submit" value="Operar">
    </form>

    <?php if ($respuesta != null): ?>
        <p>El resultado de la operacion es: <?= $respuesta ?></p>
    <?php else: ?>
        <p><?= $mensaje ?></p>
    <?php endif; ?>

</body>

</html>