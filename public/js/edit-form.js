const addDestination = document.querySelectorAll(".add_destination");
const pointCheck = document.querySelectorAll(".waypoint_check");
const changeBlock = document.querySelectorAll(".change_block");
const changeBlockInput = document.querySelectorAll(".change_block input");
var inputActive;
let count = 0;
const length = changeBlock.length;

addDestination.forEach(btn => {
    btn.addEventListener('click', () => {
        if (count < length) {
            changeBlock[count].classList.add("add_block");
            changeBlockInput[count].classList.add("input_active");
            pointCheck[0].classList.remove("add_waypoint");
            count += 1;
        }
    });
})

function waypointCheck() {
    inputActive = document.querySelectorAll(".input_active");

    let hasValue = true;
    for (let i = 0; i < inputActive.length; i++) {
        if (inputActive[i].value == "") {
            hasValue = false;
            break;
        }
    }

    if (hasValue) {
        pointCheck[0].classList.add("add_waypoint");
    } else {
        pointCheck[0].classList.remove("add_waypoint");
    }
}