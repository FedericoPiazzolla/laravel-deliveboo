@extends('layouts.admin')

@section('content')
    <h2 class="mb-4">Dettaglio ordine #{{ $order->id }} di {{ $order->interested_user_name }}
        {{ $order->interested_user_surname }}</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id piatto</th>
                <th scope="col">Nome piatto</th>
                <th scope="col">Quantità</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dishes as $dish)
                <tr>
                    <th scope="row">{{ $dish->id }}</th>
                    <td>{{ $dish->name }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
