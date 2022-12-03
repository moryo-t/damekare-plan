const buttonRemove = document.getElementById('remove_button');

buttonRemove.addEventListener('click', function() {
    var result = window.confirm('お気に入り解除してもよろしいですか？');

    if(!result) {
        return false;
    }
    document.getElementById("favorite_remove").submit();
});