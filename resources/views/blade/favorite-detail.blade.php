@extends('layouts.parent')

@section('title', 'ダメかれプラン')

<head>
    <link rel="stylesheet" href="{{ asset('css/bottom-arrow.css') }}">
    <link rel="stylesheet" href="{{ asset('css/send-button.css') }}">
    <link rel="stylesheet" href="{{ asset('css/map-search.css') }}">
</head>

@section('header')
    @include('components.header')
@endsection

@section('main')
    <div class="container my-4">
        @foreach ($items as $item) 
            <div class="d-flex justify-content-between flex-wrap align-items-center mb-3">
                <div class="d-flex mb-2">
                    <h4 class="mb-0" id="title">{{ $item->title }}</h4>
                    <div class="ms-2">
                        <a href="javascript:void(0)" id="edit-title-favorite"><img src="{{ asset('img/edit_name.png') }}" alt="" width="20"></a>
                    </div>
                </div>
                <div class="d-flex">
                    <div>
                        <form action="/favorite/{{ $item->id }}/post" id="favorite_post">
                            @csrf
                            <button type="button" class="btn btn-outline-primary btn-sm" id="post_button">プランを投稿</button>
                        </form>    
                    </div>
                    <div class="ms-2">
                        <form action="/favorite/destroy/{{ $item->id }}" id="favorite_remove">
                            @csrf
                            <button type="button" class="btn btn-danger btn-sm" id="remove_button">保存を削除</button>
                        </form>
                    </div>
                </div>
            </div>
            <div>
                <div>始発場所</div>
                <div class="border rounded p-3 set-start">{{ $item->start }}</div>
                <div class="w-100 text-center my-2">
                    <div class="triangle-bottom"></div>
                </div>
                @if(!empty($item->place1))
                    <div>場所1</div>
                    <div class="border rounded p-3">{{ $item->place1 }}</div>
                    <div class="w-100 text-center my-2">
                        <div class="triangle-bottom"></div>
                    </div>
                @endif
                @if(!empty($item->place2))
                    <div>場所2</div>
                    <div class="border rounded p-3">{{ $item->place2 }}</div>
                    <div class="w-100 text-center my-2">
                        <div class="triangle-bottom"></div>
                    </div>
                @endif
                @if(!empty($item->place3))
                    <div>場所3</div>
                    <div class="border rounded p-3">{{ $item->place3 }}</div>
                    <div class="w-100 text-center my-2">
                        <div class="triangle-bottom"></div>
                    </div>
                @endif
                @if(!empty($item->place4))
                    <div>場所4</div>
                    <div class="border rounded p-3">{{ $item->place4 }}</div>
                    <div class="w-100 text-center my-2">
                        <div class="triangle-bottom"></div>
                    </div>
                @endif
                @if(!empty($item->place5))
                    <div>場所5</div>
                    <div class="border rounded p-3">{{ $item->place5 }}</div>
                    <div class="w-100 text-center my-2">
                        <div class="triangle-bottom"></div>
                    </div>
                @endif
                <div>終着場所</div>
                <div class="border rounded p-3 set-end">{{ $item->end }}</div>
            </div>
        @endforeach

        <div class="my-5">
            <div id="map"></div>
            <div id="duration" class="fw-bold mt-1 d-inline-block"></div>
        </div>

    </div>
@endsection

@section('script')
    <script src="{{ asset('js/map-search.js') }}" defer></script>
    <script defer src="https://maps.google.com/maps/api/js?key=AIzaSyBpI-Gr9WenF5C3qh3PHBPZNlOYHCRdPW8&language=ja&libraries=places&callback=initMap"></script>

    @foreach ($items as $item) 
        @if (Auth::id() == $item->user_id)
            <script src="{{ asset('js/edit-title.js') }}" defer></script>
        @endif
    @endforeach
    <script src="{{ asset('js/app.js')}}"></script>
    <script src="{{ asset('js/favorite-remove.js') }}" defer></script>
    <script src="{{ asset('js/favorite-ajax.js') }}" defer></script>
@endsection
