$(function(){
    $('#message_submit').on('click', function() {
        const formData = $('#message_send').serializeArray();
        const url = new URLSearchParams(window.location.search);
        const post_id = url.get('id');
        $.ajax({
            type: 'POST',
            url: '/message/' + post_id,
            dataType: 'json',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        })
        .done((data)=>{
            if(formData[1].value == data['message']) {
                var name = data['name'];
                var time = data['time'];
                var message = data['message'];
                $('#bottom_scroll').append(`<li class="d-flex justify-content-end"><div class="d-flex flex-column w-75"><div class="d-inline-block text-end">${time} ${name}</div><div class="d-flex justify-content-end"><div class="d-inline-block border rounded p-2 myself">${message}</div></div></div></li>`);
                $("#text_input").val("");
                const ele = document.getElementById('chat');
                ele.scrollTo(0, ele.scrollHeight);
            } else {
                alert("フォームの内容とデータベースの内容が異なっています。");
            }
        })
        .fail((XMLHttpRequest, textStatus, errorThrown)=>{
            //console.log("XMLHttpRequest : " + XMLHttpRequest.status);
            //console.log("textStatus     : " + textStatus);
            //console.log("errorThrown    : " + errorThrown.message);
        })
    });
})


