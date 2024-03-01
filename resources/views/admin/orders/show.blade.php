@extends('layouts.admin')

@section('content')
    <h2 class="mb-4">Dettaglio ordine #{{ $order->id }} di {{ $order->interested_user_name }}
        {{ $order->interested_user_surname }}</h2>

    <table class="table mb-3">
        <thead>
            <tr>
                <th scope="col">Nome piatto</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Quantità</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dishes as $dish)
                <tr>
                    <th scope="row">{{ $dish->name }}</th>
                    <td>{{ $dish->price }} &euro;</td>
                    <td><span class="ms-4">{{ $dish->pivot->dish_quantity }}</span></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Totale: <span class="text-success">{{ array_sum($dishes_prices) }}&euro;</span></h4>
@endsection