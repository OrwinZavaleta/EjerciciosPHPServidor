@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h1 class="mb-0 h4">Editar Departamento</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('departs.update', $depart->depart_no) }}" class="row g-3 needs-validation"
                        method="post" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="col-md-4">
                            <label class="form-label" for="depart_no">
                                <i class="bi bi-hash"></i> Número de Departamento
                            </label>
                            <input class="form-control" type="number" name="depart_no" id="depart_no"
                                value="{{ $depart->depart_no }}" disabled readonly>
                            <small class="form-text text-muted">El número de departamento no se puede modificar.</small>
                        </div>

                        <div class="col-md-8">
                            <label class="form-label" for="dnombre">
                                <i class="bi bi-building"></i> Nombre del Departamento
                            </label>
                            <input class="form-control" type="text" maxlength="20" name="dnombre" id="dnombre"
                                value="{{ $depart->dnombre }}" placeholder="Ej: Contabilidad" required>
                            <div class="invalid-feedback">
                                El nombre es obligatorio.
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="loc">
                                <i class="bi bi-geo-alt-fill"></i> Localización
                            </label>
                            <input class="form-control" type="text" maxlength="20" name="loc" id="loc"
                                value="{{ $depart->loc }}" placeholder="Ej: Madrid" required>
                            <div class="invalid-feedback">
                                La localización es obligatoria.
                            </div>
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
                            <a href="{{ route('departs.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Volver
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-save-fill"></i> Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
