@extends('layouts.admin')

@section('content')
    <div class="container dashboard_class">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Info sul tuo ristorante') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h4 class="mb-4"> Bentornato {{ Auth::user()->name }}! ecco il tuo ristorante:</h4>
                        <h1 class="text-center mb-4" style="color: #173736">{{ $restaurant->restaurant_name }}</h1>

                        <img src="{{ Str::startsWith($restaurant->restaurant_image, 'http') ? $restaurant->restaurant_image : asset("storage/".$restaurant->restaurant_image)}}" alt="{{ $restaurant->name }}">

                        <div class="card-body">
                            <div class="mb-4">
                                <p class="card-text">
                                    <span class="fw-bolder">La tua mail:</span>
                                    {{ $restaurant->restaurant_email }}
                                </p>
                            </div>
                            
                            <div class="mb-4">
                                <p>
                                    <span class="fw-bolder">La tua via:</span>
                                     {{ $restaurant->restaurant_address }}
                                </p>
                            </div>

                            <div class="mb-4">
                                <p class="fw-bolder">Le tue Tipologie:</p>
                                @foreach ($restaurant->types as $type)
                                    <span class="badge text-bg-success"> {{ $type->name }} </span>
                                @endforeach
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
