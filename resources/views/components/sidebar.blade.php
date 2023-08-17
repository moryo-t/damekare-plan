<div class="side-position">
    <div id="side-bar">
        <div class="d-flex justify-content-between mt-2">
            <div class="d-flex">
                <div class="logo-damekare py-1">
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
        <form class="plan-search my-md-2 mb-1 d-flex flex-column align-items-center" method="POST" id="favorite_register" >
            @csrf
            <div class="mb-1 w-100">
                <label for="">始発場所</label>
                <input type="text" class="form-control input_active" placeholder="始発場所を入力" name="start" id="pac-input-start">
            </div>
            <div class="mb-1 w-100">
                <label for="">終着場所</label>
                <input type="text" class="form-control input_active" placeholder="始発場所を入力してください" name="end" id="pac-input-end" disabled="disabled">
            </div>
    
            <div class="mb-1 w-100 change_block mt-2">
                <label for="">場所1</label>
                <input type="text" class="form-control pac_place" placeholder="場所1" name="place1" id="pac-input-place1">
            </div>
            <div class="mb-1 w-100 change_block">
                <label for="">場所2</label>
                <input type="text" class="form-control pac_place" placeholder="場所2" name="place2" id="pac-input-place2">
            </div>
            <div class="mb-1 w-100 change_block">
                <label for="">場所3</label>
                <input type="text" class="form-control pac_place" placeholder="場所3" name="place3" id="pac-input-place3">
            </div>
            <div class="mb-1 w-100 change_block">
                <label for="">場所4</label>
                <input type="text" class="form-control pac_place" placeholder="場所4" name="place4" id="pac-input-place4">
            </div>
            <div class="mb-1 w-100 change_block">
                <label for="">場所5</label>
                <input type="text" class="form-control pac_place" placeholder="場所5" name="place5" id="pac-input-place5">
            </div>
    
            <div class="w-100 d-flex justify-content-start align-items-center my-1 waypoint_check">
                <div class="btn btn-outline-dark p-0 circle-btn rounded-circle d-flex justify-content-center align-items-center add_destination">＋</div>
                <div class="ms-2 data-spot">
                    <a href="javascript:void(0)" class="link-dark text-decoration-none add_destination">経由地の追加</a>
                </div>
            </div>
    
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
</div>