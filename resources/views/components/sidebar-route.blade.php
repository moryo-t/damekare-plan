<div id="side-bar">
    <div class="d-flex justify-content-between mt-2">
        <div class="d-flex">
            <div class="logo-damekare">
                <a href="/"><img src="{{ asset('img/main-logo.png') }}" alt="" width="130px"></a>
            </div>
            <div class="d-flex align-items-center">
                <div class="icon-menu p-1" id="drive"><img src="{{ asset('img/car.png') }}" alt="" width="24"></div>
                <div class="icon-menu p-1" id="walk"><img src="{{ asset('img/walking.png') }}" alt="" width="24"></div>
            </div>    
        </div>

        <div class="btn-content d-flex align-items-center me-2">
            <div class="btn-trigger" id="btn_menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    <button class="btn btn-plan" id="btnEffectiveness"></button>
</div>

<div class="w-75 mx-auto">
    <form class="plan-search my-2 d-flex flex-column align-items-center" method="POST" id="favorite_register">
        @csrf
        @foreach($items as $item)
            <div class="mb-1 w-100">
                <label for="">始発場所</label>
                <input type="text" class="form-control" placeholder="始発場所を入力" name="start" id="pac-input-start" value="{{ $item->start }}">
            </div>
            <div class="mb-3 w-100">
                <label for="">終着場所</label>
                <input type="text" class="form-control" placeholder="終着場所を入力" name="end" id="pac-input-end" value="{{ $item->end }}">
            </div>

            <div class="w-100 data-spot">
                経由地の入力
            </div>
    
            <div class="mb-1 w-100">
                <label for="">場所1</label>
                <input type="text" class="form-control" placeholder="場所1" name="place1" id="pac-input-place1" value="{{ $item->place1 }}">
            </div>
            <div class="mb-1 w-100">
                <label for="">場所2</label>
                <input type="text" class="form-control" placeholder="場所2" name="place2" id="pac-input-place2" value="{{ $item->place2 }}">
            </div>
            <div class="mb-1 w-100">
                <label for="">場所3</label>
                <input type="text" class="form-control" placeholder="場所3" name="place3" id="pac-input-place3" value="{{ $item->place3 }}">
            </div>
            <div class="mb-1 w-100">
                <label for="">場所4</label>
                <input type="text" class="form-control" placeholder="場所4" name="place4" id="pac-input-place4" value="{{ $item->place4 }}">
            </div>
            <div class="mb-1 w-100">
                <label for="">場所5</label>
                <input type="text" class="form-control" placeholder="場所5" name="place5" id="pac-input-place5" value="{{ $item->place5 }}">
            </div>
        @endforeach

        <div class="w-100 d-flex">
            <div class="mt-2 d-grid w-100 me-1">
                @auth
                    <button type="button" class="btn btn-outline-danger" id="submit_favorite">プランを保存</button>
                @endauth
                @guest
                    <a href="/login" class="btn btn-outline-danger">プランを保存</a>
                @endguest
            </div>
            <div class="mt-2 d-grid w-100 ms-1">
                @auth
                    <button type="button" class="btn btn-outline-primary" id="submit_plan">プランを投稿</button>
                @endauth
                @guest
                    <a href="/login" class="btn btn-outline-primary">プランを投稿</a>
                @endguest
            </div>    
        </div>
    </form>
    <div class="d-flex justify-content-between">
        <div>
            <div id="duration" class="fw-bold"></div>
        </div>
        <div id="plan">
            <a href="/search">プラン検索</a>
        </div>
    </div>
</div>

