@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Orders()</h2>

    <div class="row justify-content-center">
      <div class="col">
        <table class="table">
          <thead class="table-active">
            <tr>
              <th scope="col" class="text-center">#</th>
              <th scope="col" class="text-center">Orders</th>
              <th scope="col" class="text-center">User</th>
              <th scope="col" class="text-center">Address</th>
              <th scope="col" class="text-center">Total amount</th>
              <th scope="col" class="text-center">Tax amount</th>
              <th scope="col" class="text-center">Date</th>
              {{-- @if(Auth::user()) --}}
              @auth
              <th scope="col" class="text-center">Cancel</th>
              @endif
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
            <tr>
              <th class="text-center">{{ $order->id }}</th>
              <td class="text-center">Orders</td>
              <td class="text-center">{{ $order->user->name }} {{ $order->user->surname }}</td>
              <td class="text-center">{{ $order->user->address }}</td>
              <td class="text-center">{{ $order->total_amount }}</td>
              <td class="text-center">{{ $order->tax_amount }}</td>
              <td class="text-center">{{ $order->created_at }}</td>
              {{-- @if(Auth::user()) --}}
              @auth
              <td class="text-center">
                <form action="#" method="POST">
                  @csrf
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
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
