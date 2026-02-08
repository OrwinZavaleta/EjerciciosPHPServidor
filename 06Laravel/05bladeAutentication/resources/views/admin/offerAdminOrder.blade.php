@extends('partials.layout')

@section('title', 'Mis Reservas - Prieto Eats')

@section('content')
    <div class="container py-3">
        <h1 class="pb-3">
            Reservas del
            <span>{{ \Carbon\Carbon::parse($offer->date_delivery)->translatedFormat('l, j \d\e F') }}</span>
        </h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Clientes</th>
                        @foreach ($offer->productsOffer as $o)
                            <th scope="col">{{ $o->product->name }}</th>
                        @endforeach
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $columnTotals = [];
                        foreach ($offer->productsOffer as $item) {
                            $columnTotals[$item->product->id] = 0;
                        }
                    @endphp
                    @forelse ($reportData as $userId => $userData)
                        <tr>
                            <td scope="row"><strong>{{ $userData['user_name'] }}</strong></td>
                            @php $rowTotal = 0; @endphp
                            @foreach ($offer->productsOffer as $item)
                                @php
                                    $qty = $userData['totals'][$item->product->id] ?? 0;
                                    $columnTotals[$item->product->id] += $qty;
                                    $rowTotal += $qty;
                                @endphp

                                <td class="text-center">
                                    {{ $qty }}
                                </td>
                            @endforeach

                            <td class="text-center fw-bold bg-light">
                                {{ $rowTotal }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ $offer->productsOffer->count() + 2 }}" class="text-center">
                                No hay pedidos registrados para esta oferta.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot class="table-secondary fw-bold">
                    <tr>
                        <td>TOTAL</td>

                        @foreach ($offer->productsOffer as $item)
                            <td class="text-center">{{ $columnTotals[$item->product->id] }}</td>
                        @endforeach

                        <!-- Total de totales (Esquina inferior derecha) -->
                        <td class="text-center">{{ array_sum($columnTotals) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
