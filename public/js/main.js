const buttonFavorite = document.getElementById('submit_favorite');
const buttonPlan = document.getElementById('submit_plan');
const checkStart = document.getElementById('pac-input-start');
const checkEnd = document.getElementById('pac-input-end');

const xhr = new XMLHttpRequest();

if(buttonFavorite) {
    buttonFavorite.addEventListener('click', function() {
        if(checkStart.value == "") {
            alert("集合場所が入力されていません。");
            return false;
        }
        if(checkEnd.value == "") {
            alert("終着場所が入力されていません。");
            return false;
        }
        var titleName = prompt("このプランをお気に入り登録します！タイトルを決めてください。");

        xhr.onreadystatechange = function() {
            if(xhr.readyState == 4 || xhr.status == 200) {
            }
        }
        if(!titleName == null || !titleName == "") {
            var form = document.getElementById('favorite_register');
            var formData = new FormData(form);
            formData.append("title", titleName);
            xhr.open('POST', 'map/favorite', true);
            xhr.send(formData);

            buttonFavorite.classList.add('favorite_on');
        }
    });
}

if(buttonPlan) {
    buttonPlan.addEventListener('click', function() {
        if(checkStart.value == "") {
            alert("集合場所が入力されていません。");
            return false;
        }
        if(checkEnd.value == "") {
            alert("終着場所が入力されていません。");
            return false;
        }
        var titleName = prompt("このプランを投稿します！タイトルを決めてください。");

        if(!titleName == null || !titleName == "") {
            xhr.onreadystatechange = function() {
                if(xhr.readyState == 4 && xhr.status == 200) {
                }
            }

            var form = document.getElementById('favorite_register');
            var formData = new FormData(form);
            formData.append("title", titleName);
            xhr.open('POST', 'map/plan', true);
            xhr.send(formData);

            buttonPlan.classList.add('plan_on');
        }
    });    
}

const btnPlan = document.getElementById('btnEffectiveness');
const mainTag = document.getElementById('main');
btnPlan.addEventListener('click', function() {
    mainTag.classList.toggle('close');
});

const btnMenu = document.getElementById('btn_menu');
const openNav = document.getElementById('nav_style');
const mask = document.getElementById('mask');
btnMenu.addEventListener('click', function() {
    openNav.classList.toggle('active');
    btnMenu.classList.toggle('active');
});
mask.addEventListener('click', () => {
    openNav.classList.remove('active');
    btnMenu.classList.remove('active');
})

if(buttonFavorite || buttonPlan) {
    const inputSurveillance = document.querySelectorAll('input');
    inputSurveillance.forEach(element => {
        element.addEventListener('input', function() {
            buttonFavorite.classList.remove('favorite_on');
            buttonPlan.classList.remove('plan_on');
        });
    });
}
