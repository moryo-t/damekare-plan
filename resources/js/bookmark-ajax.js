$(function() {
    $('#bookmark_button').on('click', function() {
        var title = $("#title").text();

        if (!$("#bookmark_button").hasClass("bookmark_on")) {
            if (!confirm('プラン「 ' + title + ' 」をブックマークしてもよろしいですか？')) {
                return false;
            } else {
                bookmarkAjax();
                alert("プラン「 " + title + " 」のブックマークが完了いたしました！");
            }
        } else {
            if (!confirm('プラン「 ' + title + ' 」のブックマークを解除してもよろしいですか？')) {
                return false;
            } else {
                bookmarkDetach();
                alert("プラン「 " + title + " 」のブックマークを解除いたしました！");
            }
        }

        function bookmarkAjax() {
            var url = new URLSearchParams(window.location.search);
            var bookmark_id = url.get('id');
            $.ajax({
                type: 'POST',
                url: '/search/' + bookmark_id + '/bookmark',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            })
            .done(()=>{
                $("#bookmark_button").addClass("bookmark_on").html("ブックマーク済み");
            })
        }

        function bookmarkDetach() {
            var url = new URLSearchParams(window.location.search);
            var bookmark_id = url.get('id');
            $.ajax({
                type: 'POST',
                url: '/search/' + bookmark_id + '/bookmark/detach',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            })
            .done(()=>{
                $("#bookmark_button").removeClass("bookmark_on").html("ブックマーク");
            })
        }

    });
});