<!DOCTYPE html>
<html lang="ru">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <script src="{{ asset('js/jquery.js') }}"></script>
    </head>

    <body>
        <main>

            @yield('content')

        </main>
    </body>
</html>
