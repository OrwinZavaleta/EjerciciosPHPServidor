<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1>Menu</h1>

    <!-- <ul>
        <li><a href="/listDepart">Listado de Depatartamentos</a></li>
        <li><a href="/createDepartForm">Crear un Departamentos</a></li>
        <li><a href="/">Otra ruta</a></li>
    </ul> -->

    <h2>Listado de departamentos</h2>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Ubicacion</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($departamentos as $a): ?>
                <tr>
                    <td><?= $a["depart_no"] ?></td>
                    <td><?= $a["dnombre"] ?></td>
                    <td><?= $a["loc"] ?></td>
                    <td><a href="/updateDepartForm?id=<?= $a["depart_no"] ?>">Editar</a></td>
                    <td><a href="/delDepart?id=<?= $a["depart_no"] ?>">Eliminar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>



    <?php if ($departamento): ?>
        <h3>Actualizando el departamento <?= $departamento["depart_no"] ?></h3>
        <form action="/updateDepart" method="post">

            <!-- <label for="id">Ingrese el id</label> -->
            <input type="hidden" name="id" id="id" value="<?= $departamento["depart_no"] ?>"> <br>
            <label for="id">Ingrese el nombre</label>
            <input type="text" name="nombre" id="nombre" value="<?= $departamento["dnombre"] ?>"> <br>
            <label for="id">Ingrese la ubicacion</label>
            <input type="text" name="ubicacion" id="ubicacion" value="<?= $departamento["loc"] ?>"> <br>

            <input type="submit" value="Actualizar">
        </form>

    <?php else: ?>
        <h3>Agregar un departamento</h3>
        <form action="/createDepart" method="post">

            <label for="id">Ingrese el id</label>
            <input type="number" name="id" id="id"> <br>
            <label for="id">Ingrese el nombre</label>
            <input type="text" name="nombre" id="nombre"> <br>
            <label for="id">Ingrese la ubicacion</label>
            <input type="text" name="ubicacion" id="ubicacion"> <br>

            <input type="submit" value="Añadir departamento">
        </form>
    <?php endif; ?>
</body>

</html>