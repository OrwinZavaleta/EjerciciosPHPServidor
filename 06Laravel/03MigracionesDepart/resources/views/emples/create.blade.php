@extends('layout')

@section('content')
    <h1>Crear un empleado</h1>
    <form action="{{ route('emples.store') }}" method="post">
        @csrf
        <label for="emple_no">Num Emple
            <input type="number" name="emple_no" id="emple_no" required>
        </label>
        <label for="apellido">Apellido
            <input type="text" name="apellido" id="apellido" required>
        </label>
        <label for="oficio">Oficio
            <input type="text" name="oficio" id="oficio" required>
        </label>
        <label for="dir">Director
            <select name="dir" id="dir" required>
                @foreach ($directores as $d)
                    <option value="{{ $d->emple_no }}">{{ $d->emple_no }} - {{ $d->apellido }}</option>
                @endforeach
            </select>
        </label>
        <label for="fecha_alt">Fecha de alta
            <input type="date" name="fecha_alt" id="fecha_alt" required>
        </label>
        <label for="salario">Salario
            <input type="number" name="salario" id="salario" required>
        </label>
        <label for="comision">Comision
            <input type="number" name="comision" id="comision" required>
        </label>
        <label for="depart_no">Departamento
            <select name="depart_no" id="depart_no" required>
                @foreach ($departs as $d)
                    <option value="{{ $d->depart_no }}">{{ $d->dnombre }}</option>
                @endforeach
            </select>
        </label>

        <input type="submit" value="Crear">
    </form>
@endsection
