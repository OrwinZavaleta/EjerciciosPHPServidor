@props(['product'])

<div class="col">
    <div class="card shadow-sm">
        <img src="{{ $product->image ?? '/img/unknown-dish.png' }}" class="card-img-top img-16-9"
            alt="{{ $product->name }}" loading="lazy">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <div class="border-top border-1 border-top-success pt-3">
                @auth
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
                @else
                    <p class="m-0 text-danger">Inicie sesión</p>
                @endauth
            </div>
        </div>
    </div>
</div>
