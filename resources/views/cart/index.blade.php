@extends('layouts.app')

@section('content')

@php
    $cartTotal = Cart::total();
    $vat = number_format($cartTotal*0.21, 2);
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
              <th scope="col" class="text-center">Price</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cart_items as $cart_item)
            <tr>
              <th class="text-center">{{ $cart_item->dish->id }}</th>
              <td class="text-center">{{ $cart_item->dish->title }}</td>
              <td class="text-center">{{ number_format($cart_item->dish->price, 2) }}</td>
              <td class="text-center">
                <form action="{{ route('cart_items.destroy', $cart_item->id) }}" method="POST">
                  @csrf
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-danger btn-sm">Drop</button>
                </form>
              </td>
            </tr>
            @endforeach
            <tr class="table-info">
              <th class="text-center font-weight-bold">Sub-total:</th>
              <td class="text-center font-weight-bold"></td>
              <td class="text-center font-weight-bold">{{ number_format($cartTotal-$vat, 2) }}</td>
            </tr>
            <tr class="">
              <th class="text-center font-weight-bold">VAT:</th>
              <td class="text-center font-weight-bold"></td>
              <td class="text-center font-weight-bold">{{ $vat }}</td>
            </tr>
            <tr class="table-success">
              <th class="text-center font-weight-bold">TOTAL:</th>
              <td class="text-center font-weight-bold"></td>
              <td class="text-center font-weight-bold">{{ $cartTotal }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    @else
        <h2>Your cart is empty. Add something to it!</h2>
    @endif

</div>
@endsection
