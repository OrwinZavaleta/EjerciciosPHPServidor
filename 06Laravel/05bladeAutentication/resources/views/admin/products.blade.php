@extends('partials.layout')

@section('title', 'Mis Reservas - Prieto Eats')

@section('content')
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="fw-bold text-success">
                    @admin
                        <i class="bi bi-journal-text me-2"></i>
                        Todos los Productos Registrados
                    @endadmin
                </h2>
            </div>
            <div class="col-md-4 text-end">
                <a href="#" class="btn btn-success">
                    <i class="bi bi-plus-lg me-2"></i>
                    Crear nuevo producto
                </a>
            </div>
        </div>

        @if ($products->isEmpty())
            @admin
                <div class="card border-0 shadow-sm rounded-4 py-3">
                    <div class="card-body text-center py-5">
                        <div class="display-1 text-success opacity-25 mb-4">
                            <i class="bi bi-cart-x"></i>
                        </div>
                        <h4 class="fw-bold">No hay Productos</h4>
                    </div>
                </div>
            @endadmin
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-0">
                @foreach ($products as $p)
                    @admin
                        {{-- <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden"> --}}
                        <x-card-product :product="$p" :offers="$p->offers" :editar="true" />
                        {{-- </div> --}}
                    @endadmin
                @endforeach
            </div>
        @endif
    </div>
@endsection

@push('scripts')
@endpush
