@extends('layouts.map-parent')

@section('title', 'ダメかれプラン')

@section('main')
    @include('components.sidebar')
@endsection

@section('nav')
    @include('components.nav')
@endsection

<div id="map"></div>

@section('script')
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyBpI-Gr9WenF5C3qh3PHBPZNlOYHCRdPW8&language=ja&libraries=places" defer></script>
    <script src="{{ asset('js/map.js') }}" defer></script>

    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/quit-ajax.js') }}" defer></script>
@endsection
