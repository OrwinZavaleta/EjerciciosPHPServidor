@extends('partials.layout')

@section('title', 'Crear un nuevo Producto')

@section('content')
    <div class="container">
        <h2 class="py-2">Crear un nuevo Oferta</h2>
        <form action="{{ route('admin.offers.store') }}" method="post" class="row g-3 needs-validation" novalidate
            enctype="multipart/form-data">
            @csrf
            <div class="col-md-4">
                <label for="date_delivery" class="form-label">Fecha de Entrega</label>
                <input type="date" class="form-control" id="date_delivery" name="date_delivery" required>
                <div class="invalid-feedback">
                    Fecha no valida
                </div>
            </div>
            <div class="col-md-4">
                <label for="time_delivery" class="form-label">Horas de entrega</label>
                <input type="text" class="form-control" id="time_delivery" name="time_delivery" value="13:30 a 14:30" required>
                <div class="invalid-feedback">
                    Hora no valida
                </div>
            </div>r
            <div class="col-md-4">
                <label for="datetime_limit" class="form-label">Fecha limite de pedido</label>
                <input type="datetime-local" class="form-control" id="datetime_limit" name="datetime_limit" required>
                <div class="invalid-feedback">
                    Fecha u hora no validas
                </div>
            </div>

            <h4>Productos en la oferta</h4>
            <ul class="list-group">
                @foreach ($platos as $p)
                    <li class="list-group-item form-check">
                        <img src="{{ asset('storage/' . ($p->image ?? 'img/unknown-dish.png')) }}" alt="{{ $p->name }}"
                            class="img-table me-3">
                        <input class="form-check-input" type="checkbox" name="platosSeleccionados[]"
                            id="{{ $p->id }}" value="{{ $p->id }}">
                        <label class="form-check-label fs-4" for="{{ $p->id }}">{{ $p->name }}</label>
                    </li>
                @endforeach
            </ul>
            <div class="col-12 pb-3">
                <button class="btn btn-primary" type="submit">Crear Producto</button>
            </div>
        </form>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
@push('scripts')
    <script>
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@endpush
