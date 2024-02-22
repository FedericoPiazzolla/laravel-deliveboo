@extends('layouts.admin')

@section('content')
<div class="container">

  {{-- Def Delete Message --}}
  @if (session('def_del_mess'))
    <div class="container text-center">
        <p class="alert alert-danger fw-bold">
            {{ strtoupper(session('def_del_mess')) }}
        </p>
    </div>
  @endif
  
  @if (count($dishes) > 0)
    <table class="table">
      <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th class="text-center" scope="col">Restore</th>
          </tr>
      </thead>
      <tbody>

        @foreach ($dishes as $dish)
          <tr>
              <th scope="row">{{ $dish->id }}</th>
              <td>{{$dish->name}}</td>
              <td class="text-center">

                  <form class="d-inline-block" action="{{route('admin.dishes.restore', ['dish' => $dish->slug]) }}" method="POST">
                    @csrf

                    <button class="btn btn-warning" type="submit">
                      <i class="fa-solid fa-trash-arrow-up"></i>
                    </button>
                  </form>

                  <form class="d-inline-block" action="{{route('admin.dishes.def_destroy', ['dish' => $dish->slug]) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger" type="submit">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </form>

              </td>
          </tr>
        @endforeach


      </tbody>
  </table>  
  @else
    <div class="d-flex flex-column align-items-center mb-4">
        <h1 class="text-center mb-4">Il tuo cestino è vuoto</h1>
        <a href="{{ route('admin.dishes.index') }}" class="btn btn-warning float-end">BACK</a>
    </div>
  @endif
  
</div>
@endsection