@extends('layout')

@section('content')
    <h1>Crear un empleado</h1>
    <form action="{{ route('emples.store') }}" method="post" class="row g-3">
        @csrf
        <div class="col-md-4">
            <label class="form-label" for="emple_no">Num Emple</label>
            <input class="form-control" type="number" name="emple_no" id="emple_no" required>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="apellido">Apellido</label>
            <input class="form-control" type="text" maxlength="10" name="apellido" id="apellido" required>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="oficio">Oficio</label>
            <input class="form-control" type="text" maxlength="10" name="oficio" id="oficio" required>
        </div>
        <div class="col-md-4">
            <label for="dir" class="form-label">Director</label>
            <select class="form-select" name="dir" id="dir">
                <option value="">No tiene director</option>
                @foreach ($directores as $d)
                    <option value="{{ $d->emple_no }}">{{ $d->emple_no }} - {{ $d->apellido }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="fecha_alt">Fecha de alta</label>
            <input class="form-control" type="date" name="fecha_alt" id="fecha_alt" required>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="salario">Salario</label>
            <input class="form-control" type="number" name="salario" id="salario" required>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="comision">Comision</label>
            <input class="form-control" type="number" name="comision" id="comision">
        </div>
        <div class="col-md-4">
            <label for="depart_no" class="form-label">Departamento</label>
            <select class="form-select" name="depart_no" id="depart_no" required>
                @foreach ($departs as $d)
                    <option value="{{ $d->depart_no }}">{{ $d->dnombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12">
            <input type="submit" value="Crear" class="btn btn-primary px-3">
        </div>
    </form>
@endsection
