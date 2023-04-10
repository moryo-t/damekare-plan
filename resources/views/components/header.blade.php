<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/right-arrow.css') }}" rel="stylesheet">
</head>

<div id="header" class="position-fixed w-100 top-0">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/main-logo.png') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @if(!Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="/map">{{ __('プランを設計') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/search">{{ __('プランを探す') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">{{ __('使い方') }}</a>
                        </li>
                    @endif
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('登録') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/map">プランを設計</a>
                                <a class="dropdown-item" href="/search">プランを探す</a>
                                <a class="dropdown-item" href="/">使い方</a>
                                <a class="dropdown-item" href="/bookmark">ブックマーク</a>
                                <a class="dropdown-item" href="/favorite">保存したプラン</a>
                                <a class="dropdown-item" href="/posts">投稿一覧</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('ログアウト') }}
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)" id="quit">退会</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
