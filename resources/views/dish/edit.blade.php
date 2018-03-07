@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          {{-- dd($errors) --}}
          <form action="{{ route('dishes.update', $dish->id) }}" method="POST" class="needs-validation">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" id="title" name="title" placeholder="enter title" value="{{old('title', $dish->title)}}">
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
                <input type="text" class="form-control @if($errors->has('image_url')) is-invalid @endif" id="image" name="image" value="{{old('image_url', $dish->image_url)}}">
                @if($errors->has('image_url'))
                <div class="invalid-feedback">
                  {{ $errors->first('image_url') }}
                </div>
                @endif
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="description">Description</label>
                <textarea class="form-control @if($errors->has('description')) is-invalid @endif" id="description" name="description" rows="3" value="{{old('description')}}">{{$dish->description}}</textarea>
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
                <input type="text" class="form-control @if($errors->has('price')) is-invalid @endif" id="price" name="price" placeholder="0.00$" value="{{old('price', $dish->price)}}">
                  @if($errors->has('price'))
                  <div class="invalid-feedback">
                    {{ $errors->first('price') }}
                  </div>
                  @endif
              </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                  <a href="{{ route('dishes.show', $dish->id) }}" class="btn btn-primary btn-block">Back</a>
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
