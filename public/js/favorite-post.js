const postButton = document.getElementById('post_button');

postButton.addEventListener('click', function() {
    var result = window.confirm('プランを投稿してもよろしいですか？');

    if(!result) {
        return false;
    }

    postButton.classList.add('favorite_post_on');
    document.getElementById("favorite_post").submit();
});