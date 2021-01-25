<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>


        <!-- CSRF Token -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script> window.laravel = { csrfToken: '{{ csrf_token() }}' } </script>
        <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height" id="app">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Stock Management System</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
 
            <div class="content col-md-12">
                <div class="row mx-auto title m-b-md">
                    Stock Management System
                </div>
                <div class="row">
                    <div class="col-md-6 border-right border-dark">
                        <h4 class="text- font-weight-bold">Login</h4>
                        <div class="links text-white">
                            <a href="{{ url('manager-login')}}">Manager</a>
                            <a href="{{ url('stockKeeper-login')}}">Stock Keeper</a>
                            <a href="{{ url('cashier-login')}}">Cashier</a>
                        </div></div>
                    <div class="col-md-6 border-left border-dark ">
                        <h4 class="text- font-weight-bold">Register</h4>    
                        <div class="links text-white">
                            <a href="{{ url('manager-register')}}">Manager</a>
                            <a href="{{ url('storeKeeper-register')}}">Stock Keeper</a>
                            <a href="{{ url('cashier-register')}}">Cashier</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </body>
</html>