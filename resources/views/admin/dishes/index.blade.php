@extends('layouts.admin')

@section('content')
<h2>Lista dei piatti</h2>

<div class="text-end">
    <a class="btn btn-success border-0 text-warning" style="background-color: #173736 "  href="{{ route('admin.dishes.create') }}">Crea un nuovo piatto</a>
</div>

@if (count($dishes) > 0)
<table class="table table-striped mt-5">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">nome</th>
            <th scope="col">prezzo</th>
            <th class="text-center" scope="col">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($dishes as $dish)
        <tr class="{{ $dish->available == 0 ? 'table-danger' : '' }}">
            <th scope="row">{{ $dish->id }}</th>
            <td>{{ $dish->name }}</td>
            <td>{{ $dish->price }} €</td>
            <td class="text-center">
              <a class="btn btn-primary"
                    href="{{ route('admin.dishes.show', ['dish' => $dish->slug]) }}">
                    <i class="fa-solid fa-eye"></i>
                </a> 
                <a class="btn btn-success" style="background-color: #fd8d14" href="{{ route('admin.dishes.edit', ['dish' => $dish->slug]) }}">
                    <i class="fa-solid fa-pen"></i>
                </a>

                <form class="d-inline-block" action="{{ route('admin.dishes.destroy', ['dish' => $dish->slug]) }}" method="POST">
                    @csrf
                    @method("DELETE")

                    <button class="btn btn-danger" type="submit">
                        <i class="fa-solid fa-trash"></i>
                    </button>

                </form>
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