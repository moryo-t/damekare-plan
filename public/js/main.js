document.addEventListener('DOMContentLoaded', function() {
    const buttonFavorite = document.getElementById('submit_favorite');
    const buttonPlan = document.getElementById('submit_plan');
    const checkStart = document.getElementById('pac-input-start');
    const checkEnd = document.getElementById('pac-input-end');

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

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
                xhr.open('POST', '/map/favorite', true);
                xhr.send(formData);

                buttonFavorite.classList.add('favorite_on');
            }
        });
    }

    if (buttonPlan) {
        buttonPlan.addEventListener('click', function() {
            fetch('/map/post/create', {
                method: 'POST',
                body: JSON.stringify({
                    places: allPlaces,
                    settings: allSetting,
                }),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
            })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = '/post-create';
                form.target = '_blank';
    
                const csrfTokenField = document.createElement('input');
                csrfTokenField.type = 'hidden';
                csrfTokenField.name = '_token';
                csrfTokenField.value = csrfToken;
    
                const hiddenField = document.createElement('input');
                hiddenField.type = 'hidden';
                hiddenField.name = 'input_name_response';
                hiddenField.value = data.map_data;

                form.appendChild(csrfTokenField);
                form.appendChild(hiddenField);
                document.body.appendChild(form);
                form.submit();
            })
        });
    }

    const btnPlan = document.getElementById('btnEffectiveness');
    const mainTag = document.getElementById('main');
    const mapResCheck = document.getElementById('mapResCheck');
    btnPlan.addEventListener('click', function() {
        mainTag.classList.toggle('close');
        mapResCheck.classList.toggle('close');
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

});