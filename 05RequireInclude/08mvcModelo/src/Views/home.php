<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>

<body>
    <h1>Lista de nombres</h1>
    <div>
        <ul>
            <?php foreach ($users as $id => $user): ?>
                <li>
                    <?= $user ?>
                    <a href="/deleteUser?id=<?= $id ?>">Eliminar</a>
                    <a href="/formEditUser?id=<?= $id ?>">Editar</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <hr>

    <form action="/addUser" method="post">
        <label for="name">Introduce el nombre del usuario: </label>
        <input type="text" name="name" id="name">

        <input type="submit" value="Crear usuario">
    </form>
</body>

</html>