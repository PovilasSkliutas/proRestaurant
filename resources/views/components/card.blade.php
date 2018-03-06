<div class="card">
  <img class="card-img-top" src="{{$dish->image_url}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">
      {{$dish->title}}
    </h5>
    <h5 class="card-text">
      Price:
      <span class="badge badge-success">{{$dish->price}}</span>
    </h5>
    <h5 class="card-text">

    <p class="card-text">{{$dish->description}}</p>

    @if($admin == FALSE)
      <a href="#" class="btn btn-info btn-sm">Read more</a>
    @else
      @auth
      <a href="#" class="btn btn-warning btn-sm">Edit</a>
      <form action="#" method="POST" class="form-inline">
        @csrf
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
      </form>
      @endif
    @endif

  </div>
</div>
