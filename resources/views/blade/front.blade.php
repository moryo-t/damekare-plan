@extends('layouts.parent')

@section('title', 'ダメかれプラン')

@section('header')
    @include('components.header')
@endsection

@section('main')
    <div class="container-fluid px-0">
        <img src="{{ asset('img/untidymen.jpg') }}" alt="" class="img-fluid">
        <div class="text-center py-5 purpose my-5 px-sm-0 px-3">
            <h3>デートプランの立て方が分からないダメンズ集合！！</h3>
            <div>ダメ彼氏・ダメンズに送るデート作成を目的としたサイトです。</div>
        </div>
    </div>
    <div class="container container-fluid-md">
        <div class="row d-flex justify-content-between px-3 px-md-0">
            <div class="col-12 col-md-3 border rounded p-3 mb-md-0 mb-3">
                <h3 class="mb-3">プラン設計</h3>
                <div class="mb-3">
                    <a href="/map"><img src="{{ asset('img/undraw_by_the_road_re_vvs7.svg') }}" alt="" width="100%"></a>
                </div>
                <div>Google Maps API を利用してプランの設計ができます。</div>
            </div>

            <div class="col-12 col-md-3 border rounded p-3 mb-md-0 mb-3">
                <h3 class="mb-3">プラン検索</h3>
                <div class="mb-3">
                    <a href="/search"><img src="{{ asset('img/undraw_search_re_x5gq.svg') }}" alt="" width="100%"></a>
                </div>
                <div>他ユーザーが投稿したプランを閲覧することができます。</div>
            </div>

            <div class="col-12 col-md-3 border rounded p-3 mb-md-0 mb-3">
                <h3 class="mb-3">ブックマーク・お気に入り機能</h3>
                <div class="mb-3">
                    <img src="{{ asset('img/undraw_post_re_mtr4.svg') }}" alt="" width="100%">
                </div>
                <div>
                    他ユーザーが投稿したプランのブックマーク・設計したプランのお気に入り登録ができます。
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div>※ブックマーク・お気に入り機能を使用するには、「<a href="/register">登録</a>」する必要があります。</div>
    </div>
    <div class="containre-fluid">
        <h3 class="text-center py-5 lecture my-5">ダメかれプランの使い方</h3>
    </div>
    <div class="container mb-5 usage">
        <div class="mb-4">
            <h4>プラン設計</h4>
            <div>「<a href="/map">プラン設計</a>」から「始発場所」と「終着場所」を入力する。他の「場所1」「場所2」「場所3」「場所4」「場所5」は「始発場所」から「終着場所」までに行きたい場所がある場合に入力する。<br>※初めに入力した住所から半径10km以内の場所を優先的に候補として出力します。またデフォルトでは、車でのルート案内になっています。</div>    
        </div>
        <div class="mb-4">
            <h4>オキニ登録・プラン投稿</h4>
            <div>プラン設計が完了いたしましたら、「オキニ登録」または「プラン投稿」から作成したプランをお気に入り登録及び、プランの投稿することができます。</div>    
        </div>
        <div class="mb-4">
            <h4>プラン検索</h4>
            <div>「<a href="/search">プラン検索</a>」の入力欄にプラン検索したいエリアを入力すると、他ユーザーが投稿したプランを物色することができます。</div>
        </div>
    </div>
@endsection
