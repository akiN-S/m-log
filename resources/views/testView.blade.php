<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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

            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                /* text-align: center; */
                position: absolute;
                left: 50px;
                top: 50px;
            }

            .title {
                /* font-size: 84px; */
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
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



        <div class="position-ref full-height">

            <div class="top-left links">
                <a href="{{ url('/home') }}">m-log</a>
            </div>

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <form method="GET" action="{{action('HomeController@index')}}">
                    
                    @csrf
                    timestamp:{{$mLog->timestamp}}<br />
                    price:{{$mLog->price}}<br />
                    currency:{{$mLog->currency}}<br />
                    currency:{{$mLog->method}}<br />
                    statement:{{$mLog->statement}}<br />
                    place:{{$mLog->place}}<br />
                    address:{{$mLog->address}}<br />
                    loaction:{{$mLog->location}}<br />
                    <input type="submit" value="送信">
                </form>
                
            </div>

        </div>


    </body>
</html>
