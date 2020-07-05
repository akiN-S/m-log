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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Check</th>
                        <th scope="col">Date and Time</th>
                        <th scope="col">Price</th>
                        <th scope="col">Currency</th>
                        <th scope="col">Method</th>
                        <th scope="col">Statement</th>
                        <th scope="col">Place</th>
                        <th scope="col">Address</th>
                        <th scope="col">Location</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $data)
                        <tr>
                            <td>{{ Form::checkbox('edit', $data->id) }}</td>
                            <td>{{ $data->usedTime }}</td>
                            <td>{{ $data->price }}</td>
                            <td>{{ $data->currency }}</td>
                            <td>{{ $data->method }}</td>
                            <td>{{ $data->statement }}</td>
                            <td>{{ $data->place }}</td>
                            <td>{{ $data->address }}</td>
                            <td>{{ $data->location }}</td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>

        </div>


    </body>
</html>
