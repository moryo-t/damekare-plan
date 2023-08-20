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
                <div class="col-lg-4 col-6 px-1 pb-1 align-self-start">
                    <a href="/search/detail?id={{ $post->id }}" class="">
                        <div class="border-style rounded shadow-sm bg-white">
                            @if ($post->images->count() > 0)
                                <img src="{{ Storage::disk('s3')->url($post->images[0]->file_path) }}" alt="image" width="100%" class="img-style">
                                <div class="m-2">
                                    <div class="fs-5 fw-bolder">{{ $post->title }}</div>
                                    <div class="text-secondary">{{ $post->user->name }}</div>
                                </div>
                            @else
                                <img src="{{ asset('img/no_image_square.jpg')}}" alt="No image">
                            @endif
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-2">
                {{ $posts->links() }}
            </div>
        </ul>    
    </div>
@endsection

@section('script')
    <script defer src="{{ asset('js/app.js') }}"></script>
    <script defer src="{{ asset('js/screen-resize.js') }}"></script>
@endsection