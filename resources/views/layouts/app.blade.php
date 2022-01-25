<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/material-kit.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
        @livewireStyles
    </head>
    <body class="antialiased">
        @section('sidebar')
        <div>
            @yield('content')
        </div>
        @yield('script')
        {{-- <script src="{{ asset('js/material-kit.js') }}"></script> --}}
    </body>
    <footer>
        <script src="https://kit.fontawesome.com/0892879507.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/material-kit-pro.min.js') }}"></script>
        <script src="{{ asset('js/anime.min.js') }}"></script>
        <script src="{{ asset('js/core/popper.min.js') }}"></script>
        <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('js/plugins/countup.min.js') }}"></script>
        @livewireScripts
    </footer>
</html>
