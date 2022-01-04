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


$(document).ready(function() {
    checkBtns(position);
    if(scrollY === 0){
        $(".comeToUp").css("opacity", 0);
    }else{
        $(".comeToUp").css("opacity", 1);
    }

    $("#navMenu a").click( function () {
        var id  = $(this).attr('href');
        var href = '';
        if(id[0] === '/'){
            href = id.slice(1);
        }else{
            href = id;
        }
        var top = $(href).offset().top;
        console.log(top);
        $('body,html').animate({scrollTop: top}, 1500);
    });


    window.addEventListener('scroll', function(e){
        if(scrollY === 0){
            $(".comeToUp").css("opacity", 0);
        }else{
            $(".comeToUp").css("opacity", 1);
        }
    });

    $('.comeToUp').click(() => {
        $('html, body').animate({scrollTop:0}, 1500);
    })
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


$(".selector").click(function(){
    if ($(this).hasClass("active")) {
        $(this).children('.statist').css("display", "none");
        $(this).children('.btn-title').children('.i_caretd').children('.stat').removeClass("fa-caret-up");
        $(this).children('.btn-title').children('.i_caretd').children('.stat').addClass("fa-caret-down");
        $(this).removeClass("active");
    } else {
        $(this).addClass("active");
        $(this).children('.statist').css("display", "flex");
        $(this).children('.btn-title').children('.i_caretd').children('.stat').removeClass("fa-caret-down");
        $(this).children('.btn-title').children('.i_caretd').children('.stat').addClass("fa-caret-up");
    }
});



$(".burgSelector").click(function(){
    if ($(this).children(".navCheck").hasClass("openned")) {
        $(this).children(".navCheck").removeClass("openned");
    } else  {
        $(this).children(".navCheck").addClass("openned");
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