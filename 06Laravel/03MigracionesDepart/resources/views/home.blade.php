@extends('layout')

@section('content')
    <div class="p-5 mb-4 bg-dark text-white rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Bienvenido a GestiónEmp</h1>
            <p class="col-md-8 fs-4">
                Una solución moderna y eficiente para la administración de departamentos y empleados.
                Navegue, cree, actualice y elimine registros con facilidad.
            </p>
            <hr class="my-4">
            <p>Comience a gestionar su organización ahora mismo.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="{{ route('departs.index') }}" class="btn btn-primary btn-lg px-4 me-md-2">
                    <i class="bi bi-diagram-3-fill"></i> Ver Departamentos
                </a>
                @auth
                    <a href="{{ route('emples.index') }}" class="btn btn-outline-light btn-lg px-4">
                        <i class="bi bi-people-fill"></i> Ver Empleados
                    </a>
                @endauth
            </div>
        </div>
    </div>
@endsection
