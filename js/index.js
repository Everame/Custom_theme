let position = 0;
const itemsShow = 2;
const itemsSlide = 1;
const item = $(".slider-item");
const track = $(".slider-track");
const container = $(".slider-container");
const next = $(".next");
const prev = $(".prev");
const itemCount = item.length;
const itemHeight = 240;
const lastPosition = (itemCount - itemsShow) * itemHeight;

const form = $(".form");
const errorMes = $(".error_message");
const successMes = $(".success_message");


const hamurgerItems = $(".navItems");
const footHamurgerItems = $(".footNavItems");


$(document).ready(function() {
    checkBtns(position);
});

form.on('submit', formSend);

next.click(() => {
    position -= itemHeight * itemsSlide;

    slideItem(position);
})

prev.click(() => {
    position += itemHeight * itemsSlide;

    slideItem(position);
})


$(".statistics").click(() => {
    if ($(".statistics").hasClass("active")) {
        $(".statist").css("display", "none");
        $(".stat").removeClass("fa-caret-up");
        $(".stat").addClass("fa-caret-down");
        $(".statistics").removeClass("active");
    } else {
        $(".statistics").addClass("active");
        $(".statist").css("display", "flex");
        $(".stat").removeClass("fa-caret-down");
        $(".stat").addClass("fa-caret-up");
    }
});

$(".inbox").click(() => {
    if ($(".inbox").hasClass("active")) {
        $(".box").css("display", "none");
        $(".inb").removeClass("fa-caret-up");
        $(".inb").addClass("fa-caret-down");
        $(".inbox").removeClass("active");
    } else {
        $(".inbox").addClass("active");
        $(".box").css("display", "flex");
        $(".inb").removeClass("fa-caret-down");
        $(".inb").addClass("fa-caret-up");
    }
});

$(".team").click(() => {
    if ($(".team").hasClass("active")) {
        $(".comm").css("display", "none");
        $(".command").removeClass("fa-caret-up");
        $(".command").addClass("fa-caret-down");
        $(".team").removeClass("active");
    } else {
        $(".team").addClass("active");
        $(".comm").css("display", "flex");
        $(".command").removeClass("fa-caret-down");
        $(".command").addClass("fa-caret-up");
    }
});

$(".settings").click(() => {
    if ($(".settings").hasClass("active")) {
        $(".pref").css("display", "none");
        $(".sett").removeClass("fa-caret-up");
        $(".sett").addClass("fa-caret-down");
        $(".settings").removeClass("active");
    } else {
        $(".settings").addClass("active");
        $(".pref").css("display", "flex");
        $(".sett").removeClass("fa-caret-down");
        $(".sett").addClass("fa-caret-up");
    }
});

$(".feed").click(() => {
    if ($(".feed").hasClass("active")) {
        $(".wifi").css("display", "none");
        $(".fe").removeClass("fa-caret-up");
        $(".fe").addClass("fa-caret-down");
        $(".feed").removeClass("active");
    } else {
        $(".feed").addClass("active");
        $(".wifi").css("display", "flex");
        $(".fe").removeClass("fa-caret-down");
        $(".fe").addClass("fa-caret-up");
    }
});

$(".bars").click(() => {
    if (hamurgerItems.hasClass("openned")) {
        hamurgerItems.removeClass("openned");
        footHamurgerItems.removeClass("openned");
    } else {
        hamurgerItems.addClass("openned");
        footHamurgerItems.addClass("openned");
    }
})


function formSend(e) {
    e.preventDefault();

    let error = formValidate();

    if (error === 0) {
        successMes.css({
            display: "block"
        });
    } else {
        errorMes.css({
            display: "block"
        });
    }
}

function formValidate() {
    let error = 0;

    errorMes.css({
        display: "none"
    });

    successMes.css({
        display: "none"
    });

    const req = $(".req");
    const subBtn = $(".formBtn")

    for (let i = 0; i < req.length; i++) {
        const input = req[i];

        removeError(input);
        if (input.id === "formEmail") {
            if (emailValidate(input)) {
                addError(input);
                error++;
            }
        } else if (input.id === "formPhone") {
            if (phoneValidate(input)) {
                addError(input);
                error++;
            }
        } else if (input.getAttribute("type") === "checkbox" && input.checked === false) {
            addError(input);
            error++;
        } else {
            if (input.value === "") {
                addError(input);
                error++;
            }
        }
    }

    return error;
}

function emailValidate(input) {
    return !/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/.test(input.value);
}

function phoneValidate(input) {
    return !/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/.test(input.value);
}

function addError(input) {
    input.classList.add("error");
}

function removeError(input) {
    input.classList.remove("error");
}

function slideItem(position) {
    track.css({
        transform: `translateY(${position}px)`
    });
    checkBtns(position);
}

function checkBtns(position) {
    if (position === 0) {
        prev.css({
            display: "none"
        })
    } else {
        prev.css({
            display: "flex"
        })
    }

    if (Math.abs(position) === lastPosition) {
        next.css({
            display: "none"
        })
    } else {
        next.css({
            display: "flex"
        })
    }
}