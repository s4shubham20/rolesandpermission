<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/back/images/favicon.svg') }}" type="image/x-icon" />

    <!-- font css -->
    <link rel="stylesheet" href="{{ asset('assets/back/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/fonts/material.css') }}">

    <!-- vendor css -->
    <link rel="stylesheet" href="#" id="rtl-style-link">
    <link rel="stylesheet" href="{{ asset('assets/back/css/style.css') }}" id="main-style-link">
</head>
<body class="theme-1">
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('assets/back/js/vendor-all.js') }}"></script>
    <script src="{{ asset('assets/back/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/back/js/plugins/feather.min.js') }}"></script>
</body>
</html>
