<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edutar Usuario</title>
</head>

<body>
    <h1><?= $user ?></h1>
    <form action="/editUser" method="post">
        <label for="nombre">Ingrese el nuevo nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?= $user ?>">

        <input type="hidden" name="id" value="<?= $id ?>">

        <input type="submit" value="Actualizar">
    </form>
</body>

</html>