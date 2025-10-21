<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
</head>

<body>

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

</body>

</html>