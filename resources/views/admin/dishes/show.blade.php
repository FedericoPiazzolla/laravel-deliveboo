@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>{{ $dish->name }}</h2>
        <div>
            <p class="mt-4">
                {{ $dish->description }}
            </p>
        </div>
        <div class="mt-4">
            Slug: {{ $dish->slug }}
        </div> 
        <div class="mt-4">
            Prezzo: {{ $dish->price }} 
        </div> 
        <div class="mt-4">
            Disponibilità: {{ $dish->available }}
        </div> 
    </div>
@endsection