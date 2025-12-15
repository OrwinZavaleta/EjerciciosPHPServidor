@extends('layout')

@section('content')
    <h1>Crear un empleado</h1>
    <form action="{{ route('emples.update', $emple->emple_no) }}" method="post" class="row g-3 needs-validation" novalidate
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-4">
            <label class="form-label" for="emple_no">Num Emple</label>
            <input class="form-control" type="number" name="emple_no" id="emple_no" value="{{ $emple->emple_no }}" disabled>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="apellido">Apellido</label>
            <input class="form-control" type="text" name="apellido" id="apellido" maxlength="10"
                value="{{ $emple->apellido }}" required>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="oficio">Oficio</label>
            <input class="form-control" type="text" name="oficio" id="oficio" maxlength="10"
                value="{{ $emple->oficio }}" required>
        </div>
        <div class="col-md-4">
            <label for="dir" class="form-label">Director</label>
            <select class="form-select" name="dir" id="dir">
                <option value="">No tiene director</option>
                @foreach ($directores as $d)
                    <option value="{{ $d->emple_no }}" {{ $d->emple_no == $emple->dir ? 'selected' : '' }}>
                        {{ $d->emple_no }} - {{ $d->apellido }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="fecha_alt">Fecha de alta</label>
            <input class="form-control" type="date" name="fecha_alt" id="fecha_alt" value="{{ $emple->fecha_alt }}"
                required>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="salario">Salario</label>
            <input class="form-control" type="number" name="salario" id="salario" value="{{ $emple->salario }}" required>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="comision">Comision</label>
            <input class="form-control" type="number" name="comision" id="comision" value="{{ $emple->comision }}">
        </div>
        <div class="col-md-4">
            <label for="depart_no" class="form-label">Departamento</label>
            <select class="form-select" name="depart_no" id="depart_no" required>
                @foreach ($departs as $d)
                    <option value="{{ $d->depart_no }}" {{ $d->depart_no == $emple->depart_no ? 'selected' : '' }}>
                        {{ $d->dnombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="avatar">Avatar</label>
            <input class="form-control" type="file" name="avatar" id="avatar">
        </div>

        <div class="col-md-12">
            <input type="submit" value="Actualizar" class="btn btn-primary px-3">
        </div>
    </form>

    @if ($errors->any())
        @foreach ($errors->all() as $err)
            <div class="alert alert-danger mt-3">{{ $err }}</div>
        @endforeach
    @endif
@endsection
