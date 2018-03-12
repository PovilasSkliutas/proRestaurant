<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li><a class="nav-link" href="{{ route('home') }}">Dishes</a></li>
                        <li><a class="nav-link" href="#">Contact</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a class="nav-link" href="{{ route('reservations.index') }}">Reservations</a></li>
                            <li><a class="nav-link" href="{{ route('orders.index') }}">Orders</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                            <li id="cart">
                                <a class="nav-link" href="{{ route('cart_items.index') }}">
                                Cart (<span class="cart-size">{{ Cart::count() }}</span>) -
                                      <span class="cart-total">{{ Cart::total() }}</span>$
                                </a>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- carto scriptas -->
    <script type="text/javascript">
        // DOMContentLoaded
        $(document).ready(function() {
            // uzdedame "submit" ivyki ant formos
            $('.js-cart-form').on('submit', function(event) {
                // alert('on submit ivyko');
                event.preventDefault();

                // ajax uzklausa
                $.ajax({
                    method: "POST",
                    url: $(this).attr('action'), // Paima 'šitos' formos atributą "action"
                    data: $(this).serialize(), // Paima 'šitos' formos elementų reikšmes ir sudeda į vieną eilutę
                    success: function(data) {
                        //alert("data saved: " + data);
                        let parsedData = $.parseJSON(data), // Paverčia JSON eilutę į JS objektą
                            cartSize = parseFloat($('#cart .cart-size').text()), // converts string to number
                            cartTotal = parseFloat($('#cart .cart-total').text().replace(',', '')); // converts string to number

                        cartSize = cartSize + 1;
                        cartTotal = cartTotal + parsedData.dish.price;

                        $('#cart .cart-size').text(cartSize); // Changes the text for cart-size
                        $('#cart .cart-total').text(cartTotal.toLocaleString('en-GB', { minimumFractionDigits: 2 })); // Changes the text for cart-total

                        let alert = $('<div class="alert alert-success sticky-top" role="alert">');
                              alert.html('Succesfully added one <strong>' + parsedData.dish.title + "</strong>, which price is " + parsedData.dish.price + '$');

                              alert.hide();
                            $('main .alert').fadeOut();
                            $('main').prepend(alert.fadeIn());

                    },
                    error: function(msg) {
                        alert("data saved: " + data);
                    }
                });
            });
        });
    </script>
</body>
</html>
