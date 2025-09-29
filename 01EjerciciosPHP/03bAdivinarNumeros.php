<?php

session_start();

if (!isset($_SESSION['random'])) {
    $_SESSION['random'] = rand(1, 100);
    $_SESSION['contador'] = 0;
}

$resultado = null;
$numero;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_REQUEST["numero"];

    $numero = intval($numero);
    $_SESSION['contador']++;


    /* $resultado = match (true) {
        $numero < $_SESSION['random'] => "El numero que ingresaste es menor\n",
        $numero > $_SESSION['random'] => "El numero que ingresaste es mayor\n",
        default => "El numero es igual, Felicitaciones!!!!!!!!!!!!!!\n"
    }; */

    if ($numero < $_SESSION['random']) {
        $resultado = "El numero que ingresaste es menor\n";
    } elseif ($numero > $_SESSION['random']) {
        $resultado = "El numero que ingresaste es mayor\n";
    } else {
        $resultado = "El numero es igual, Felicitaciones!!!!!!!!!!!!!!\n";

        session_destroy();
    }
}

echo $_SESSION['random'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivinar Numero</title>
</head>

<body>
    <form method="post">
        <label for="numero">Ingrese el numero</label>
        <input type="number" name="numero" id="numero" required>

        <input type="submit" value="Comprobar">
    </form>

    <?php if ($resultado !== null): ?>
        <p><?= $resultado ?></p>
        <p>Has intentado <?= $_SESSION['contador'] ?> Veces</p>
    <?php endif; ?>
</body>

</html>