@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      {{-- dd($dishes) --}}

        <div class="col-md-6">
          @component('components/card', ['dish' => $dish,
                                         'admin' => TRUE])
          @endcomponent
        </div>
    </div>
</div>
@endsection
