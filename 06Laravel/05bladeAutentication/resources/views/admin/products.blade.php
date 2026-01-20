@extends('partials.layout')

@section('title', 'Mis Reservas - Prieto Eats')

@section('content')
    <div class="container py-5">
        <div class="row mb-4 align-items-center">
            <div class="col-md-8">
                <h2 class="fw-bold text-success mb-1">
                    <i class="bi bi-journal-text me-2"></i>
                    @admin
                        Todos los Productos Registrados
                    @endadmin
                </h2>
                @admin
                @else
                    <p class="text-muted">Consulta el historial de todos tus pedidos realizados en Prieto Eats.</p>
                @endadmin
            </div>
        </div>

        @if ($products->isEmpty())
            @admin
                <div class="card border-0 shadow-sm rounded-4 py-5">
                    <div class="card-body text-center py-5">
                        <div class="display-1 text-success opacity-25 mb-4">
                            <i class="bi bi-cart-x"></i>
                        </div>
                        <h4 class="fw-bold">No hay Productos</h4>
                    </div>
                </div>
            @endadmin
        @else
            <div class="row">
                @foreach ($products as $p)
                    @admin
                        <div class="col-md-6 col-lg-4 mb-4">
                            <di class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                            </di @forelse ($menus as $m)
                            <x-card-product :product="$m" />
                        @empty
                            <h2 class="text-center mx-auto">En este momento no hay menús disponibles, por favor regrese en unos
                                días.
                            </h2>
                    @endforelsev>
                </div>
            @endadmin
        @endforeach
    </div>
    @endif
    </div>
@endsection

@push('scripts')
@endpush
