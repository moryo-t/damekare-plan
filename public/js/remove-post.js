const buttonRemove = document.getElementById('remove_button');

buttonRemove.addEventListener('click', function() {
    var result = window.confirm('投稿を削除してもよろしいですか？');

    if(!result) {
        return false;
    }
    document.getElementById("post_remove").submit();
});