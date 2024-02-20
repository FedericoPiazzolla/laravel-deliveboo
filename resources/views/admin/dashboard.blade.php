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

                        <h4> Bentornato {{ Auth::user()->name }}! ecco il tuo ristorante:</h4>
                        <h1 class="text-center" style="color: #173736">{{ $restaurant->restaurant_name }}</h1>
                        <img src="{{ $restaurant->restaurant_image }}" class="card-img-top mt-3 w-70" alt="...">
                        <div class="card-body">
                            <p class="card-text">{{ $restaurant->restaurant_email }}</p>
                            <div>{{ $restaurant->restaurant_address }}</div>
                            @foreach ($restaurant->types as $type)
                                <span class="badge text-bg-success"> {{ $type->name }} </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
