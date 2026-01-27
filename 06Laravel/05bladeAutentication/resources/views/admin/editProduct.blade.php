@extends('partials.layout')

@section('title', 'Actualizar un Producto')

@section('content')
    <div class="container">
        <h2 class="py-2">Actualizar un producto</h2>
        <form action="{{ route('admin.products.update', $plato->id) }}" method="post" class="row g-3 needs-validation" novalidate
            enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <div class="col-md-4">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $plato->name }}"
                    required>
                <div class="invalid-feedback">
                    Nombre del producto no valido
                </div>
            </div>
            <div class="col-md-4">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" min="0.01" step="0.01" id="precio" name="precio"
                    value="{{ $plato->price }}" required>
                <div class="invalid-feedback">
                    Precio del producto no valido
                </div>
            </div>
            <div class="col-md-12">
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $plato->description }}</textarea>
            </div>
            <div class="col-md-4">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen"
                    accept="image/png, image/jpeg, image/webp"s>
                <div class="invalid-feedback">
                    Por favor, seleccione un formato de imagen válido (PNG, JPG o WebP).
                </div>
            </div>
            <div class="col-12 pb-3">
                <button class="btn btn-primary" type="submit">Actualizar Producto</button>
            </div>
        </form>
    </div>
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
