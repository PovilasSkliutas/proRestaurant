@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Reservations</h2>
    {{-- @if(Auth::user()) --}}
    @auth
    <div class="row justify-content-end">
        <div class="col-md-3">
            <a href="#" class="btn btn-success btn-block">Create</a>
            <hr>
      </div>
    </div>
    @endif
    <div class="row justify-content-center">
      <div class="col">
        <table class="table">
          <thead class="table-active">
            <tr>
              <th scope="col" class="text-center">#</th>
              <th scope="col" class="text-center">Name</th>
              <th scope="col" class="text-center">People amount</th>
              <th scope="col" class="text-center">Reservation</th>
              <th scope="col" class="text-center">Phone</th>
              <th scope="col" class="text-center">Created</th>
              <th scope="col" class="text-center">Updated</th>
              {{-- @if(Auth::user()) --}}
              @auth
              <th scope="col" class="text-center">Edite</th>
              <th scope="col" class="text-center">Delete</th>
              @endif
            </tr>
          </thead>
          <tbody>
            @foreach ($reservations as $reservation)
            <tr>
              <th class="text-center">{{ $reservation->id }}</th>
              <td class="text-center font-weight-bold">{{ $reservation->name }}</td>
              <td class="text-center">{{ $reservation->people_amount }}</td>
              <td class="text-center">{{ $reservation->date }}{{ $reservation->time }}</td>
              <td class="text-center">{{ $reservation->phone }}</td>
              <td class="text-center">{{ $reservation->created_at }}</td>
              <td class="text-center">{{ $reservation->updated_at }}</td>
              {{-- @if(Auth::user()) --}}
              @auth
              <td class="text-center">
                <a href="#" class="btn btn-warning btn-sm">Edit</a>
              </td>
              <td class="text-center">
                <form action="#" method="POST">
                  @csrf
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
              @endif
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
@endsection
