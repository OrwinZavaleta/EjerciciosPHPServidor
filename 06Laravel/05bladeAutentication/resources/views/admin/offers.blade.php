@extends('partials.layout')

@section('title', 'Mis Reservas - Prieto Eats')

@section('content')
    <div class="container py-5">
        <div class="row mb-4 align-items-center">
            <div class="col-md-8">
                <h2 class="fw-bold text-success mb-1">
                    @admin
                        <i class="bi bi-journal-text me-2"></i>
                        Todas las Ofertas
                    @endadmin
                </h2>
            </div>
        </div>

        @if ($offers->isEmpty())
            @admin
                <div class="card border-0 shadow-sm rounded-4 py-5">
                    <div class="card-body text-center py-5">
                        <div class="display-1 text-success opacity-25 mb-4">
                            <i class="bi bi-cart-x"></i>
                        </div>
                        <h4 class="fw-bold">No hay Ofertas</h4>
                    </div>
                </div>
            @endadmin
        @else
            <div class="row">
                @foreach ($offers as $o)
                    @admin
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                                <!-- Cabecera de la Reserva -->
                               hola
                        </div>
                    @endadmin
                @endforeach
            </div>
        @endif
    </div>
@endsection

@push('scripts')
@endpush
