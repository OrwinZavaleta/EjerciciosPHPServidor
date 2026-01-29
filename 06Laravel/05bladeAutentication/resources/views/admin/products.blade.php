@extends('partials.layout')

@section('title', 'Mis Reservas - Prieto Eats')

@section('content')
    <div class="container py-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-5 gap-3">
            <div>
                <h2 class="fw-bold text-success mb-0">
                    @admin
                        <i class="bi bi-grid-fill me-2"></i>Catálogo de Productos
                    @endadmin
                </h2>
                <p class="text-muted mt-1 mb-0">Gestiona todos los platos disponibles en la plataforma.</p>
            </div>
            <div class="text-end">
                <a href="{{ route('admin.products.create') }}" class="btn btn-success btn-lg rounded-pill shadow-sm fw-bold px-4">
                    <i class="bi bi-plus-lg me-2"></i>Nuevo Producto
                </a>
            </div>
        </div>

        @if ($products->isEmpty())
            @admin
                <div class="card border-0 shadow-sm rounded-4 py-5 bg-light">
                    <div class="card-body text-center py-5">
                        <div class="display-1 text-success opacity-25 mb-4">
                            <i class="bi bi-basket3"></i>
                        </div>
                        <h3 class="fw-bold text-secondary">No hay productos registrados</h3>
                        <p class="text-muted mb-4">Comienza agregando deliciosos platos al menú.</p>
                        <a href="{{ route('admin.products.create') }}" class="btn btn-outline-success rounded-pill fw-bold">
                            Crear primer producto
                        </a>
                    </div>
                </div>
            @endadmin
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($products as $p)
                    @admin
                        <x-card-product :product="$p" :offers="$p->offers" :editar="true" />
                    @endadmin
                @endforeach
            </div>
        @endif
    </div>
@endsection

@push('scripts')
@endpush
