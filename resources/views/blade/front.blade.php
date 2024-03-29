@extends('layouts.front-parent')

@section('title', 'ダメかれプラン')

@section('header')
    @include('components.header')
@endsection

@section('progress')
    <div class="progress-container">
        <div id="container"></div>
        <div id="img-loaded" class="w-50 position-absolute top-50 start-50">
            <img src="img/main-logo.png" class="w-100 object-fit-cover">
        </div>
    </div>
@endsection

@section('main')
    <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('img/food_cup_ramen_boy.jpg') }}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('img/couple_okoru_woman.jpg') }}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('img/hirameki_man.jpg') }}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('img/couple_nakaii_hug.jpg') }}" alt="">
            </div>
        </div>
        <div class="swiper-scrollbar"></div>
    </div>

    <div class="container-fluid px-0">
        <div class="text-center py-5 purpose my-5 px-sm-0 px-3">
            <h3>
                デートプランの立て方が分からないダメンズ集合！！
            </h3>
            <div>
                <span class="d-inline-block">ダメ彼氏・ダメンズに送るデート作成を</span><span class="d-inline-block">目的としたサイトです。</span>
            </div>
        </div>
    </div>

    <div class="container container-fluid-md">
        <div class="row d-flex justify-content-between px-3 px-md-0 overflow-hidden">
            <div class="col-12 col-md-6 col-lg-4 p-3">
                <div class="border rounded p-3 mb-3 h-100 fade-element">
                    <h3 class="mb-3">プランを設計</h3>
                    <div class="mb-3">
                        <a href="/map"><img src="img/undraw_by_the_road_re_vvs7.svg" alt="" class="w-100"></a>
                    </div>
                    <div>Google Mapを利用したプランの作成ができます</div>
                </div>    
            </div>

            <div class="col-12 col-md-6 col-lg-4 p-3">
                <div class="border rounded p-3 mb-3 h-100 fade-element">
                    <h3 class="mb-3">プランを保存</h3>
                    <div class="mb-3">
                        <a href="/map"><img src="img/undraw_note_list_re_r4u9.svg" alt="" class="w-100"></a>
                    </div>
                    <div>「<a href="/map">プランを設計</a>」で作成したプランの保存ができます</div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 p-3">
                <div class="border rounded p-3 mb-3 h-100 fade-element">
                    <h3 class="mb-3">プランを投稿</h3>
                    <div class="mb-3">
                        <a href="/map"><img src="img/undraw_post_re_mtr4.svg" alt="" class="w-100"></a>
                    </div>
                    <div>「<a href="/map">プランを設計</a>」で作成したプランの投稿ができます</div>
                </div>    
            </div>

            <div class="col-12 col-md-6 col-lg-4 p-3">
                <div class="border rounded p-3 mb-3 h-100 fade-element">
                    <h3 class="mb-3">プランを探す</h3>
                    <div class="mb-3">
                        <a href="/search"><img src="img/undraw_search_re_x5gq.svg" alt="" class="w-100"></a>
                    </div>
                    <div>自分の行きたい都道府県や店名などを入力し、送信するとプランが表示されます。</div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 p-3">
                <div class="border rounded p-3 mb-3 h-100 fade-element">
                    <h3 class="mb-3">ブックマーク</h3>
                    <div class="mb-3">
                        <a href="/bookmark"><img src="img/undraw_save_to_bookmarks_re_8ajf.svg" alt="" class="w-100"></a>
                    </div>
                    <div>
                        気に入ったプランをブックマークすることができます
                    </div>    
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 p-3">
                <div class="border rounded p-3 mb-3 h-100 fade-element">
                    <h3 class="mb-3">保存したプラン</h3>
                    <div class="mb-3">
                        <a href="/favorite"><img src="img/undraw_browser_stats_re_j7wy.svg" alt="" class="w-100"></a>
                    </div>
                    <div>
                        「<a href="/map">プランを設計</a>」で保存したプランはここに表示されます。
                    </div>    
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 p-3">
                <div class="border rounded p-3 mb-3 h-100 fade-element">
                    <h3 class="mb-3">投稿一覧</h3>
                    <div class="mb-3">
                        <a href="posts"><img src="img/undraw_contrast_re_hc7k.svg" alt="" class="w-100"></a>
                    </div>
                    <div>
                        「<a href="/map">プランを設計</a>」で投稿したプランはここに表示されます。
                    </div>    
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        @guest
            <div class="login_warning text-danger">
                <span class="border-bottom border-danger">※プランを保存・プランを投稿・ブックマーク機能を使用するには、「<a href="/register">登録</a>」または「<a href="login">ログイン</a>」する必要があります。</span>
            </div>
        @endguest
    </div>
    <div class="containre-fluid my-5">
        <div class="lecture-bar">
            <div class="lecture-control py-5">
                <h3 class="text-center mb-0">ダメかれプランの使い方</h3>
            </div>
        </div>
    </div>
    <div class="container mb-5 usage">
        <div class="row">
            <h3><span>プラン設計の手順</span></h3>
            <div class="mb-2 manual-element">
                <h4>Step1</h4>
                <div>「<a href="/map">プランを設計</a>」から「始発場所」と「終着場所」を入力する。他の「場所1」「場所2」「場所3」「場所4」「場所5」は「始発場所」から「終着場所」までに行きたい場所があれば入力する。</div> 
                <div class="login_warning text-danger">
                    <span class="border-bottom border-danger">※初めに入力した住所から半径10km以内の場所を優先的に候補として提案をします。またデフォルトでは、車でのルート案内になっています。</span>
                </div>
                <div class="d-flex justify-content-lg-between justify-content-center flex-lg-row flex-column align-items-center mt-3">
                    <div class="img_explanation border">
                        <img src="{{ asset('img/map_explanation.jpg') }}" alt="" class="w-100 object-fit-cover">
                    </div>
                    <div class="arrow_blue arrow_blue_obj"></div>
                    <div class="img_explanation border">
                        <img src="{{ asset('img/map_explanation_route_start.jpg') }}" alt="" class="w-100 object-fit-cover">
                    </div>
                </div>
            </div>
            <div class="mb-2 manual-element">
                <h4>Step2</h4>
                <div>プランの設計が完了したら「プランを保存」および「プランを投稿」をクリックしプラン内容の保存または投稿を行う。</div> 
                <div class="d-flex justify-content-lg-between justify-content-center flex-lg-row flex-column align-items-center mt-3">
                    <div class="img_explanation border">
                        <img src="{{ asset('img/map_explanation_route.jpg') }}" alt="" class="w-100 object-fit-cover">
                    </div>
                    <div class="arrow_blue arrow_blue_obj"></div>
                    <div class="img_explanation border">
                        <img src="{{ asset('img/map_explanation_title.jpg') }}" alt="" class="w-100 object-fit-cover">
                    </div>
                </div>
            </div>   
            <div class="mb-2 manual-element">
                <h4>Step3（プランを保存）</h4>
                <div>右上のハンバーガーメニューおよびユーザーネームをクリックし「<a href="favorite">保存したプラン</a>」を選択すると、設計したプランが表示される。</div>
            </div>
            <div class="mb-2 manual-element">
                <h4>Step3（プランを投稿）</h4>
                <div>右上のハンバーガーメニューおよびユーザーネームをクリックし「<a href="posts">投稿を一覧</a>」を選択すると、投稿したプランが表示される。</div>
            </div>    
        </div>

        <div class="row mt-5">
            <h3><span>プランを探す</span></h3>
            <div class="mb-2 manual-element">
                <h4>Step1</h4>
                <div>ハンバーガーメニューおよび右上のユーザーネームをクリックし「<a href="search">プランを探す</a>」を選択する。</div> 
            </div>
            <div class="mb-2 manual-element">
                <h4>Step2</h4>
                <div>入力フォームに都道府県や店舗名などを入力し、送信する。
                </div>
                <div class="d-flex justify-content-lg-between justify-content-center flex-lg-row flex-column align-items-center mt-3">
                    <div class="img_explanation border">
                        <img src="{{ asset('img/search_form.jpg') }}" alt="" class="w-100 object-fit-cover">
                    </div>
                    <div class="arrow_blue arrow_blue_obj"></div>
                    <div class="img_explanation border">
                        <img src="{{ asset('img/search_aichi.jpg') }}" alt="" class="w-100 object-fit-cover">
                    </div>
                </div>   
            </div>
            <div class="mb-2 manual-element">
                <h4>Step3</h4>
                <div>気になったプランを選択するとプランの詳細が表示される。</div>
                <div class="d-flex justify-content-lg-between justify-content-center flex-lg-row flex-column align-items-center mt-3">
                    <div class="img_explanation border">
                        <img src="{{ asset('img/search_result.jpg') }}" alt="" class="w-100 object-fit-cover">
                    </div>
                    <div class="arrow_blue arrow_blue_obj"></div>
                    <div class="img_explanation border">
                        <img src="{{ asset('img/search_detail.jpg') }}" alt="" class="w-100 object-fit-cover">
                    </div>
                </div>   
            </div>
        </div>

        <div class="row mt-5">
            <h3><span>プラン詳細の操作方法</span></h3>
            <div class="mt-2">
                <h4 class="split_title pb-1"><span>プランのブックマーク</span></h4>
                <div class="mb-2 manual-element">
                    <h4>Step1</h4>
                    <div>プラン詳細ページ右上に設置されている「ブックマーク」ボタンを選択する。</div>
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <div class="border img_single">
                            <img src="{{ asset('img/search_detail_love_sweet.jpg') }}" alt="" class="w-100 object-fit-cover">
                        </div>
                    </div>       
                </div>
                <div class="mb-2 manual-element">
                    <h4>Step2</h4>
                    <div>「OK」を選択。</div>
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <div class="border img_single">
                            <img src="{{ asset('img/detail_bookmark_execution.jpg') }}" alt="" class="w-100 object-fit-cover">
                        </div>
                    </div>
                </div>
                <div class="mb-2 manual-element">
                    <h4>Step3</h4>
                    <div>ハンバーガーメニューおよび右上のユーザーネームをクリックし「<a href="bookmark">ブックマーク</a>」を選択すると、ブックマークした投稿プランが表示される。</div>
                </div>    
            </div>

            <div class="mt-4">
                <h4 class="split_title pb-1"><span>プラン名（タイトル）の変更</span></h4>
                <div class="text-danger pb-2 login_warning"><span class="border-bottom border-danger">※プラン名（タイトル）の変更はプラン投稿者のみが行えます。また投稿者であるにもかかわらずプラン名（タイトル）の変更ができない場合は<a href="/login">ログイン</a>がされていない可能性があります。</span></div>
                <div class="mb-2 manual-element">
                    <h4>Step1</h4>
                    <div>プラン名（タイトル）右のアイコンを選択する。</div>
                    <div class="d-flex justify-content-lg-between justify-content-center flex-lg-row flex-column align-items-center mt-3">
                        <div class="img_explanation border">
                            <img src="{{ asset('img/edit_name.jpg') }}" alt="" class="w-100 object-fit-cover">
                        </div>
                        <div class="arrow_blue arrow_blue_obj"></div>
                        <div class="img_explanation border">
                            <img src="{{ asset('img/edit_name_aicon.jpg') }}" alt="" class="w-100 object-fit-cover">
                        </div>
                    </div>       
                </div>
                <div class="mb-2 manual-element">
                    <h4>Step2</h4>
                    <div>変更したいプラン名（タイトル）を入力し、「OK」を選択する。</div>
                    <div class="d-flex justify-content-lg-between justify-content-center flex-lg-row flex-column align-items-center mt-3">
                        <div class="img_explanation border">
                            <img src="{{ asset('img/edit_title_completion.jpg') }}" alt="" class="w-100 object-fit-cover">
                        </div>
                        <div class="arrow_blue arrow_blue_obj"></div>
                        <div class="img_explanation border">
                            <img src="{{ asset('img/edit_alert.jpg') }}" alt="" class="w-100 object-fit-cover">
                        </div>
                    </div>       
                </div>
            </div>

            <div class="mt-4">
                <h4 class="split_title pb-1"><span>投稿プランの削除</span></h4>
                <div class="text-danger pb-2 login_warning"><span class="border-bottom border-danger">※投稿プランの削除はプラン投稿者のみが行えます。また投稿者であるにもかかわらず投稿プランの削除ができない場合は<a href="/login">ログイン</a>がされていない可能性があります。</span></div>
                <div class="mb-2 manual-element">
                    <h4>Step1</h4>
                    <div>プラン詳細ページの右上に設置されている「投稿を削除」ボタンを選択する。</div>
                    <div class="d-flex justify-content-lg-between justify-content-center flex-lg-row flex-column align-items-center mt-3">
                        <div class="img_explanation border">
                            <img src="{{ asset('img/nagoya_plan_delete.jpg') }}" alt="" class="w-100 object-fit-cover">
                        </div>
                        <div class="arrow_blue arrow_blue_obj"></div>
                        <div class="img_explanation border">
                            <img src="{{ asset('img/bookmark_delete.jpg') }}" alt="" class="w-100 object-fit-cover">
                        </div>
                    </div>  
                </div>
                <div class="mb-2 manual-element">
                    <h4>Step2</h4>
                    <div>「OK」を選択。</div>
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <div class="border img_single">
                            <img src="{{ asset('img/plan_delete.jpg') }}" alt="" class="w-100 object-fit-cover">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <h4 class="split_title pb-1"><span>質問をする</span></h4>
                <div class="mb-2 manual-element">
                    <h4>Step1</h4>
                    <div>プラン詳細ページの質問までスクロールする。</div>
                    <div class="d-flex justify-content-lg-between justify-content-center flex-lg-row flex-column align-items-center mt-3">
                        <div class="img_explanation border">
                            <img src="{{ asset('img/search_detail_scroll.jpg') }}" alt="" class="w-100 object-fit-cover">
                        </div>
                        <div class="arrow_blue arrow_blue_obj"></div>
                        <div class="img_explanation border">
                            <img src="{{ asset('img/chat_scroll.jpg') }}" alt="" class="w-100 object-fit-cover">
                        </div>
                    </div>  
                </div>
                <div class="mb-2 manual-element">
                    <h4>Step2</h4>
                    <div>入力フォームに質問したい内容を入力する。</div>
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <div class="border img_single">
                            <img src="{{ asset('img/chat_form.jpg') }}" alt="" class="w-100 object-fit-cover">
                        </div>
                    </div>
                </div>
                <div class="mb-2 manual-element">
                    <h4>Step3</h4>
                    <div>「送信」ボタンを選択。</div>
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <div class="border img_single">
                            <img src="{{ asset('img/chat_submit.jpg') }}" alt="" class="w-100 object-fit-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <h3><span>ログアウト</span></h3>
            <div class="mb-2 manual-element">
                <div>ハンバーガーメニューおよび右上のユーザーネームをクリックし「ログアウト」を選択する。</div>
            </div>
        </div>

        <div class="row mt-5">
            <h3><span>退会</span></h3>
            <div class="mb-2 manual-element">
                <h4>Step1</h4>
                <div>ハンバーガーメニューおよび右上のユーザーネームをクリックし「退会」を選択する。</div>
            </div>
            <div class="mb-2 manual-element">
                <h4>Step2</h4>
                <div>「OK」を選択する。</div>
                <div class="text-danger login_warning"><span class="border-bottom border-danger">※退会処理が実行されるとログインすることができなくなります。</span></div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js" defer></script>
    <script src="{{ asset('js/quit-ajax.js') }}" defer></script>
    <script src="{{ asset('js/fade-scroll.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection