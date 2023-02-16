@extends('layouts.parent')

@section('title', 'ダメかれプラン')

<head>
    <link rel="stylesheet" href="{{ asset('css/right-arrow.css') }}">
</head>

@section('header')
    @include('components.header')
@endsection

@section('main')
    <div class="container mx-auto mt-3 mb-5">
        <h2 class="mb-3">お気に入り</h2>
        <ul class="list-group">
            @foreach($items as $item)
                @csrf
                <a href="/favorite/detail?id={{ $item->id }}">
                    <li class="list-group-item">
                        <h5>{{ $item->title }}</h5>
                        <div class="d-flex flex-wrap">
                            <div>{{ $item->getStart() }}</div>
                            @if(!empty($item->place1))
                                <div class="arrow arrow-obj">{{ $item->getPlace1() }}</div>
                            @endif
                            @if(!empty($item->place2))
                                <div class="arrow arrow-obj">{{ $item->getPlace2() }}</div>
                            @endif
                            @if(!empty($item->place3))
                                <div class="arrow arrow-obj">{{ $item->getPlace3() }}</div>
                            @endif
                            @if(!empty($item->place4))
                                <div class="arrow arrow-obj">{{ $item->getPlace4() }}</div>
                            @endif
                            @if(!empty($item->place5))
                                <div class="arrow arrow-obj">{{ $item->getPlace5() }}</div>
                            @endif
                            <div class="arrow arrow-obj">{{ $item->getEnd() }}</div>
                        </div>
                    </li>
                </a>    
            @endforeach
        </ul>    
    </div>
@endsection