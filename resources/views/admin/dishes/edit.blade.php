@extends('layouts.admin')

{{-- name', 'slug', 'description', 'price', 'available' --}}

@section('content')
<div class="container-mt-5">
  <a class="my-5 btn btn-success" href="{{ route('admin.dishes.index') }}">&LeftArrow; back</a>
  <h2 class="flex-grow-1">Edit Page</h2>

  <form action="{{ route('admin.dishes.update', ['dish' => $dish->slug]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3 has-validation">
      <label for="name" class="form-label">name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $dish->name) }}">

      @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    {{-- image --}}
    {{-- <div class="mb-3">
      <label for="image_path" class="form-label">Image</label>
      <input type="file" class="form-control" id="image_path" name="image_path">
    </div> --}}
    {{-- /image --}}

    {{-- Type --}}
    <div class="mb-3 has-validation">
        <h5>Seleziona il tipo di cuina del tuo ristorante:</h5>
        <div class="form-check">
             @foreach ($types as $type)
                 <div>
                    <input type="checkbox" id="type-{{ $type->id }}" value="{{ $type->id }}" name="types[]">
                 <label for="type-{{ $type->id }}">
                    {{ $type->name }}
                 </label>
                 </div>  
             @endforeach
        </div>
    </div>
    {{-- /Type --}}

    <div class="mb-3">
      <label for="description" class="form-label">description</label>
      <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $dish->description) }}</textarea>
    </div>

    <button class="btn btn-warning" type="submit">Modify</button>
  </form>
</div>

@endsection