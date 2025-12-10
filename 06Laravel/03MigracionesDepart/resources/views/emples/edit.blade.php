@extends('layout')

@section('content')
    <h1>Crear un departamentos</h1>
    <form action="{{ route('emples.update', $emple->emple_no) }}" method="post">
        @csrf
        @method('PUT')
        <label for="emple_no">Num Emple
            <input type="number" name="emple_no" id="emple_no" value="{{ $emple->emple_no }}" disabled>
        </label>
        <label for="apellido">Apellido
            <input type="text" name="apellido" id="apellido" value="{{ $emple->apellido }}" required>
        </label>
        <label for="oficio">Oficio
            <input type="text" name="oficio" id="oficio" value="{{ $emple->oficio }}" required>
        </label>
        <label for="dir">Director
            <select name="dir" id="dir" required>
                <option value="">No tiene director</option>
                @foreach ($directores as $d)
                    <option value="{{ $d->emple_no }}" {{ $d->emple_no == $emple->dir ? 'selected' : '' }}>
                        {{ $d->emple_no }} - {{ $d->apellido }}</option>
                @endforeach
            </select>
        </label>
        <label for="fecha_alt">Fecha de alta
            <input type="date" name="fecha_alt" id="fecha_alt" value="{{ $emple->fecha_alt }}" required>
        </label>
        <label for="salario">Salario
            <input type="number" name="salario" id="salario" value="{{ $emple->salario }}" required>
        </label>
        <label for="comision">Comision
            <input type="number" name="comision" id="comision" value="{{ $emple->comision }}" required>
        </label>
        <label for="depart_no">Departamento
            <select name="depart_no" id="depart_no" required>
                @foreach ($departs as $d)
                    <option value="{{ $d->depart_no }}" {{ $d->depart_no == $emple->depart_no ? 'selected' : '' }}>{{ $d->dnombre }}</option>
                @endforeach
            </select>
        </label>

        <input type="submit" value="Actualizar">
    </form>
@endsection
