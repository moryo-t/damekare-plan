@extends('layouts.parent')

@section('title', 'ダメかれプラン')

<head>
    <link rel="stylesheet" href="{{ asset('css/right-arrow.css') }}">
</head>

@section('header')
    @include('components.header')
@endsection

@section('main')
    <div class="container mt-3 mb-5">
        <h2 class="mb-3">「{{ $input }}」で検索した結果</h2>
        @if(!isset($posts[0]))
            <div class="position-absolute top-50 start-50 none-search">
                <div class="text-secondary">
                    <div>検索結果なし。</div>
                    <div>空文字でフォームを送信すると全都道府県のプランが閲覧できます。</div>
                    <div class="text-end"><a href="/search">戻る</a></div>    
                </div>    
            </div>
        @endif
        
        <div class="row">
            @foreach ($posts as $post)
                @csrf
                <div class="col-4 post-block-style">
                    <div class="border-style rounded shadow-sm bg-white">
                        @foreach ($post->images as $image)
                            <img src="{{ Storage::disk('s3')->url($image->file_path) }}" alt="" width="100%">
                            aaaa
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        
        <ul class="list-group">
            @foreach($posts as $post)
                @csrf
                <a href="/search/detail?id={{ $post->id }}">
                    <li class="list-group-item">
                        <h5>{{ $post->title }}</h5>
                        <div class="d-flex flex-wrap">
                            <div>{{ $post->getStart() }}</div>
                            @if(!empty($post->place1))
                                <div class="arrow arrow-obj">{{ $post->getPlace1() }}</div>
                            @endif
                            @if(!empty($post->place2))
                                <div class="arrow arrow-obj">{{ $post->getPlace2() }}</div>
                            @endif
                            @if(!empty($post->place3))
                                <div class="arrow arrow-obj">{{ $post->getPlace3() }}</div>
                            @endif
                            @if(!empty($post->place4))
                                <div class="arrow arrow-obj">{{ $post->getPlace4() }}</div>
                            @endif
                            @if(!empty($post->place5))
                                <div class="arrow arrow-obj">{{ $post->getPlace5() }}</div>
                            @endif
                            <div class="arrow arrow-obj">{{ $post->getEnd() }}</div>
                        </div>
                    </li>
                </a>
            @endforeach
            <div class="mt-2">
                {{ $posts->links() }}
            </div>
        </ul>    
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection