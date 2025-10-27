<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
</head>

<body>

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

</body>

</html>