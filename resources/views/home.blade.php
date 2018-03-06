@extends('layouts.app')

@section('content')
<div class="container">

    {{-- @if(Auth::user()) --}}
    @auth
    <div class="row justify-content-end">
      <div class="col-md-4">
        <a href="#" class="btn btn-success btn-block">Create</a>
        <hr>
      </div>
    </div>
    @endif

    <div class="row justify-content-center">
      @foreach ($dishes as $dish)
        <div class="col-md-4 card-deck">
          @component('components/card', ['dish' => $dish,
                                         'admin' => FALSE]) <!-- komponento nustatymas -->
          @endcomponent
        </div>
      @endforeach
    </div>
</div>
@endsection
