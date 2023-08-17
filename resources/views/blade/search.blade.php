@extends('layouts.parent')

@section('title', 'ダメかれプラン')

<head>
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
</head>

@section('header')
    @include('components.header')
@endsection

@section('main')
    <div>
        <div class="container">
            <div id="form-center" class="d-flex align-items-center justify-content-center"> 
                <form action="/search/result" name="list_form" class="mb-0 w-75">
                    <div class="input-group">
                        <input type="text" class="form-control" aria-label="Text input with dropdown button" name="input_result"  id="inputResult" placeholder="都道府県や店舗名などを入力">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">都道府県</button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="dropdown-item prefectures">北海道</li>
                            <li class="dropdown-item prefectures">青森県</li>
                            <li class="dropdown-item prefectures">岩手県</li>
                            <li class="dropdown-item prefectures">宮城県</li>
                            <li class="dropdown-item prefectures">秋田県</li>
                            <li class="dropdown-item prefectures">山形県</li>
                            <li class="dropdown-item prefectures">福島県</li>
                            <li class="dropdown-item prefectures">茨城県</li>
                            <li class="dropdown-item prefectures">栃木県</li>
                            <li class="dropdown-item prefectures">群馬県</li>
                            <li class="dropdown-item prefectures">埼玉県</li>
                            <li class="dropdown-item prefectures">千葉県</li>
                            <li class="dropdown-item prefectures">東京都</li>
                            <li class="dropdown-item prefectures">神奈川県</li>
                            <li class="dropdown-item prefectures">新潟県</li>
                            <li class="dropdown-item prefectures">富山県</li>
                            <li class="dropdown-item prefectures">石川県</li>
                            <li class="dropdown-item prefectures">福井県</li>
                            <li class="dropdown-item prefectures">山梨県</li>
                            <li class="dropdown-item prefectures">長野県</li>
                            <li class="dropdown-item prefectures">岐阜県</li>
                            <li class="dropdown-item prefectures">静岡県</li>
                            <li class="dropdown-item prefectures">愛知県</li>
                            <li class="dropdown-item prefectures">三重県</li>
                            <li class="dropdown-item prefectures">滋賀県</li>
                            <li class="dropdown-item prefectures">京都府</li>
                            <li class="dropdown-item prefectures">大阪府</li>
                            <li class="dropdown-item prefectures">兵庫県</li>
                            <li class="dropdown-item prefectures">奈良県</li>
                            <li class="dropdown-item prefectures">和歌山県</li>
                            <li class="dropdown-item prefectures">鳥取県</li>
                            <li class="dropdown-item prefectures">島根県</li>
                            <li class="dropdown-item prefectures">岡山県</li>
                            <li class="dropdown-item prefectures">広島県</li>
                            <li class="dropdown-item prefectures">山口県</li>
                            <li class="dropdown-item prefectures">徳島県</li>
                            <li class="dropdown-item prefectures">香川県</li>
                            <li class="dropdown-item prefectures">愛媛県</li>
                            <li class="dropdown-item prefectures">高知県</li>
                            <li class="dropdown-item prefectures">福岡県</li>
                            <li class="dropdown-item prefectures">佐賀県</li>
                            <li class="dropdown-item prefectures">長崎県</li>
                            <li class="dropdown-item prefectures">熊本県</li>
                            <li class="dropdown-item prefectures">大分県</li>
                            <li class="dropdown-item prefectures">宮崎県</li>
                            <li class="dropdown-item prefectures">鹿児島県</li>
                            <li class="dropdown-item prefectures">沖縄県</li>
                        </ul>
                    </div>
                </form>    
            </div>    
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/prefectures.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

