$(function() {
    $("#post_button").on('click', function() {
        var title = $("#title").text();

        if (!$("#post_button").hasClass("favorite_post_on")) {
            if (!confirm('プラン「 ' + title + ' 」を投稿してもよろしいですか？')) {
                return false;
            } else {
                postAjax();
                alert("プラン「 " + title + " 」の投稿が完了いたしました！")
            }
        } else {
            alert("プラン「 " + title + " 」は投稿済みです！！！");
            return false;
        }

        function postAjax() {
            var url = new URLSearchParams(window.location.search);
            var favorite_id = url.get('id');
            $.ajax({
                type: 'POST',
                url: '/favorite/' + favorite_id + '/post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            })
            .done(()=>{
                $("#post_button").addClass("favorite_post_on").html("投稿済み");
            })
            .fail((XMLHttpRequest, textStatus, errorThrown)=>{
                //console.log("XMLHttpRequest : " + XMLHttpRequest.status);
                //console.log("textStatus     : " + textStatus);
                //console.log("errorThrown    : " + errorThrown.message);
            })
        }
    })
});