@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-center mb-5">I tuoi ordini</h1>
  <table class="table">
      <thead>
          <tr>
              <th scope="col">Id</th>
              <th scope="col">user email</th>
              <th scope="col">user address</th>
              <th scope="col">phone number</th>
              <th scope="col">dish id</th>
              <th scope="col">dish quantity</th>

          </tr>
      </thead>
      <tbody>

          @foreach ($dishes as $dish)
              <tr>
                  <th scope="row">{{ $dish->orders->id }}</th>
                  <td>{{$order->interested_user_email}}</td>
                  <td>{{$order->interested_user_address}}</td>
                  <td>{{$order->interested_user_phone}}</td>
            
              </tr>
          @endforeach
{{--           
              @foreach ($dish_orders as $dish_order)
                  <tr>
                    <td>{{$dish_order->dish_id}}</td>
                    <td>{{$dish_order->dish_quantity}}</td>
                  </tr>
              @endforeach --}}

      </tbody>
  </table>
</div>
@endsection