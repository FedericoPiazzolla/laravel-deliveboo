@extends('layouts.admin')

@section('content')
<h2>Lista dei piatti</h2>

<div class="text-end">
    <a class="btn" href="">Crea un nuovo piatto</a>
</div>

@if (count($dishes) > 0)
<table class="table table-striped mt-5">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">nome</th>
            <th scope="col">prezzo</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($dishes as $dish)
        <tr>
            <th scope="row">{{ $dish->id }}</th>
            <td>{{ $dish->name }}</td>
            <td>{{ $dish->price }}</td>
            <td>
                {{-- <a class="btn btn-primary"
                    href="{{ route('admin.dishes.show', ['dish' => $dish->slug]) }}">dettagli
                </a> --}}
                <a class="btn btn-success"
                    href="{{ route('admin.dishes.edit', ['dish' => $dish->slug]) }}"><i
                        class="fa-solid fa-pen"></i>
                </a>
            </td>
        </tr>
    @endforeach


    </tbody>

</table>


@else
<div class="alert alert-warning mt-5">
    Il menu del tuo ristorante è vuoto, non c'è ancora nessun piatto!
</div>
@endif



@endsection