@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-center mb-5">I tuoi ordini</h1>
  <table class="table">
      <thead>
          <tr>
              <th scope="col">Data</th>
              <th scope="col">Id</th>
              <th scope="col">Email utente</th>
              <th scope="col">Indirizzo utente</th>
              <th scope="col">Telefono</th>
              <th scope="col">Dettaglio</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($orders as $order)
              <tr>
                  <th scope="row">{{ $order->created_at }}</th>
                  <td>{{ $order->id }}</td>
                  <td>{{$order->interested_user_email}}</td>
                  <td>{{$order->interested_user_address}}</td>
                  <td>{{$order->interested_user_phone}}</td>
                  <td><a class="btn btn-primary ms-3" href="{{ route("admin.orders.show", ["id" => $order->id]) }}"><i class="fa-solid fa-eye"></i></a></td>
              </tr>
          @endforeach
      </tbody>
  </table>
</div>
@endsection