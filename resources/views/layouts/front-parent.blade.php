<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/main-logo_favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/main-logo_favicon.ico') }}">
    <title>@yield("title")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/destyle.css@3.0.2/destyle.css">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('css/slide.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/front.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/page-loaded.css') }}" rel="stylesheet">
    <script src="{{ asset('js/plugin/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('js/plugin/progressbar.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js" defer></script>
    <script src="{{ asset('js/page-loaded.js') }}"></script>
</head>
<body>
    <div id="app">
        @yield('progress')

        <header>
            @yield('header')
        </header>
        <main>
            @yield('main')
        </main>    
    </div>

    @yield('script')
</body>
</html>