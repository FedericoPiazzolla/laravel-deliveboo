@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="mb-3">
        <a class="btn btn-success" href="{{ url()->previous() }}">&leftarrow;torna indietro</a>
    </div>
    <h2 class="text-center">Pagina di creazione di un nuovo piatto</h2>

    {{-- Controllo errori --}}
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- /Controllo errori --}}

    <form name="myForm" class="mt-5" action="{{ route('admin.dishes.store') }}" onsubmit="return validateForm()" method="POST">
        @csrf

        {{-- name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        {{-- /name --}}

        {{-- description --}}
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
        </div>
        {{-- /description --}}

        {{-- price --}}
        <div class="input-group mb-3">
            <span class="input-group-text">€</span>
            <input name="price" id="price" type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" value="{{ old('price') }}" onblur="this.value = parseFloat(this.value).toFixed(2)" required>
        </div>
        {{-- /price --}}
        

        <button class="btn btn-success" type="submit">Salva</button>
    </form>

    

@endsection