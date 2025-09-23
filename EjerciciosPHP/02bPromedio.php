<?php
$promedio=null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeros = $_REQUEST["numeros"];

    $numeros = explode(' ', $numeros);
    $numeros = array_map("intval", $numeros);

    $cantidad  = count($numeros);
    $sumatoria = array_sum($numeros);

    if ($cantidad > 0) {
        $promedio = $sumatoria / $cantidad;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promedio</title>
</head>

<body>

    <form method="post">
        <label for="numeros">Ingrese los numeros separados por espacios:</label>
        <input type="text" name="numeros" required>

        <input type="submit" value="Enviar">

        <?php if ($promedio != null): ?>
            <p>El promedio es <?= $promedio ?></p>
        <?php endif; ?>
    </form>
</body>

</html>