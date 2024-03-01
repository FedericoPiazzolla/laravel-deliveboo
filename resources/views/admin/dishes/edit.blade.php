@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="mb-3">
        <a class="btn btn-success" href="{{ url()->previous() }}">&leftarrow; Indietro</a>
    </div>
    <h2 class="text-center">Stai modificando il piatto: <b>{{ $dish->name }}</b></h2>

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

    <form name="myForm" class="mt-5" action="{{ route('admin.dishes.update', ['dish' => $dish->slug]) }}" onsubmit="return validateForm()" method="POST" enctype="multipart/form-data" id="dishCreationForm">
        @csrf
        @method('PUT')

        {{-- name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control dish_name" id="name" name="name" value="{{ $dish->name }}" required>
            <span>
                <strong id="dishNameError" class='errorFormMsg ms-1'></strong>
            </span>
        </div>
        {{-- /name --}}

        {{-- Image --}}
        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                name="image" value="{{ $dish->image }}" onchange="showImage(event)" accept=".jpg, .jpeg, .svg, .png, .bpm, .gif, .webp">
        </div>

        {{-- Preview image --}}
        <div class="">
            <img id="thumb" style="width:150px; border-radius:30px;" class="d-none d-lg-block" src="{{ Str::startsWith($dish->image, 'http') ? $dish->image : asset("storage/".$dish->image)}}" />
        </div>

        {{-- Errore img --}}
        <span>
            <strong id="imageError" class='errorFormMsg ms-1'></strong>
        </span>
      
        
        {{-- /Image --}}

        {{-- price --}}
        <div class="input-group">
            <label for="price" class="form-label w-100">Prezzo</label> 
            <span class="input-group-text">€</span>
            <input name="price" id="price" type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" value="{{ $dish->price }}" pattern="^\d{1,4}(\.\d{2})?$" onblur="this.value = parseFloat(this.value).toFixed(2)" required>
        </div>

        <span>
            <strong id="priceError" class='errorFormMsg ms-1'></strong>
        </span>
        {{-- /price --}}

        {{-- description --}}
        <div class="mt-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" rows="3" name="description">{{ $dish->description }}</textarea>
        </div>
        <span>
            <strong id="descriptionError" class='errorFormMsg ms-1'></strong>
        </span>
        {{-- /description --}}     
    
           {{-- Avaliable --}}
        <div class="mb-3">
            <label for="available" class="form-label">Disponibilità</label>
            <select class="form-select" required id="available" name="available">
            <option value="1" {{ old('available', $dish->available) == 1 ? 'selected' : '' }}>Si</option>
            <option value="0" {{ old('available', $dish->available) == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>
      {{-- /Avaliable --}}   
        
        <div class="mt-3">
            <button class="btn btn-success" type="submit" id="dishCreateBtn">Salva</button>
        </div>
    </form>

    <script>
        function showImage(event) {
            const thumb = document.getElementById('thumb');
            thumb.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

@endsection