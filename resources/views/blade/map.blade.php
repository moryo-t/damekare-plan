@extends('layouts.map-parent')

@section('title', 'ダメかれプラン')

@section('main')
    @include('components.sidebar')
@endsection

@section('nav')
    @include('components.nav')
@endsection

<div id="map"></div>
<script src="https://maps.google.com/maps/api/js?key=[GoogleMapsAPIKey]&language=ja&libraries=places"></script>
<script src="{{ asset('js/main.js') }}" defer></script>
<script src="{{ asset('js/map.js') }}" defer></script>

