var dropdownText = document.querySelectorAll(".prefectures");
var inputResult = document.getElementById("inputResult");
dropdownText.forEach(element => {
    element.addEventListener('click', function() {
        var choiceList = element.textContent;
        inputResult.value = choiceList;
        document.list_form.submit();
    });
});
