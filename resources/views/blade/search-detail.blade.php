@extends('layouts.parent')

@section('title', 'ダメかれプラン')

<head>
    <link rel="stylesheet" href="{{ asset('css/bottom-arrow.css') }}">
    <link rel="stylesheet" href="{{ asset('css/map-search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/send-button.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
/>
</head>

@section('header')
    @include('components.header')
@endsection

@section('main')
    <div class="container-xxl container-fluid px-lg-auto px-0">
        @foreach ($items as $item)
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($item->images as $image)
                        <div class="swiper-slide text-center d-flex justify-content-center align-items-center">
                            <img src="{{ Storage::disk('s3')->url($image->file_path) }}" alt="" width="100%" height="100%">
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        @endforeach
    </div>

    <div class="container my-4">
        @foreach ($items as $item)
            <div class="d-flex my-2" id="route_show">
                <div>
                    @if (!$item->user)
                        <span class="fw-bold">退会済みユーザー</span>
                    @else
                        <span>{{ $item->user->name }}</span> さんが投稿したプラン
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-between flex-wrap align-items-center">
                <div class="d-flex mb-2">
                    <div class="fs-4 fw-bolder mb-0" id="title">{{ $item->title }}</div>
                    @if (Auth::id() == $item->user_id)
                        <div class="ms-2">
                            <a href="javascript:void(0)" id="edit-title-search"><img src="{{ asset('img/edit_name.png') }}" alt="" width="20"></a>
                        </div>
                    @endif
                </div>
                <div class="d-flex">
                    @if (Auth::check())
                        <div>
                            @if (!Auth::user()->bookmark($item->id))
                                <form action="/bookmark">
                                    @csrf
                                    <button type="button" class="btn btn-outline-dark btn-sm" id="bookmark_button">ブックマーク</button>
                                </form>
                            @else
                                <form>
                                    @csrf
                                    <button type="button" class="btn btn-outline-dark btn-sm bookmark_on" id="bookmark_button">ブックマーク済み</button>
                                </form>
                            @endif        
                        </div>
                    @endif

                    @if (Auth::id() == $item->user_id)
                        <div class="ms-2">
                            <form action="/search/destroy/{{ $item->id }}" id="remove-post" method="POST">
                                @csrf
                                <button type="button" class="btn btn-danger btn-sm" id="remove-button">投稿を削除</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-3">
                {{ $item->body }}
            </div>
            
            <!--<div>
                <div>始発場所</div>
                <div class="border rounded p-3 set-start">
                    <div class="text-decoration-underline fw-bold">{{ $item->start }}</div>
                    <div class="mt-2">営業時間</div>
                    <div>理由としてはおしけない</div>
    
                </div>
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
        -->


            <div class="mt-5">
                <div id="map"></div>
                <div id="duration" class="fw-bold mt-1 d-inline-block"></div>
            </div>

            <div class="my-5">
                <h4>コメント</h4>
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
                                            @if (!$chat->user)
                                                <div class="d-inline-block">{{ $chat->timeStamp() }} <span class="purple">退会済みユーザー</span></div>
                                            @else
                                                <div class="d-inline-block">{{ $chat->timeStamp() }} {{ $chat->user->name }}</div>
                                            @endif
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
                                        @if(!$chat->user)
                                            <div class="d-inline-block">{{ $chat->timeStamp() }} 退会済みユーザー</div>
                                        @else
                                            <div class="d-inline-block">{{ $chat->timeStamp() }} {{ $chat->user->name }}</div>
                                        @endif
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
    <!--<script defer src="{{ asset('js/map-search.js') }}"></script>-->
    <script defer src="https://maps.google.com/maps/api/js?key=AIzaSyBpI-Gr9WenF5C3qh3PHBPZNlOYHCRdPW8&language=ja&libraries=places&callback=initMap"></script>
    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const searchParams = new URLSearchParams(window.location.search);
        const queryPost = searchParams.get('id');
        fetch ('/map-data/' + queryPost, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            }
        })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            initMap(data['map-data']);
        })

        function initMap(mapData) {
            const directionsService = new google.maps.DirectionsService();
            const directionsRenderer = new google.maps.DirectionsRenderer({
                suppressMarkers: true,
            });

            var infoWindow = new google.maps.InfoWindow();
            var geocoder = new google.maps.Geocoder();
            var map = new google.maps.Map(document.getElementById('map'));


            var allPlaces = [];

            const mapsData = window.mapData;
            const mapDataParsed = JSON.parse(mapsData);
            const dataShaping = mapDataParsed[0];
            const mapDataKeep = ["start", "end", "place1", "place2", "place3", "place4", "place5"];


            function geocodeAddress(address) {
                return new Promise((resolve, reject) => {
                    geocoder.geocode({address: address}, function(result, status) {
                        if (status == 'OK') {
                            resolve(result[0].geometry.location);
                        } else {
                            reject(new Error("ジオコーディングに失敗しました。"));
                        }
                    })
                })
            }

            async function processPlaces() {
                for (let key in dataShaping) {
                    if (mapDataKeep.includes(key) && dataShaping[key] !== null) {
                        try {
                            const latLng = await geocodeAddress(dataShaping[key]);
                            let name;

                            switch (key) {
                                case "start":
                                    name = "S";
                                    break;
                                case "end":
                                    name = "E";
                                    break;
                                case "place1":
                                    name = "1";
                                    break;
                                case "place2":
                                    name = "2";
                                    break;
                                case "place3":
                                    name = "3";
                                    break;
                                case "place4":
                                    name = "4";
                                    break;
                                case "place5":
                                    name = "5";
                                    break;
                            }

                            allPlaces.push({
                                name: name,
                                location: dataShaping[key],
                                latLng: latLng,
                            });
                        } catch (e) {
                        }
                    }
                }
            }

            async function main() {
                await processPlaces();

                var request = {
                    travelMode: 'DRIVING',
                }

                var waypointsArr = [];
                for (let obj of allPlaces) {
                    if (obj.name == "S") {
                        request.origin = obj.location;
                    }
                    if (obj.name == "E") {
                        request.destination = obj.location;
                    }
                    if (obj.name !== "S" && obj.name !== "E") {
                        waypointsArr.push({
                            location: obj.location,
                            stopover: true,
                        });
                    }
                }

                request.waypoints = waypointsArr;

                directionsService.route(request, function(response, status) {
                    if (status == 'OK') {
                        directionsRenderer.setDirections(response);
                        const durationRes = response.routes[0].legs;

                        let durationSum = 0;
                        for (obj of durationRes) {
                            let durationTime = obj.duration.value;
                            durationSum += durationTime;
                        }

                        const durationHours = Math.floor(durationSum / 3600);
                        const durationMin = Math.floor((durationSum % 3600) / 60);

                        const eleDuration = document.getElementById("duration");
                        if (durationHours >= 1) {
                            let durationFormatted = `${durationHours}時間 ${durationMin}分`;
                            eleDuration.textContent = "移動時間 " + durationFormatted;
                        } else {
                            let durationFormatted = `${durationMin}分`;
                            eleDuration.textContent = "移動時間 " + durationFormatted;
                        }

                        for (obj of allPlaces) {
                            addMarker(obj.latLng, obj.name, map, infoWindow, obj.location);
                        }
                    }
                });

                function addMarker(location, label, map, info, content) {
                    var marker = new google.maps.Marker({
                        position: location,
                        label: label,
                        map: map,
                    });
            
                    marker.addListener('click', function() {
                        info.setContent(content);
                        info.open(map, this);
                    }, {passive: true});

                    directionsRenderer.setMap(map);
                }
            }

            main();
        }
    </script>

    @foreach ($items as $item) 
        @if (Auth::id() == $item->user_id)
            <script src="{{ asset('js/post-remove.js') }}" defer></script>
            <script src="{{ asset('js/edit-title.js') }}" defer></script>
        @endif
    @endforeach
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bookmark-ajax.js') }}" defer></script>
    <script src="{{ asset('js/chat.js') }}" defer></script>
    <script src="{{ asset('js/chat-ajax.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script defer src="{{ asset('js/swiper.js') }}"></script>
@endsection