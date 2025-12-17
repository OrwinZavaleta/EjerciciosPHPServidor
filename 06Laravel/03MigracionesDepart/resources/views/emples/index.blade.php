@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Listado de Empleados</h1>
        <a class="btn btn-primary" href="{{ route('emples.create') }}">
            <i class="bi bi-plus-circle-fill"></i> Crear Empleado
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            @if ($emples->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Avatar</th>
                                <th scope="col">#ID</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Oficio</th>
                                <th scope="col">Director</th>
                                <th scope="col">Fecha Alta</th>
                                <th scope="col">Salario</th>
                                <th scope="col">Comisión</th>
                                <th scope="col">Departamento</th>
                                <th scope="col" class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emples as $e)
                                <tr>
                                    <td>
                                        @if ($e->avatar)
                                            <img src="{{ asset('storage/' . $e->avatar) }}" alt="Avatar de {{ $e->apellido }}"
                                                class="img-fluid rounded-circle" style="width: 50px; height: 50px;">
                                        @else
                                            <i class="bi bi-person-circle fs-2"></i>
                                        @endif
                                    </td>
                                    <th scope="row">{{ $e->emple_no }}</th>
                                    <td>{{ $e->apellido }}</td>
                                    <td>{{ $e->oficio }}</td>
                                    <td>{{ $e->director->apellido ?? '-' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($e->fecha_alt)->format('d/m/Y') }}</td>
                                    <td>{{ number_format($e->salario, 2, ',', '.') }} €</td>
                                    <td>{{ number_format($e->comision, 2, ',', '.') }} €</td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $e->depart->dnombre ?? '-Sin Dept.-' }}</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('emples.edit', $e->emple_no) }}"
                                                class="btn btn-sm btn-outline-warning me-2" title="Editar">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <form action="{{ route('emples.destroy', $e->emple_no) }}" method="post"
                                                class="d-inline"
                                                onsubmit="return confirm('¿Estás seguro de que quieres eliminar este empleado?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Borrar">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info" role="alert">
                    No hay empleados para mostrar. ¡Crea el primero!
                </div>
            @endif
        </div>
    </div>
@endsection
