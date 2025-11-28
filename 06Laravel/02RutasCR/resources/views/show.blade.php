<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>Usuario {{ $userSelect['id']  }}</h2>
    <p>Nombre: {{ $userSelect['nombre'] }}</p>
    <p>Email: {{ $userSelect['email']  }}</p>
    <a href="{{ route('usuarios.index') }}">Volver al inicio</a>
</body>

</html>
