<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <title>TEMEX- renovácie hrobov</title>
        <meta name="description" content="Ponúkame kompletné renovácie hrobov.">
        <meta name="keywords" content="temex, hroby, renovácia hrobov, renovacia hrobov,">
        <meta name="Distribution" content="global">
        <meta name="Rating" content="general">
        <meta name="Author" content="temex">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laravel</title>

        <!-- Fonts -->

        <script src="https://kit.fontawesome.com/f9027fd970.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
        <link rel="icon" type="images/x-icon" href="{{ asset('image/Logo.png') }}" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('css/head_footer.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/cennik.css') }}">
        <link rel="stylesheet" href="{{ asset('css/kontakt.css') }}">
        <link rel="stylesheet" href="{{ asset('css/objednavka.css') }}">
        <!-- Scripts -->

    </head>
    <body>
        @include('layouts.navigation')
        @include('layouts.header')

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
        @include('layouts.footer')
    </body>
</html>
