const buttonRemove = document.getElementById('remove_button');
const title = document.getElementById('title').textContent;
buttonRemove.addEventListener('click', function() {
    var result = window.confirm('プラン「 ' + title + ' 」を削除してもよろしいですか？');

    if(!result) {
        return false;
    }
    document.getElementById("favorite_remove").submit();
    alert('プラン「 ' + title + ' 」の削除が完了いたしました。');
});