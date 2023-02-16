$(function () {
    $("#edit-title-search").on("click", function() {
        const title = document.getElementById("title").textContent;
        var result = prompt("プラン名「 " + title + " 」を変更します。", title);
        var url = new URLSearchParams(window.location.search);
        var post_id = url.get('id');

        if(!result) {
            return false;
        }
    
        $.ajax({
            type: 'POST',
            url: "/search/" + post_id + "/title",
            data: {
                edit_title: result,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        })
        .done((data)=>{
            $("#title").html(data['edit_title']);
            alert("プラン名「 " + title + " 」から「 " + data['edit_title'] + " 」に変更しました！");
        })
    });

    $("#edit-title-favorite").on("click", function() {
        const title = document.getElementById("title").textContent;
        var result = prompt("プラン名「 " + title + " 」を変更します。", title);
        var url = new URLSearchParams(window.location.search);
        var favorite_id = url.get('id');

        if(!result) {
            return false;
        }
    
        $.ajax({
            type: 'POST',
            url: "/favorite/" + favorite_id + "/title",
            data: {
                edit_title: result,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        })
        .done((data)=>{
            $("#title").html(data['edit_title']);
            alert("プラン名「 " + title + " 」から「 " + data['edit_title'] + " 」に変更しました！");
        })
    })

})
