@extends('layouts.parent')

@section('title', 'ダメかれプラン')

<head>
    <link rel="stylesheet" href="{{ asset('css/bottom-arrow.css') }}">
</head>

@section('header')
    @include('components.header')
@endsection

@section('main')
    <div class="container my-5">
        @foreach ($items as $item) 
            <div class="d-flex justify-content-between flex-wrap">
                <h4>{{ $item->title }}</h4>
                <form action="/favorite/destroy/{{ $item->id }}" id="favorite_remove">
                    @csrf
                    <button type="button" class="btn btn-danger" id="remove_button">お気に入り解除</button>
                </form>
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

            <div class="text-end mt-2" id="route_show">
                <a href="/favorite/{{ $item->id }}/route">
                    <div class="d-inline">このプランのルート</div>
                </a>
            </div>    
        @endforeach
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/remove-favorite.js') }}" defer></script>
@endsection
