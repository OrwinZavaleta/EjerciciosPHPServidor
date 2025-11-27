<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>Creacion de ususarios</h2>

    <form action="/store" method="post">
        @csrf
        <label for="nombre">Nombre del ususario</label>
        <input type="text" name="nombre" id="nombre">

        <label for="email">Email del ususario</label>
        <input type="text" name="email" id="email">

        <input type="submit" value="Crear">
    </form>
</body>

</html>
