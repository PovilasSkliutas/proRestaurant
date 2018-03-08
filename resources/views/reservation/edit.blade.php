@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          {{-- dd($errors) --}}
          <form action="{{ route('reservations.update', $reservation->id) }}" method="POST" class="needs-validation">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h3>Create new reservation</h3>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" id="name" name="name" value="{{ old('name', $reservation->name) }}">
                @if($errors->has('name'))
                <div class="invalid-feedback">
                  {{ $errors->first('name') }}
                </div>
                @endif
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="amount">People amount</label>
                <input type="text" class="form-control @if($errors->has('amount')) is-invalid @endif" id="amount" name="amount" value="{{ old('amount', $reservation->people_amount) }}">
                @if($errors->has('amount'))
                <div class="invalid-feedback">
                  {{ $errors->first('amount') }}
                </div>
                @endif
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="date">Date</label>
                <input type="text" class="form-control @if($errors->has('date')) is-invalid @endif" id="date" name="date" value="{{ old('date', $reservation->date) }}">
                @if($errors->has('date'))
                <div class="invalid-feedback">
                  {{ $errors->first('date') }}
                </div>
                @endif
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="time">Time</label>
                <input type="text" class="form-control @if($errors->has('time')) is-invalid @endif" id="time" name="time" value="{{ old('time', $reservation->time) }}">
                  @if($errors->has('time'))
                  <div class="invalid-feedback">
                    {{ $errors->first('time') }}
                  </div>
                  @endif
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="phone">Phone</label>
                <input type="text" class="form-control @if($errors->has('phone')) is-invalid @endif" id="phone" name="phone" value="{{ old('phone', $reservation->phone) }}">
                  @if($errors->has('phone'))
                  <div class="invalid-feedback">
                    {{ $errors->first('phone') }}
                  </div>
                  @endif
              </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                  <a href="{{ route('reservations.index') }}" class="btn btn-primary btn-block">Back</a>
                </div>
              <div class="col-md-6 mb-3">
                <button type="create" class="btn btn-warning btn-block">Update</button>
              </div>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection
