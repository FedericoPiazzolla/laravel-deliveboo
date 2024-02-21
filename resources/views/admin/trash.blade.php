@extends('layouts.admin')

@section('content')
<div class="container">
  <table class="table">
      <thead>
          <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Restore</th>
          </tr>
      </thead>
      <tbody>

          @foreach ($dishes as $dish)
              <tr>
                  <th scope="row">{{ $dish->id }}</th>
                  <td>{{$dish->name}}</td>
                  <td>

                    <form action="{{route('restore', ['id' => $dish->id]) }}">
                      <button class="btn btn-warning" type="submit">
                        <i class="fa-solid fa-trash-arrow-up"></i>
                      </button>
                    </form>

                  </td>
              </tr>
          @endforeach


      </tbody>
  </table>
</div>
@endsection