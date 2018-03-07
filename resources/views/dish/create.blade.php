@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          {{-- dd($errors) --}}
          <form action="{{ route('dishes.store') }}" method="POST" class="needs-validation">
            @csrf

            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" id="title" name="title" value="{{old('title')}}">
                @if($errors->has('title'))
                <div class="invalid-feedback">
                  {{ $errors->first('title') }}
                </div>
                @endif
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="image">Image</label>
                <input type="text" class="form-control @if($errors->has('image_url')) is-invalid @endif" id="image" name="image" value="{{old('image')}}">
                @if($errors->has('image'))
                <div class="invalid-feedback">
                  {{ $errors->first('image') }}
                </div>
                @endif
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="description">Description</label>
                <textarea class="form-control @if($errors->has('description')) is-invalid @endif" id="description" name="description" rows="3">{{old('description')}}</textarea>
                  @if($errors->has('description'))
                  <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                  </div>
                  @endif
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="price">Price</label>
                <input type="text" class="form-control @if($errors->has('price')) is-invalid @endif" id="price" name="price" placeholder="0.00$" value="{{old('price')}}">
                  @if($errors->has('price'))
                  <div class="invalid-feedback">
                    {{ $errors->first('price') }}
                  </div>
                  @endif
              </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                  <a href="{{ route('home') }}" class="btn btn-primary btn-block">Back</a>
                </div>
              <div class="col-md-6 mb-3">
                <button type="create" class="btn btn-warning btn-block">Create</button>
              </div>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection
