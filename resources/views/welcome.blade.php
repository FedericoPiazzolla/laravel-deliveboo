@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 rounded-3">
    <div class="container">
        <div class="hero-img text-center">
            <img src="{{ Vite::asset('/resources/images/hero-rider.png')}}" alt="">
        </div>
        <h1 class="display-5 fw-bold mt-5">
            Welcome to DeliveBoo
        </h1>

        <p class="col fs-4 mt-5">Desideri espandere la tua attività ristorativa? Unisciti a noi e scopri i vantaggi della nostra piattaforma di consegna alimentare per locali! Con la nostra soluzione personalizzata, potrai aumentare la tua visibilità e raggiungere nuovi clienti senza investimenti aggiuntivi. Gestisci gli ordini in modo semplice ed efficiente, ottieni accesso a dati analitici dettagliati e porta la tua attività al prossimo livello con noi! Contattaci oggi stesso per saperne di più su come diventare parte della nostra rete di partner.</p>
    
    </div>
</div>

@endsection
