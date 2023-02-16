const buttonRemove = document.getElementById('remove-button');
const title = document.getElementById('title').textContent;
buttonRemove.addEventListener('click', function() {
    var result = window.confirm('プラン「 ' + title + ' 」を削除してもよろしいですか？');

    if(!result) {
        return false;
    }
    document.getElementById("remove-post").submit();
    alert('プラン「 ' + title + ' 」の削除が完了いたしました。');
});