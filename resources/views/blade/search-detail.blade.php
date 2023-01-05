@extends('layouts.parent')

@section('title', 'ダメかれプラン')

<head>
    <link rel="stylesheet" href="{{ asset('css/bottom-arrow.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

@section('header')
    @include('components.header')
@endsection

@section('main')
    <div class="container my-5">
        @foreach ($items as $item) 
            <div>
                <h4>{{ $item->title }}</h4>
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

            <div class="d-flex justify-content-between mt-2" id="route_show">
                <div>
                    <span>{{ $item->user->name }}</span> さんが投稿したプラン
                </div>
                <div>
                    <a href="/search/{{ $item->id }}/route">
                        <div class="d-inline">このプランのルート</div>
                    </a>    
                </div>
            </div>

            <div class="my-5">
                <h4>質問</h4>
                <div id="chat" class="border rounded p-3">
                    <ul class="list-unstyled" id="bottom_scroll">
                        @auth
                            @foreach ($item->chats as $chat)
                                @if (Auth::id() === $chat->user_id)
                                    <li class="d-flex justify-content-end">
                                        <div class="d-flex flex-column w-75">
                                            <div class="d-inline-block text-end">{{ $chat->timeStamp() }} {{ $chat->user->name }}</div>
                                            <div class="d-flex justify-content-end">
                                                <div class="d-inline-block border rounded p-2 myself">{{ $chat->message }}</div>    
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li class="d-flex">
                                        <div class="d-flex flex-column w-75">
                                            <div class="d-inline-block">{{ $chat->timeStamp() }} {{ $chat->user->name }}</div>
                                            <div>
                                                <div class="d-inline-block border rounded p-2 partner me-0">{{ $chat->message }}</div>    
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        @endauth

                        @guest
                            @foreach ($item->chats as $chat)
                                <li class="d-flex mb-3">
                                    <div class="d-flex flex-column">
                                        <div class="d-inline-block">{{ $chat->timeStamp() }} {{ $chat->user->name }}</div>
                                        <div>
                                            <div class="d-inline-block border rounded p-2 partner">{{ $chat->message }}</div>    
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endguest
                    </ul>    
                </div>

                <form id="message_send" class="mb-0" onsubmit="return false;">
                    @csrf
                    <div class="d-flex pt-3">
                        @auth
                            <input type="text" name="message" class="form-control" placeholder="メッセージを入力" id="text_input">
                            <button type="button" class="btn btn-primary ms-2" id="message_submit">送信</button>    
                        @endauth
                        @guest
                            <input type="text" name="message" class="form-control" placeholder="チャット機能を使用するにはログインする必要があります。" disabled="disabled">
                            <button type="submit" class="btn btn-primary ms-2" disabled>送信</button>    
                        @endguest
                    </div>
                </form>
                @error ('message')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

        @endforeach
    </div>

@endsection

@section('script')
    <script src="{{ asset('js/chat.js') }}" defer></script>
    <script src="{{ asset('js/chat-ajax.js') }}" defer></script>
@endsection