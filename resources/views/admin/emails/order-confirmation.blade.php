<h1>Grazie per il tuo ordine</h1>
<h2>Il nostro rider sarà da te tra 25 min!</h2>
<p>Ecco i dettagli: </p>
<p><strong>Ordine numero #{{$order->id}}</strong></p>
<p><strong>con i seguenti articoli: </strong> </p>
<ul>
    @foreach($order->dishes as $dish)
        <li>{{ $dish->name }} <br> <span>Quantità:</span><span class="fw-bold">{{ $dish->pivot->dish_quantity }}</span> </li>
    @endforeach
</ul>
<p><strong>All'indirizzo: </strong>{{$order->interested_user_address}}</p>
<p><strong>Totale: </strong>{{$total}} &euro;</p>
<p>Non esitare a contattarci per qualunque necessità!</p>
<p>By Team 7 &hearts;</p>