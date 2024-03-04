<h1>Hai ricevuto un nuovo ordine!</h1>

<p><strong>Ordine numero #{{$order->id}}</strong></p>
<p><strong>con i seguenti articoli:</strong> </p>
<ul>
    @foreach($order->dishes as $dish)
        <li>{{ $dish->name }} </li>
        <div><span>Quantità:</span>
        <span class="fw-bold">{{ $dish->pivot->dish_quantity }}</span> </div>
    @endforeach
</ul>
<p><strong>Totale:</strong></p>
<p>{{$total}} &euro;</p>
<p><strong>Da:</strong>{{$order->interested_user_email}}</p>
<p><strong>All'indirizzo:</strong>{{$order->interested_user_address}}</p>
