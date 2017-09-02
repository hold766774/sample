<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title','Sample')--入门</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/app.css">
        <!-- Styles -->

    </head>
    <body>
    @include('layouts._header')
    <div class="margin_top"></div>

        <div class="container">
            <div class="col-md-offset-1 col-md=10">

                @include('shared._messages')
                @yield('content')

            </div>
        </div>
    @include('layouts._footer')
    <script src="/js/app.js"></script>
    </body>

</html>
