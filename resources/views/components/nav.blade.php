<ul class="list-unstyled p-3">
    <li class="mb-1"><a class="mb-1 dropdown-item" href="/map">プランを設計</a></li>
    <li class="mb-1"><a class="mb-1 dropdown-item" href="/search">プランを探す</a></li>
    <li class="mb-1"><a class="mb-1 dropdown-item" href="/">使い方</a></li>
    @if(Auth::check())
        <li class="mb-1"><a class="mb-1 dropdown-item" href="/bookmark">ブックマーク</a></li>
        <li class="mb-1"><a class="mb-1 dropdown-item" href="/favorite">保存したプラン</a></li>
        <li class="mb-1"><a class="mb-1 dropdown-item" href="/posts">投稿を一覧</a></li>
    @endif
    @if(Auth::check())
        <li class="mb-1">
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('ログアウト') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
        <li class="mb-1"><a class="mb-1 dropdown-item" href="javascript:void(0)" id="quit">退会</a></li>
    @else
        <li>
            <a class="dropdown-item" href="/login">ログイン</a>
        </li>
    @endif
</ul>
