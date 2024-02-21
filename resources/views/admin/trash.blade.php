@extends('layouts.admin')

@section('content')
<div class="container">
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

                    <form class="d-inline-block" action="{{route('admin.restore', ['id' => $dish->id]) }}" method="PUT">
                      @csrf
                      @method("DELETE")

                      <button class="btn btn-warning" type="submit">
                        <i class="fa-solid fa-trash-arrow-up"></i>
                      </button>
                    </form>

                    <form class="d-inline-block" action="{{route('admin.destroy', ['dish' => $dish->slug]) }}" method="PUT">
                      @csrf
                      @method("DELETE")

                      <button class="btn btn-danger" type="submit">
                        <i class="fa-solid fa-trash"></i>
                      </button>
                    </form>

                  </td>
              </tr>
          @endforeach


      </tbody>
  </table>
</div>
@endsection