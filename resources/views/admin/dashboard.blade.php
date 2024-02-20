@extends('layouts.admin')

@section('content')
    <div class="container dashboard_class">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('La tua dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h4> Bentornato {{ Auth::user()->name }}</h4>

                        <p class="mt-4">Qui hai il controllo totale sui piatti offerti nel tuo ristorante <b
                                class="restaurant_name">{{ $restaurant->restaurant_name }}</b> . Modifica, aggiungi o elimina
                            piatti con facilità per garantire un'esperienza culinaria impeccabile ai tuoi clienti.</p>
                        <p>Sii creativo e aggiungi nuove delizie gastronomiche per stupire i tuoi clienti e far crescere il
                            tuo business. Ricorda, la tua passione per la cucina si riflette nei piatti che offri!</p>

                        <a class="btn btn-success" style="background-color: #fd8d14"
                            href="{{ route('admin.restaurant') }}">
                            dettagli ristorante
                        </a>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
