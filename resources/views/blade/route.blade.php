@extends('layouts.map-parent')

@section('title', 'ダメかれプラン')

@section('main')
    @include('components.sidebar-route')
@endsection

@section('nav')
    @include('components.nav')
@endsection

<div id="map"></div>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyBpI-Gr9WenF5C3qh3PHBPZNlOYHCRdPW8&language=ja&libraries=places"></script>
<script src="{{ asset('js/map-route.js') }}" defer></script>
<script src="{{ asset('js/main.js') }}" defer></script>

