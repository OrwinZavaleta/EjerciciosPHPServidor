@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h1 class="mb-0 h4">Editar Empleado</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('emples.update', $emple->emple_no) }}" method="post" class="row g-3 needs-validation"
                        novalidate enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-md-4">
                            <label class="form-label" for="emple_no"><i class="bi bi-hash"></i> Num Empleado</label>
                            <input class="form-control" type="number" name="emple_no" id="emple_no"
                                value="{{ $emple->emple_no }}" disabled readonly>
                            <small class="form-text text-muted">El número de empleado no se puede modificar.</small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="apellido"><i class="bi bi-person-badge"></i> Apellido</label>
                            <input class="form-control" type="text" name="apellido" id="apellido" maxlength="10"
                                value="{{ $emple->apellido }}" required>
                            <div class="invalid-feedback">El apellido es obligatorio.</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="oficio"><i class="bi bi-briefcase-fill"></i> Oficio</label>
                            <input class="form-control" type="text" name="oficio" id="oficio" maxlength="10"
                                value="{{ $emple->oficio }}" required>
                            <div class="invalid-feedback">El oficio es obligatorio.</div>
                        </div>

                        <div class="col-md-6">
                            <label for="dir" class="form-label"><i class="bi bi-person-video2"></i> Director</label>
                            <select class="form-select" name="dir" id="dir">
                                <option value="">- Sin Director -</option>
                                @foreach ($directores as $d)
                                    <option value="{{ $d->emple_no }}"
                                        {{ $d->emple_no == $emple->dir ? 'selected' : '' }}>
                                        {{ $d->apellido }} (#{{ $d->emple_no }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="fecha_alt"><i class="bi bi-calendar-plus"></i> Fecha de
                                alta</label>
                            <input class="form-control" type="date" name="fecha_alt" id="fecha_alt"
                                value="{{ $emple->fecha_alt }}" required>
                            <div class="invalid-feedback">La fecha de alta es obligatoria.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="salario"><i class="bi bi-currency-euro"></i> Salario</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="salario" id="salario"
                                    value="{{ $emple->salario }}" required>
                                <span class="input-group-text">€</span>
                                <div class="invalid-feedback">El salario es obligatorio.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="comision"><i class="bi bi-percent"></i> Comision</label>
                            <div class="input-group">
                                <input class="form-control" type="number" step="0.01" name="comision" id="comision"
                                    value="{{ $emple->comision }}">
                                <span class="input-group-text">€</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="depart_no" class="form-label"><i class="bi bi-diagram-3-fill"></i>
                                Departamento</label>
                            <select class="form-select" name="depart_no" id="depart_no" required>
                                @foreach ($departs as $d)
                                    <option value="{{ $d->depart_no }}"
                                        {{ $d->depart_no == $emple->depart_no ? 'selected' : '' }}>
                                        {{ $d->dnombre }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">El departamento es obligatorio.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="avatar"><i class="bi bi-person-circle"></i> Cambiar
                                Avatar</label>
                            <input class="form-control" type="file" name="avatar" id="avatar" accept="image/*">
                            @if ($emple->avatar)
                                <div class="mt-2">
                                    <small class="text-muted">Avatar actual:</small>
                                    <img src="{{ asset('storage/' . $emple->avatar) }}"
                                        alt="Avatar de {{ $emple->apellido }}" class="img-fluid rounded-circle"
                                        style="width: 40px; height: 40px; margin-left: 10px;">
                                </div>
                            @endif
                        </div>

                        @if ($errors->any())
                            <div class="col-12">
                                <div class="alert alert-danger p-2 mb-0">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $err)
                                            <li>{{ $err }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <div class="col-12 mt-4 d-flex justify-content-end gap-2">
                            <a href="{{ route('emples.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Volver
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-save-fill"></i> Actualizar Empleado
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
