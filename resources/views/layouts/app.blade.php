<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <div id="app">

        <topo titulo="{{ config('app.name', 'Laravel') }}" url="{{ url('/') }}"></topo>

        <main class="py-4">
            @yield('content')
        </main>

    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
