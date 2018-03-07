@extends('layouts.app')

@section('content')
<div class="container">

    {{-- @if(Auth::user()) --}}
    @if(Auth::check() && Auth::user()->role == 'admin') {{-- tikrina ar vartotojas prisjunges ir kokia jo role --}}
    <div class="row justify-content-end">
      <div class="col-md-4">
        <a href="{{ route('dishes.create') }}" class="btn btn-success btn-block">Create new Dish</a>
        <hr>
      </div>
    </div>
    @endif

    <div class="row justify-content-center">
      @foreach ($dishes as $dish)
        <div class="col-md-4" style="margin-bottom: 1.5rem;">
          @component('components/card', ['dish' => $dish,
                                         'admin' => TRUE]) <!-- komponento nustatymas -->
          @endcomponent
        </div>
      @endforeach
    </div>
</div>
@endsection
