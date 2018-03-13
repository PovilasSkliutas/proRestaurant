@extends('layouts.app')

@section('content')

@php
    $cartTotal = Cart::total();
    $vat = Cart::vat($cartTotal);
@endphp

<div class="container">

    @if($cartTotal != 0)

    <h2>Your cart ({{ Cart::count() }})</h2>
    <div class="row justify-content-center">
      <div class="col">
        <table class="table">
          <thead class="table-active">
            <tr>
              <th scope="col" class="text-center">#</th>
              <th scope="col" class="text-center">Dish</th>
              <th scope="col" class="text-center"></th>
              <th scope="col" class="text-center">Price</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cart_items as $cart_item)
            <tr>
              <th class="text-center">{{ $cart_item->dish->id }}</th>
              <td class="text-center">{{ $cart_item->dish->title }}</td>
              <td class="text-center">
                <form action="{{ route('cart_items.destroy', $cart_item->id) }}" method="POST">
                  @csrf
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-danger btn-sm">Drop</button>
                </form>
              </td>
              <td class="text-center">{{ number_format($cart_item->dish->price, 2) }}</td>
            </tr>
            @endforeach
            <tr class="">
              <th></th>
              <td></td>
              <td class="text-center table-info font-weight-bold">Sub-total:</td>
              <td class="text-center table-info font-weight-bold">{{ number_format($cartTotal-$vat, 2) }}</td>
            </tr>
            <tr class="">
              <th></th>
              <td></td>
              <td class="text-center font-weight-bold">VAT:</td>
              <td class="text-center font-weight-bold">{{ $vat }}</td>
            </tr>
            <tr class="">
              <th></th>
              <td></td>
              <td class="text-center table-success font-weight-bold">TOTAL:</td>
              <td class="text-center table-success font-weight-bold">{{ $cartTotal }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    @else
        <h2>Your cart is empty. Add something to it!</h2>
    @endif

    @if(Auth::guest() && $cartTotal != 0)
        <div class="row justify-content-left">
            <div class="col-md-3">
                <a href="{{ route('login') }}" class="btn btn-lg btn-success btn-block">Checkout</a>
            </div>
        </div>
    @elseif($cartTotal == 0)
        <div class="row justify-content-center">
            <div class="col">
                <a href="{{ route('home') }}" class="btn btn-lg btn-success btn-block">Add something</a>
            </div>
        </div>
    @else
        <div class="row justify-content-left">
            <div class="col-md-3">
                <form class="form-horizontal" method="POST" action="{{ route('orders.store') }}">
                    {{ csrf_field() }}
                    <button class="btn btn-lg btn-success btn-block">Checkout</button>
                </form>
            </div>
        </div>
    @endif

</div>
@endsection
