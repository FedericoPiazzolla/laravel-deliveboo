@extends('layouts.app')

@section('content')
@vite([ 'resources/js/registrationForm.js' ])

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrazione') }}</div>

                <div class="card-body">
                    <form name="myForm" method="POST" action="{{ route('register') }}" enctype="multipart/form-data" id='registrationForm'>
                        @csrf

                        {{-- DATI RISTORATORE --}}
                        <h2>Dati Utente</h2>

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                
                                {{-- Gestione errore name --}}
                               <span>
                                   <strong id="nameError" class='errorFormMsg ms-1'></strong><br>
                               </span>

                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                {{-- Gestione errore cognome --}}
                                <span >
                                    <strong id="surnameError" class='errorFormMsg ms-1'></strong>
                                </span>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="vat_number" class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA') }}</label>

                            <div class="col-md-6">
                                <input id="vat_number" type="vat_number" class="form-control @error('vat_number') is-invalid @enderror" name="vat_number" value="{{ old('vat_number') }}" required autocomplete="vat_number">

                                {{-- Gestione vat_number --}}
                         
                                 <span >
                                    <strong id="vatNumberError" class='errorFormMsg ms-1'></strong>
                                </span>
                        
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">

                                {{-- Gestione email --}}
                                <span >
                                    <strong id="emailError" class='errorFormMsg ms-1'></strong>
                                </span>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                               {{-- Gestione password --}}
                               <span >
                                <strong id="passwordError" class='errorFormMsg ms-1'></strong>
                            </span>
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

                                {{-- Errore nome ristoranre --}}
                                <span>
                                    <strong id="restaurantNameError" class='errorFormMsg ms-1'></strong>
                                </span>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="restaurant_email" class="col-md-4 col-form-label text-md-right">{{ __('Email Ristorante') }}</label>

                            <div class="col-md-6">
                                <input id="restaurant_email" type="text" class="form-control @error('restaurant_email') is-invalid @enderror" name="restaurant_email" value="{{ old('restaurant_email') }}" required autocomplete="name" autofocus>

                                {{-- Errore email ristorante --}}
                                <span>
                                    <strong id="restaurantEmailError" class='errorFormMsg ms-1'></strong>
                                </span>
                            </div>
                        </div>

                        {{-- IMAGE --}}
                        <div class="mb-4 row">
                            <label for="restaurant_image" class="col-md-4 col-form-label text-md-right">{{ __('Immagine Ristorante') }}</label>

                            <div class="col-md-6">
                                <input id="restaurant_image" type="file" class="form-control @error('restaurant_image') is-invalid @enderror" name="restaurant_image" value="{{ old('restaurant_image') }}" required autocomplete="name" autofocus accept=".jpg, .jpeg, .svg, .png, .bpm, .gif, .webp">

                                 {{-- Errore image --}}
                                 <span>
                                    <strong id="imageError" class='errorFormMsg ms-1'></strong>
                                </span>
                                
                            </div>
                        </div>

                        <div class="mb-3">
                            <img id="preview_image" src="" alt="" style="width:150px; border-radius:30px;">
                        </div>
                        {{-- / IMAGE --}}


                        {{-- LOGO --}}
                        <div class="mb-4 row">
                            <label for="restaurant_logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo Ristorante') }}</label>

                            <div class="col-md-6">
                                <input id="restaurant_logo" type="file" class="form-control @error('restaurant_logo') is-invalid @enderror" name="restaurant_logo" value="{{ old('restaurant_logo') }}" required autocomplete="name" autofocus accept=".jpg, .jpeg, .svg, .png, .bpm, .gif, .webp">

                               {{-- Errore logo --}}
                               <span>
                                <strong id="logoError" class='errorFormMsg ms-1'></strong>
                                </span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <img id="preview_logo" src="" alt="" style="width:150px; border-radius:30px;">
                        </div> 
                        {{-- / LOGO --}}

                        {{-- INDIRIZZO RISTORANTE --}}

                        {{-- VIA --}}
                        <div class="mb-4 row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="name" autofocus>

                                {{-- Errore indirizzo --}}
                                <span>
                                    <strong id="addressError" class='errorFormMsg ms-1'></strong>
                                </span>
                            </div>
                        </div>
                        {{-- /VIA --}}

                        {{-- NUMERO CIVICO --}}
                        <div class="mb-4 row">
                            <label for="addressNumber" class="col-md-4 col-form-label text-md-right">{{ __('Numero Civico') }}</label>

                            <div class="col-md-6">
                                <input id="addressNumber" type="string" class="form-control @error('number') is-invalid @enderror" name="addressNumber" value="{{ old('number') }}" required autocomplete="name" autofocus>

                                {{-- Errore numero civico --}}
                                <span>
                                    <strong id="addressNumberError" class='errorFormMsg ms-1'></strong>
                                </span>
                            
                            </div>
                        </div>
                        {{-- /NUMBERO CIVICO --}}

                        {{-- CAP --}}
                        <div class="mb-4 row">
                            <label for="cap" class="col-md-4 col-form-label text-md-right">{{ __('CAP') }}</label>

                            <div class="col-md-6">
                                <input id="cap" type="string" class="form-control @error('cap') is-invalid @enderror" name="cap" value="{{ old('cap') }}" required autocomplete="name" autofocus>

                            {{-- Errore cap --}}
                            <span>
                                <strong id="capError" class='errorFormMsg ms-1'></strong>
                            </span>
                            
                        </div>
                        </div>
                        {{-- /CAP --}}

                        {{-- CITTÀ --}}
                        <div class="mb-4 row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Città') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required autocomplete="name" autofocus>

                             {{-- Errore city --}}
                            <span>
                                <strong id="cityError" class='errorFormMsg ms-1'></strong>
                            </span>


                            </div>
                        </div>
                        {{-- /CITTÀ --}}

                        {{-- / INDIRIZZO RISTORANTE --}}


                        {{-- TYPES --}}
                        <div class="mb-3">
                           <h5>Seleziona il tipo di cuina del tuo ristorante:</h5>
                           <div class="form-check">
                                @foreach ($types as $type)
                                    <div id="typeForm">
                                        <input type="checkbox" class="ms_check" id="type-{{ $type->id }}" value="{{ $type->id }}" name="types[]">
                                    <label for="type-{{ $type->id }}">
                                        {{ $type->name }}
                                    </label>
                                    </div>  
                                @endforeach
                           </div>


                             {{-- Errore types --}}
                             <span>
                                <strong id="typeError" class='errorFormMsg ms-1'>Selezionare almeno una tipologia per il tuo ristorante</strong>
                            </span>

                        </div>
                        {{-- / TYPES --}}


                        {{-- / DATI RISTORANTE --}}

                        <div class="mt-5 row m-0 text-center ">
                            <div class="col offset-md-4 m-0">
                                <button type="submit" class="btn btn-primary" id="regFormBtn">
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
