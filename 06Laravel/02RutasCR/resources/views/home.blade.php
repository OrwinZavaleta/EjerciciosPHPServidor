<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>Listado de usuarios</h2>
    <ul>
        @foreach ($usuarios as $u)
            <li>{{ $u['id'] }}. {{ $u['nombre'] }} - {{ $u['email'] }}</li>
        @endforeach
    </ul>

    <a href="/create">Crear un nuevo ususario</a>
</body>

</html>
