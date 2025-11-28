<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>Creacion de usuarios</h2>

    <form action="{{ route('usuarios.update', $userSelect['id']) }}" method="post">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre del usuario</label>
        {{-- <input type="text" name="nombre" id="nombre" value="{{$userSelect["nombre"]}}"> --}}
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') ?? $userSelect['nombre'] }}">

        <label for="email">Email del usuario</label>
        {{-- <input type="email" name="email" id="email" value="{{$userSelect["email"]}}"> --}}
        <input type="email" name="email" id="email" value="{{ old('email') ?? $userSelect['email'] }} ">

        <input type="submit" value="Actualizar">
    </form>

    @error('nombre')
        <p style="color: red">Nombre incorrecto</p>
    @enderror
    @error('email')
        <p style="color: red">Email incorrecto</p>
    @enderror
</body>

</html>
