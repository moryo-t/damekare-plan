@extends('layouts.parent')

@section('title', 'ダメかれプラン')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/map-create.css') }}">
    <link rel="stylesheet" href="{{ asset('css/map-search.css') }}">
@endsection

@section('header')
    @include('components.header')
@endsection

@section('main')
    <div class="container-fluid mt-4">
        <div id="x-scroll">
            <div class="x-item d-inline-block border border-secondary rounded mx-2">
                <a href="javascript:imgBlockClick(0)" class="img-preview w-100 h-100 d-inline-block position-relative">
                    <input type="file" accept="image/*">
                    <div class="dli-plus-wrap">
                        <span class="dli-plus"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div id="modal-content">
        <div class="d-flex flex-column w-50">
            <div id="modal-img"></div>
            <div id="modal-btn" class="d-flex justify-content-end mt-3">
                <div>
                    <button type="button" id="changeImage" class="btn btn-dark me-2">画像を変更</button>
                </div>
                <div>
                    <button type="button" id="removeImage" class="btn btn-danger">削除</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="py-5">
            <input name="title" type="text" class="title_input arrange-input w-100 body-data" placeholder="魅力的なタイトルを入力しよう" maxlength="40">
            <textarea name="body" class="body_input arrange-input w-100 body-data" placeholder="クリックして本文を入力"></textarea>
        </div>

        <div class="my-5">
            <div id="map"></div>
            <div id="x-scroll-maps" class="mt-3">
                @foreach ($mapsData as $mapData)
                    @if ($mapData['pinName'] === 'E')
                        @php
                            $endData = $mapData;
                        @endphp

                        @continue
                    @endif

                    <div class="x-item-map d-inline-block border border-secondary rounded mx-2 p-2">
                        @if ($mapData['pinName'] === 'S')
                            <h5>始発場所</h5>
                        @endif
                        @if ($mapData['pinName'] === '1')
                            <h5>場所1</h5>
                        @endif
                        @if ($mapData['pinName'] === '2')
                            <h5>場所2</h5>
                        @endif
                        @if ($mapData['pinName'] === '3')
                            <h5>場所3</h5>
                        @endif
                        @if ($mapData['pinName'] === '4')
                            <h5>場所4</h5>
                        @endif
                        @if ($mapData['pinName'] === '5')
                            <h5>場所5</h5>
                        @endif

                        <div class="fw-bold">{{ $mapData['name'] }}</div>
                        <div class="mt-2">営業時間</div>
                        @if (!isset($mapData['openingHours']))
                            <div class="my-2">
                                <span class="fw-bold border-bottom border-secondary">情報が見つかりませんでした。</span>
                            </div>
                        @else
                            @foreach ($mapData['openingHours'] as $mapHours)
                                <div>
                                    {{ $mapHours }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                @endforeach

                <div class="x-item-map d-inline-block border border-secondary rounded mx-2 p-2">
                    <h5>終着場所</h5>
                    <div class="fw-bold">{{ $endData['name'] }}</div>
                    <div class="mt-2">営業時間</div>
                    @if (!isset($endData['openingHours']))
                        <div class="my-2">
                            <span class="fw-bold border-bottom border-secondary">情報が見つかりませんでした。</span>
                        </div>
                    @else
                        @foreach ($endData['openingHours'] as $mapHours)
                            <div>
                                {{ $mapHours }}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div id="duration" class="fw-bold mt-3 d-inline-block"></div>
        </div>

        <div class="py-5">
            <label class="w-100">
                <div class="d-flex">
                    <div class="me-2">予算</div>
                    <div id="price" class="fw-bold"></div>
                </div>
                <input type="range" name="price" value="0" min="0" max="24" class="w-100 gauge-slider body-data">
            </label>
        </div>

        <div class="pb-5 text-center">
            <button type="button" id="postCreateButton" class="btn btn-primary fs-6 py-3">投稿する</button>
        </div>
    </div>

    <div id="mapsDataContainer" data-maps-array="{{ json_encode($mapsData) }}"></div>
    <div id="mapsSettingContainer" data-maps-array="{{ json_encode($mapSetting) }}"></div>
@endsection

@section('script')
    <script defer src="{{ asset('js/map-create.js') }}"></script>
    <script defer src="https://maps.google.com/maps/api/js?key=AIzaSyBpI-Gr9WenF5C3qh3PHBPZNlOYHCRdPW8&language=ja&libraries=places&callback=initMap"></script>

    <script defer src="{{ asset('js/map-create-style.js') }}"></script>
    <script defer src="{{ asset('js/map-create-post.js')}}"></script>
    <script defer src="{{ asset('js/text-area.js') }}"></script>
    <script defer src="{{ asset('js/range-slider.js') }}"></script>
    <script defer src="{{ asset('js/app.js') }}"></script>
@endsection