<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>

<body>
    <?php if ($correcto == 1): ?>
        <h1>Bienvenido <?= $name ?>, todo salio bien</h1>
    <?php elseif ($correcto == 0): ?>
        <h1>Hubo un error, no pudimos agregarle.</h1>
    <?php else: ?>
        <h1>Nombre no valido</h1>
    <?php endif; ?>
    <a href="/">Regresar a la pagina principal</a>
</body>

</html>