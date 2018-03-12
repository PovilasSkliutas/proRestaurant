<div class="card">
    <ul class="list-group">
        <li class="list-group-item list-group-item-info"><h5 style="margin: 0;">{{$dish->title}}</h5></li>
        <li class="list-group-item">
            <a href="{{ route('dishes.show', $dish->id) }}">
                <img class="card-img-top" src="{{$dish->image_url}}" alt="Card image cap">
            </a>
        </li>
        <li class="list-group-item"><p class="card-text">{{ str_limit($dish->description, 100) }}</p></li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-6">
                    <h5 style="margin-top: 0.5rem;">Price: {{ number_format($dish->price, 2) }}</h5>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('cart_items.store') }}" method="POST" class="js-cart-form form-inline">
                        {{ csrf_field() }}
                        <input
                       	type="hidden"
                       	    name="dish_id"
                      	 value="{{ $dish->id }}">
                        <button type="submit" class="btn btn-info btn-block">Add to cart</button>
                    </form>
                </div>
            </div>
        </li>
        @if(Auth::check() && Auth::user()->role == 'admin') {{-- tikrina ar vartotojas prisjunges ir kokia jo role --}}
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-warning btn-block">Edit</a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST" class="form-inline">
                      @csrf
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-danger btn-block">Delete</button>
                    </form>
                </div>
            </div>
        </li>
        @endif
    </ul>
</div>
