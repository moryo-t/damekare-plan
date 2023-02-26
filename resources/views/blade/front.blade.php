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
                <h3 class="mb-3">プランを設計</h3>
                <div class="mb-3">
                    <a href="/map"><img src="{{ asset('img/undraw_by_the_road_re_vvs7.svg') }}" alt="" width="100%"></a>
                </div>
                <div>Google Mapを利用したプランの作成</div>
            </div>

            <div class="col-12 col-md-3 border rounded p-3 mb-md-0 mb-3">
                <h3 class="mb-3">プランを保存</h3>
                <div class="mb-3">
                    <a href="/map"><img src="{{ asset('img/undraw_by_the_road_re_vvs7.svg') }}" alt="" width="100%"></a>
                </div>
                <div>「<a href="/map">プランを設計</a>」で作成したプラン内容の保存</div>
            </div>

            <div class="col-12 col-md-3 border rounded p-3 mb-md-0 mb-3">
                <h3 class="mb-3">プランを投稿</h3>
                <div class="mb-3">
                    <a href="/map"><img src="{{ asset('img/undraw_search_re_x5gq.svg') }}" alt="" width="100%"></a>
                </div>
                <div>「<a href="/map">プランを設計</a>」で作成したプラン内容の投稿</div>
                <div>※投稿を行うと「<a href="/search">プランを探す</a>」にてプランの検索ができるようになります</div>
            </div>
        </div>

        <div class="row d-flex justify-content-between px-3 px-md-0 mt-4">
            <div class="col-12 col-md-3 border rounded p-3 mb-md-0 mb-3">
                <h3 class="mb-3">プランを探す</h3>
                <div class="mb-3">
                    <a href="/search"><img src="{{ asset('img/undraw_search_re_x5gq.svg') }}" alt="" width="100%"></a>
                </div>
                <div>フォームに都道府県や店名などを入力すると「<a href="/map">プランを投稿</a>」で投稿されたプランのルートおよびタイトルが検索され、表示される</div>
            </div>

            <div class="col-12 col-md-3 border rounded p-3 mb-md-0 mb-3">
                <h3 class="mb-3">ブックマーク</h3>
                <div class="mb-3">
                    <a href="/bookmark"><img src="{{ asset('img/undraw_post_re_mtr4.svg') }}" alt="" width="100%"></a>
                </div>
                <div>
                    「<a href="/search">プランを探す</a>」にて気に入る投稿をブックマークすることができます
                </div>
            </div>

            <div class="col-12 col-md-3 border rounded p-3 mb-md-0 mb-3">
                <h3 class="mb-3">保存したプラン</h3>
                <div class="mb-3">
                    <a href="/favorite"><img src="{{ asset('img/undraw_post_re_mtr4.svg') }}" alt="" width="100%"></a>
                </div>
                <div>
                    プランの作成後「<a href="/map">プランを保存</a>」を行なったプラン内容が表示されます
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-between px-3 px-md-0 mt-4">
            <div class="col-12 col-md-3 border rounded p-3 mb-md-0 mb-3">
                <h3 class="mb-3">投稿を一覧</h3>
                <div class="mb-3">
                    <a href="posts"><img src="{{ asset('img/undraw_post_re_mtr4.svg') }}" alt="" width="100%"></a>
                </div>
                <div>
                    プランの作成後「<a href="map">プランを投稿</a>」を行なったプラン内容が表示されます
                </div>
            </div>
        </div>


    </div>
    <div class="container mt-3">
        @guest
            <div>
                ※プラン保存・プラン投稿・ブックマーク機能を使用するには、「<a href="/register">登録</a>」または「<a href="login">ログイン</a>」する必要があります。
            </div>
        @endguest
    </div>
    <div class="containre-fluid">
        <h3 class="text-center py-5 lecture my-5">ダメかれプランの使い方</h3>
    </div>
    <div class="container mb-5 usage">
        <div class="row">
            <h3><span>プラン設計の手順</span></h3>
            <div class="mb-2">
                <h4>Step1</h4>
                <div>「<a href="/map">プランを設計</a>」から「始発場所」と「終着場所」を入力する。他の「場所1」「場所2」「場所3」「場所4」「場所5」は「始発場所」から「終着場所」までに行きたい場所があれば入力する。</div> 
                <div>
                    ※初めに入力した住所から半径10km以内の場所を優先的にルートの候補として出力します。またデフォルトでは、車でのルート案内になっています。
                </div>
            </div>
            <div class="mb-2">
                <h4>Step2</h4>
                <div>プランの設計が完了したら「プランの保存」および「プランの投稿」をクリックしプラン内容の保存または投稿を行う。</div>    
            </div>
            <div class="mb-2">
                <h4>Step3（プランの保存）</h4>
                <div>右上のハンバーガーメニューおよびユーザーネームをクリックし「<a href="favorite">保存したプラン</a>」を選択すると、設計したプランが表示される。</div>
            </div>
            <div class="mb-2">
                <h4>Step3（プランの投稿）</h4>
                <div>右上のハンバーガーメニューおよびユーザーネームをクリックし「<a href="posts">投稿を一覧</a>」を選択すると、投稿したプランが表示される。</div>
            </div>    
        </div>

        <div class="row mt-5">
            <h3><span>プランを探す</span></h3>
            <div class="mb-2">
                <h4>Step1</h4>
                <div>ハンバーガーメニューおよび右上のユーザーネームをクリックし「<a href="search">プランを探す</a>」を選択する。</div>    
            </div>
            <div class="mb-2">
                <h4>Step2</h4>
                <div>フォームに都道府県や店舗名などを入力する。</div>
            </div>
            <div class="mb-2">
                <h4>Step3</h4>
                <div>気になったプランを選択するとプランの詳細が表示される。</div>
            </div>
        </div>

        <div class="row mt-5">
            <h3><span>プラン詳細の操作方法</span></h3>
            <div class="mt-2">
                <h4 class="split_title pb-1"><span>プランのブックマーク</span></h4>
                <div class="mb-2">
                    <h4>Step1</h4>
                    <div>プラン詳細ページ右上に設置されている「<a href="bookmark">ブックマーク</a>」ボタンを選択する。</div>    
                </div>
                <div class="mb-2">
                    <h4>Step2</h4>
                    <div>「OK」を選択。</div>
                </div>
                <div class="mb-2">
                    <h4>Step3</h4>
                    <div>ハンバーガーメニューおよび右上のユーザーネームをクリックし「<a href="bookmark">ブックマーク</a>」を選択すると、ブックマークした投稿プランが表示される。</div>
                </div>    
            </div>

            <div class="mt-4">
                <h4 class="split_title pb-1"><span>プラン名（タイトル）の変更</span></h4>
                <div class="mb-2">
                    <h4>Step1</h4>
                    <div>プラン名（タイトル）右のアイコンを選択する。</div>    
                </div>
                <div class="mb-2">
                    <h4>Step2</h4>
                    <div>変更したいプラン名（タイトル）を入力し、「OK」を選択する。</div>
                </div>
            </div>

            <div class="mt-4">
                <h4 class="split_title pb-1"><span>投稿プランの削除</span></h4>
                <div class="mb-2">
                    <h4>Step1</h4>
                    <div>プラン詳細ページ右上に設置されている「投稿を削除」ボタンを選択する。</div>    
                </div>
                <div class="mb-2">
                    <h4>Step2</h4>
                    <div>「OK」を選択。</div>
                </div>
            </div>

            <div class="mt-4">
                <h4 class="split_title pb-1"><span>質問をする</span></h4>
                <div class="mb-2">
                    <h4>Step1</h4>
                    <div>プラン詳細ページの質問までスクロールする。</div>    
                </div>
                <div class="mb-2">
                    <h4>Step2</h4>
                    <div>フォームに質問したい内容を入力する。</div>
                </div>
                <div class="mb-2">
                    <h4>Step3</h4>
                    <div>「送信」ボタンを選択。</div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <h3><span>ログアウト</span></h3>
            <div class="mb-2">
                <div>ハンバーガーメニューおよび右上のユーザーネームをクリックし「ログアウト」を選択する。</div>
            </div>
        </div>

        <div class="row mt-5">
            <h3><span>退会</span></h3>
            <div class="mb-2">
                <h4>Step1</h4>
                <div>ハンバーガーメニューおよび右上のユーザーネームをクリックし「退会」を選択する。</div>
            </div>
            <div class="mb-2">
                <h4>Step2</h4>
                <div>「OK」を選択する。</div>
                <div>※退会処理が実行されるとログインすることができなくなります。</div>
            </div>
        </div>

    </div>
@endsection
