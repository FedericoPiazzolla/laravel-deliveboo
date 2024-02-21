@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrazione') }}</div>

                <div class="card-body">
                    <form name="myForm" method="POST" action="{{ route('register') }}" enctype="multipart/form-data" onsubmit="return validateForm()">
                        @csrf

                        {{-- DATI RISTORATORE --}}
                        <h2>Dati Utente</h2>

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="vat_number" class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA') }}</label>

                            <div class="col-md-6">
                                <input id="vat_number" type="vat_number" class="form-control @error('vat_number') is-invalid @enderror" name="vat_number" value="{{ old('vat_number') }}" required autocomplete="vat_number">

                                @error('vat_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        {{-- / DATI RISTORATORE --}}

                        {{--  DATI RISTORANTE --}}
                        <h2>Dati Ristorante</h2>

                        <div class="mb-4 row">
                            <label for="restaurant_name" class="col-md-4 col-form-label text-md-right">{{ __('Nome Ristorante') }}</label>

                            <div class="col-md-6">
                                <input id="restaurant_name" type="text" class="form-control @error('restaurant_name') is-invalid @enderror" name="restaurant_name" value="{{ old('restaurant_name') }}" required autocomplete="name" autofocus>

                                @error('restaurant_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="restaurant_email" class="col-md-4 col-form-label text-md-right">{{ __('Email Ristorante') }}</label>

                            <div class="col-md-6">
                                <input id="restaurant_email" type="text" class="form-control @error('restaurant_email') is-invalid @enderror" name="restaurant_email" value="{{ old('restaurant_email') }}" required autocomplete="name" autofocus>

                                @error('restaurant_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- IMAGE --}}
                        <div class="mb-4 row">
                            <label for="restaurant_image" class="col-md-4 col-form-label text-md-right">{{ __('Immagine Ristorante') }}</label>

                            <div class="col-md-6">
                                <input id="restaurant_image" type="file" class="form-control @error('restaurant_email') is-invalid @enderror" name="restaurant_image" value="{{ old('restaurant_image') }}" required autocomplete="name" autofocus>

                                @error('restaurant_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <img id="preview_image" src="" alt="" style="max-width: 400px">
                        </div>
                        {{-- / IMAGE --}}


                        {{-- LOGO --}}
                        <div class="mb-4 row">
                            <label for="restaurant_logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo Ristorante') }}</label>

                            <div class="col-md-6">
                                <input id="restaurant_logo" type="file" class="form-control @error('restaurant_logo') is-invalid @enderror" name="restaurant_logo" value="{{ old('restaurant_logo') }}" required autocomplete="name" autofocus>

                                @error('restaurant_logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <img id="preview_logo" src="" alt="" style="max-width: 400px">
                        </div> 
                        {{-- / LOGO --}}

                        <div class="mb-4 row">
                            <label for="restaurant_address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo Ristorante') }}</label>

                            <div class="col-md-6">
                                <input id="restaurant_address" type="text" class="form-control @error('restaurant_email') is-invalid @enderror" name="restaurant_address" value="{{ old('restaurant_address') }}" required autocomplete="name" autofocus placeholder="Via Tuo Ristorante, CAP, Città">

                                @error('restaurant_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        {{-- TYPES --}}
                        <div class="mb-3">
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
                        {{-- / TYPES --}}


                        {{-- / DATI RISTORANTE --}}

                        <div class="mt-5 row m-0 text-center ">
                            <div class="col offset-md-4 m-0">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
