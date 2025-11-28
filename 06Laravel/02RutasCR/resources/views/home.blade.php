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
            <li>{{ $u['id'] }}. {{ $u['nombre'] }} - {{ $u['email'] }}
                <a href="{{ route('usuarios.show', $u['id']) }}">Ver</a>
                <a href="{{ route('usuarios.edit', $u['id']) }}">Editar</a>
                {{-- <a href="{{ route('usuarios.destroy', $u['id']) }}">Eliminar</a> --}}
                <form action="{{ route('usuarios.destroy', $u['id']) }}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete">
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('usuarios.create') }}">Crear un nuevo ususario</a>
</body>

</html>
