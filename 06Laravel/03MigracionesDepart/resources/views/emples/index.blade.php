@extends('layout')

@section('content')
    <h1>Listado de empleados</h1>
    <table class="table">
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
                <th>avatar</th>
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
                    <td>
                        @empty($e->avatar)
                            -No tiene imagen-
                        @else
                            <img src="{{ asset('storage/' . $e->avatar) }}" alt="{{ $e->apellido }}" width="125">
                        @endempty
                    </td>
                    <td><a href="{{ route('emples.edit', $e->emple_no) }}" class="btn btn-warning">Editar</a></td>
                    <td>
                        <form action="{{ route('emples.destroy', $e->emple_no) }}" method="post"
                            style="display: inline-block; ">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Borrar" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (session('error'))
        <br>
        <div class="alert alert-danger">
            {{ session('error') }}</div>
    @elseif (session('success'))
        <br>
        <div class="alert alert-success">
            {{ session('success') }}</div>
    @endif
    <br>
    <a class="btn btn-primary mt-3" href="{{ route('emples.create') }}">Crear un empleado</a>
@endsection
