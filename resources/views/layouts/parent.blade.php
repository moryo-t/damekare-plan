<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/main-logo_favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/main-logo_favicon.ico') }}">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/destyle.css@3.0.2/destyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    @yield('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <header>
        @yield('header')
    </header>
    <main>
        @yield('main')
    </main>
    @yield('script')
    <script src="{{ asset('js/quit-ajax.js') }}" defer></script>
</body>
</html>