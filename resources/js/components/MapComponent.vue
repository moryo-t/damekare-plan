<template>
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
</template>

<script>
export default {
    data () {
        return {
            msg: 'Hello Vue Component'
        }
    },
}
</script>