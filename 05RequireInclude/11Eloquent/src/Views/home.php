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
    <ul>
        <?php foreach ($departamentos as $a): ?>
            <li><?= $a["dnombre"] ?> ->> <?= $a["loc"] ?> <a href="/updateDepartForm?id=<?= $a["depart_no"] ?>">Editar</a> - <a href="/delDepart?id=<?= $a["depart_no"] ?>">Eliminar</a>
                <br><br>
                <ul>
                    <?php foreach ($empleados as $e): ?>
                        <?php if ($e["depart_no"] == $a["depart_no"]): ?>
                            <li>
                                <?= $e["apellido"] ?> =>> <?= $e["oficio"] ?> <a href="/updateEmpleForm?id=<?= $e["emple_no"] ?>">Editar</a> - <a href="/deleteEmple?id=<?= $e["emple_no"] ?>">Eliminar</a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
                <br>
            </li>
        <?php endforeach; ?>
    </ul>



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
            <label for="nombre">Ingrese el nombre</label>
            <input type="text" name="nombre" id="nombre"> <br>
            <label for="ubicacion">Ingrese la ubicacion</label>
            <input type="text" name="ubicacion" id="ubicacion"> <br>

            <input type="submit" value="Añadir departamento">
        </form>
        <h3>Agregar un Empleado</h3>
        <form action="/createEmple" method="post">

            <label for="id">Ingrese el id</label>
            <input type="number" name="id" id="id"> <br>
            <label for="apellido">Ingrese el apellido</label>
            <input type="text" name="apellido" id="apellido"> <br>
            <label for="oficio">Ingrese el oficio</label>
            <input type="text" name="oficio" id="oficio"> <br>

            <label for="depart">Ingrese el departamento</label>
            <select name="depart" id="depart">
                <?php foreach ($departamentos as $a): ?>
                    <option value="<?= $a["depart_no"] ?>"><?= $a["dnombre"] ?></option>
                <?php endforeach; ?>
            </select>

            <br>

            <input type="submit" value="Añadir empleado">
        </form>
    <?php endif; ?>
</body>

</html>