@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-center mb-5">I tuoi ordini</h1>
  <table class="table">
      <thead>
          <tr>
              <th scope="col">Id</th>
              <th scope="col">email utente</th>
              <th scope="col">indirizzo utente</th>
              <th scope="col">telefono</th>
              <th scope="col">quantità</th>

          </tr>
      </thead>
      <tbody>

          @foreach ($orders as $order)

              <tr>
                  <th scope="row">{{ $order->id }}</th>
                  <td>{{$order->interested_user_email}}</td>
                  <td>{{$order->interested_user_address}}</td>
                  <td>{{$order->interested_user_phone}}</td>
                  <td>{{$order->dish_quantity}}</td>

              </tr>
          @endforeach



      </tbody>
  </table>
</div>
@endsection