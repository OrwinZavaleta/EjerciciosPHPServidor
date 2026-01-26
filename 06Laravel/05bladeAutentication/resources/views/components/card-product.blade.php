@props(['product', 'offer', 'editar' => false])

{{-- @foreach ($offers as $offer) --}}
    <div class="col">
        <div class="card shadow-sm">
            <img src="{{ asset('storage/'.($product->image ?? 'img/unknown-dish.png')) }}" class="card-img-top img-16-9"
                alt="{{ $product->name }}" loading="lazy">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                {{-- <p class="card-text">Día de entrega: {{ $offer->date_delivery }}</p>
                <p class="card-text">Hora de entrega: {{ $offer->time_delivery }}</p>
                <p class="card-text">Día de entrega: {{ $offer->datetime_limit }}</p> --}}
                <div class="border-top border-1 border-top-success pt-3">
                    @auth
                        @if (auth()->user()->isAdmin() && $editar)
                            <div class="d-flex justify-content-between">
                                <div class="fs-4 text-success fw-bold">
                                    <a href="{{ route("admin.products.edit", $product->id) }}" class="btn btn-warning"><i
                                            class="bi bi-pencil-fill me-2"></i>Editar</a>
                                </div>
                                <form action="{{ route("admin.products.destroy", $product->id) }}" method="post">
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i
                                            class="bi bi-trash me-2"></i>Eliminar</button>
                                </form>
                            </div>
                        @else
                            <div class="d-flex justify-content-between">
                                <form action="{{ route('cart.add', $product->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success"> <i
                                            class="bi bi-fork-knife me-2"></i>Reservar</button>
                                </form>
                                <div class="fs-4 text-success fw-bold">
                                    <span id="precio me-3">{{ $product->price }}</span>
                                    €
                                </div>
                            </div>
                        @endif
                    @else
                        <p class="m-0 text-danger">Inicie sesión</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
{{-- @endforeach --}}
