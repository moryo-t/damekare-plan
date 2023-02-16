$(function() {
    $('#quit').on('click', function() {
        if (!confirm('退会処理を行うとログインができなくなります。\n本当によろしいですか？')) {
            alert('退会処理をキャンセルしました。')
            return false;
        } else {
            alert('退会処理を行いました。\nご利用いただきありがとうございました!!!')
        }
        
        $.ajax({
            type: 'POST',
            url: '/quit',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        })
        .done(()=>{
            window.location.href = '/';
        })
    })
})