@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h1 class="mb-0 h4">Crear Nuevo Departamento</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('departs.store') }}" method="post" class="row g-3 needs-validation" novalidate>
                        @csrf
                        <div class="col-md-4">
                            <label class="form-label" for="depart_no">
                                <i class="bi bi-hash"></i> Número de Departamento
                            </label>
                            <input class="form-control" type="number" name="depart_no" id="depart_no"
                                placeholder="Ej: 10" required>
                            <div class="invalid-feedback">
                                El número de departamento es obligatorio.
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label" for="dnombre">
                                <i class="bi bi-building"></i> Nombre del Departamento
                            </label>
                            <input class="form-control" type="text" maxlength="20" name="dnombre" id="dnombre"
                                placeholder="Ej: Contabilidad" required>
                            <div class="invalid-feedback">
                                El nombre es obligatorio.
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="loc">
                                <i class="bi bi-geo-alt-fill"></i> Localización
                            </label>
                            <input class="form-control" type="text" maxlength="20" name="loc" id="loc"
                                placeholder="Ej: Madrid" required>
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
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-plus-circle-fill"></i> Crear Departamento
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
