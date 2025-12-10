@extends('layout')

@section('content')
    <h1>Listado de departamentos</h1>
    <table>
        <thead>
            <tr>
                <th>emple_no</th>
                <th>apellido</th>
                <th>oficio</th>
                <th>director</th>
                <th>fecha_alta</th>
                <th>salario</th>
                <th>comision</th>
                <th>depart_no</th>
                <th>editar</th>
                <th>eliminar</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($emples as $e)
                <tr>
                    <td>{{ $e->emple_no }}</td>
                    <td>{{ $e->apellido }}</td>
                    <td>{{ $e->oficio }}</td>
                    <td>{{ $e->director->apellido ?? '-Sin Director-' }}</td>
                    <td>{{ $e->fecha_alt }}</td>
                    <td>{{ $e->salario }}</td>
                    <td>{{ $e->comision }}</td>
                    <td>{{ $e->depart->dnombre ?? '-Sin Departamento-' }}</td>
                    <td><a href="{{ route('emples.edit', $e->emple_no) }}">Editar</a></td>
                    <td>
                        <form action="{{ route('emples.destroy', $e->emple_no) }}" method="post"
                            style="display: inline-block; ">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Borrar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (session('error'))
        <br>
        <h3>{{ session('error') }}</h3>
    {{-- @elseif (session('success'))
        <br>
        <h3>{{ session('sucess') }}</h3> --}}
    @endif
    <h4></h4>
    <br>
    <a href="{{ route('emples.create') }}">Crear un empleado</a>
@endsection
