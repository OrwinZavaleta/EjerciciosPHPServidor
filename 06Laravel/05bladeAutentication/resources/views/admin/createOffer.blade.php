@extends('partials.layout')

@section('title', 'Crear un nuevo Producto')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-header bg-success text-white py-3">
                        <h4 class="mb-0 fw-bold"><i class="bi bi-calendar-plus me-2"></i>Crear Nueva Oferta</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('admin.offers.store') }}" method="post" class="row g-3 needs-validation"
                            novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-4">
                                <label for="date_delivery" class="form-label fw-bold text-muted">Fecha de Entrega</label>
                                <input type="date" class="form-control form-control-lg" id="date_delivery" name="date_delivery"
                                    required>
                                <div class="invalid-feedback">
                                    Fecha no valida
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="time_delivery" class="form-label fw-bold text-muted">Horas de entrega</label>
                                <input type="text" class="form-control form-control-lg" id="time_delivery" name="time_delivery"
                                    value="13:30 a 14:30" required>
                                <div class="invalid-feedback">
                                    Hora no valida
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <h5 class="fw-bold text-success border-bottom pb-2 mb-3">Productos en la oferta</h5>
                                
                                <div class="mb-3">
                                    <input type="text" id="offerSearch" class="form-control" placeholder="Filtrar productos...">
                                </div>

                                <div class="border rounded-3 p-2" style="max-height: 400px; overflow-y: auto;" id="productsContainer">
                                    <div class="list-group list-group-flush" id="productsList">
                                        @foreach ($platos as $p)
                                            <label class="list-group-item list-group-item-action d-flex align-items-center cursor-pointer border-0 rounded-3 mb-1 product-option" data-name="{{ strtolower($p->name) }}">
                                                <input class="form-check-input me-3" type="checkbox" name="platosSeleccionados[]"
                                                    id="{{ $p->id }}" value="{{ $p->id }}" style="transform: scale(1.2);">
                                                <img src="{{ asset('storage/' . ($p->image ?? 'img/unknown-dish.png')) }}"
                                                    alt="{{ $p->name }}" class="rounded-3 object-fit-cover me-3"
                                                    width="60" height="60">
                                                <span class="fs-5 fw-medium">{{ $p->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                    <div id="noOfferResults" class="text-center py-4 d-none">
                                        <p class="text-muted mb-0">No se encontraron productos.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pt-4 text-end">
                                <button class="btn btn-success btn-lg px-5 rounded-pill fw-bold" type="submit">
                                    <i class="bi bi-check-lg me-2"></i>Crear Oferta
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="container pb-5">
            <div class="alert alert-danger shadow-sm rounded-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
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

            // Logic for filtering and sorting
            const searchInput = document.getElementById('offerSearch');
            const productsList = document.getElementById('productsList');
            const items = document.querySelectorAll('.product-option');
            const noResults = document.getElementById('noOfferResults');

            // 1. Filter Logic
            if(searchInput) {
                searchInput.addEventListener('input', (e) => {
                    const term = e.target.value.toLowerCase();
                    let visible = 0;

                    items.forEach(item => {
                        const name = item.dataset.name;
                        if(name.includes(term)) {
                            item.classList.remove('d-none');
                            visible++;
                        } else {
                            item.classList.add('d-none');
                        }
                    });

                    if(visible === 0) {
                        noResults.classList.remove('d-none');
                    } else {
                        noResults.classList.add('d-none');
                    }
                });
            }

            // 2. Sort Logic (Checked always on top)
            const sortItems = () => {
                const itemsArray = Array.from(productsList.children);
                
                itemsArray.sort((a, b) => {
                    const aChecked = a.querySelector('input[type="checkbox"]').checked;
                    const bChecked = b.querySelector('input[type="checkbox"]').checked;
                    
                    if (aChecked && !bChecked) return -1;
                    if (!aChecked && bChecked) return 1;
                    
                    // Secondary sort: Keep original order (optional, but good for UX)
                    // We can use the 'value' (ID) or just text content for stability if needed.
                    // For now, stable sort of JS usually keeps relative order of equals.
                    return 0;
                });

                // Re-append in new order
                itemsArray.forEach(item => productsList.appendChild(item));
                
                // Reset scroll to top to show changes? Maybe not, user might be scrolling down.
                // But if they uncheck, it moves down.
            };

            items.forEach(item => {
                const checkbox = item.querySelector('input[type="checkbox"]');
                checkbox.addEventListener('change', function() {
                    sortItems();
                    
                    if (this.checked) {
                         item.classList.add('bg-success', 'bg-opacity-10');
                    } else {
                         item.classList.remove('bg-success', 'bg-opacity-10');
                    }
                });
            });

        })()
    </script>
@endpush
