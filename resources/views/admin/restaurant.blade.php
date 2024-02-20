@extends('layouts.admin')

@section('content')
    <div class="container text-center">
        <h1 style="color: #173736">{{ $restaurant->restaurant_name }}</h1>
        <div class="row d-flex justify-content-center">
            <div class="card " style="width: 18rem; background-color: #f3de9f;"">
                <img src="{{ $restaurant->restaurant_image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">{{ $restaurant->restaurant_email }}</p>
                    <div>{{ $restaurant->restaurant_address }}</div>
                    @foreach ($restaurant->types as $type)
                        {
                        <span class="badge text-bg-success"> {{ $type->name }} </span>
                        }
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
