@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Listado de Departamentos</h1>
        <a class="btn btn-primary" href="{{ route('departs.create') }}">
            <i class="bi bi-plus-circle-fill"></i> Crear Departamento
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
            @if ($departs->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Localización</th>
                                <th scope="col" class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departs as $d)
                                <tr>
                                    <th scope="row">{{ $d->depart_no }}</th>
                                    <td>{{ $d->dnombre }}</td>
                                    <td>{{ $d->loc }}</td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ route('departs.edit', $d->depart_no) }}"
                                                class="btn btn-sm btn-outline-warning me-2" title="Editar">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <form action="{{ route('departs.destroy', $d->depart_no) }}" method="post"
                                                class="d-inline"
                                                onsubmit="return confirm('¿Estás seguro de que quieres eliminar este departamento?');">
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
                    No hay departamentos para mostrar. ¡Crea el primero!
                </div>
            @endif
        </div>
    </div>
@endsection
