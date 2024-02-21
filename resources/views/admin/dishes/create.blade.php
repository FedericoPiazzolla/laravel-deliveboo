@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div>
        <a href="{{ url()->previous() }}">&leftarrow;torna indietro</a>
    </div>
    <h2 class="text-center">Pagina di creazione di un nuovo piatto</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form name="myForm" class="mt-5" action="{{ route('admin.dishes.store') }}" onsubmit="return validateForm()" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">descrizione</label>
            <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">€</span>
            <input name="price" id="price" type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" value="{{ old('price') }}" required>
        </div>

        <select class="form-select" aria-label="Default select example">
            <option @selected(old('available') === 'true')>Disponibile</option>
            <option @selected(old('available') === 'false') value="1">non disponibile</option>

        </select>

        <button class="btn" type="submit">Salva</button>
    </form>

    

@endsection