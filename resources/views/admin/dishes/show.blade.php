@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="card p-4">
                    <h2>{{ $dish->name }}</h2>

                    <div class="mb-3">    
                        <img src="{{ Str::startsWith($dish->image, 'http') ? $dish->image : asset("storage/".$dish->image)}}" alt="{{ $dish->name }}">
                    </div>

                    <div>
                        <p class="mt-4">
                           <span class="fw-bolder">Descrizione:</span>
                            {{ $dish->description }}
                        </p>
                    </div>
                    <div class="mt-4">
                        <p>
                          <span class="fw-bolder">Prezzo:</span> 
                            {{ $dish->price }}  € 
                        </p>
                        
                    </div> 
                    <div class="mt-4">
                        <p>
                            <span class="fw-bolder">Disponibilià:</span> 
                            {{ $dish->available ? 'Disponibile' : 'Non disponibile' }}
                        </p>
                        
                    </div> 
                </div>
            </div>
        </div>
        
    </div>
@endsection