@extends('layouts.admin')

{{-- name', 'slug', 'description', 'price', 'available' --}}

@section('content')
<div class="container-mt-5">
  <a class="my-5 btn btn-success" href="{{ route('admin.dishes.index') }}">&LeftArrow; Indietro</a>
  <h2 class="flex-grow-1">Pagina di Modifica</h2>

  <form action="{{ route('admin.dishes.update', ['dish' => $dish->slug]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3 has-validation">
      <label for="name" class="form-label">Nome</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $dish->name) }}">

      @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3 has-validation">
      <label for="price" class="form-label">Prezzo</label>
      <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" price="price" value="{{ old('price', $dish->price) }}" name="price">

      @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    {{-- image --}}
    {{-- <div class="mb-3">
      <label for="image_path" class="form-label">Image</label>
      <input type="file" class="form-control" id="image_path" name="image_path">
    </div> --}}
    {{-- /image --}}

    {{-- Avaliable --}}
    <div class="mb-3">
      <label for="available" class="form-label">Disponibilità</label>
      <select class="form-select" id="available" name="available">
        <option value="1" {{ old('available', $dish->available) == 1 ? 'selected' : '' }}>Si</option>
        <option value="0" {{ old('available', $dish->available) == 0 ? 'selected' : '' }}>No</option>
      </select>
    </div>
    {{-- /Avaliable --}}

    <div class="mb-3">
      <label for="description" class="form-label">Descrizione</label>
      <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $dish->description) }}</textarea>
    </div>
   

    <button class="btn btn-warning" type="submit">Modifica</button>
  </form>
</div>

@endsection