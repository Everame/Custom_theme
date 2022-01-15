let position = 0;
let itemsShow = 2;
let itemHeight = 240;
const windowWidth = $(window).width();
const itemsSlide = 1;
const item = $(".slider-item");
const track = $(".slider-track");
const container = $(".slider-container");
const next = $(".next");
const prev = $(".prev");
const itemCount = item.length;
if(windowWidth > 0 && windowWidth < 575){
    itemsShow = 1;
    itemHeight = 193;
}
const lastPosition = (itemCount - itemsShow) * itemHeight;

const form = $("#formBody");
const errorMes = $(".error_inputForm");
const successMes = $(".success_message");


$(document).ready(function() {
    checkBtns(position);

    $('#freeProg').click(function(){
        $('.bgDark').css({
            display: "block"
        });
        $('.freeModal').css({
            display: "flex"
        });
    });

    $('#paidProg').click(function(e){
        e.preventDefault();
        $('.bgDark').css({
            display: "block"
        });
        $('.buyModal').css({
            display: "flex"
        });
    });

    $('.freeClose').click(function(e){
        e.preventDefault();
        $('.bgDark').css({
            display: "none"
        });
        $('.freeModal').css({
            display: "none"
        });
    });

    $('.paidClose').click(function(e){
        e.preventDefault();
        $('.bgDark').css({
            display: "none"
        });
        $('.buyModal').css({
            display: "none"
        });
        $('.buyModal').css({
            height: '400px'
        });
        $('.buyModal').removeClass('shorted');
        $('.successMessage').css({
            display: "none"
        });
        $('.buyDescr').css({
            display: "flex"
        });
        $('#buyForm').css({
            display: "flex"
        });

    });


    $("#remembermelabel").addClass("agreementText");

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

    $('.nickname').click(function() {
        if($('.userMenu').hasClass('open')){
            $('.userMenu').removeClass('open');
            $('.down').removeClass('fa-caret-up');
            $('.down').addClass('fa-caret-down');
        }else{
            $('.userMenu').addClass('open');
            $('.down').removeClass('fa-caret-down');
            $('.down').addClass('fa-caret-up');
        }
    });
});

$('#buyBtn').click(function(e){
    e.preventDefault();
    let ok = false;
    if(paidSend()){
        $.ajax({
            type: "POST",
            url: window.wp_data.ajax_url,
            data: {
                action : 'buy_Product',
                mail : $('#mail').val()
            },
            success: function () {
                ok = true;
                $('.buyModal').css({
                    height: '200px'
                });
                $('.buyModal').addClass('shorted');
                $('.successMessage').css({
                    display: "flex"
                });
                $('.buyDescr').css({
                    display: "none"
                });
                $('#buyForm').css({
                    display: "none"
                });
                $(this).find('input').val('');
                form.trigger('reset');
            }
        });
        if(!ok){
            $('error_notSended').css({
                display: "block"
            });
        }
    }else{
        return 0;
    }
});

$('#submitBtn').click(function(e){
    e.preventDefault();
    let ok = false;
    if(formSend()){
        $.ajax({
            type: "POST",
            url: window.wp_data.ajax_url,
            data: {
                action : 'send_mail',
                message : $('#formMessage').val(),
                email : $('#formEmail').val(),
                fName : $('#formName').val(),
                lastName : $('#formLast').val(),
                phone : $('#formPhone').val()
            },
            success: function () {
                ok = true;
                successMes.css({
                    display: "block"
                });
                $(this).find('input').val('');
                form.trigger('reset');
            }
        });
        if(!ok){
            $('error_notSended').css({
                display: "block"
            });
        }
    }else{
        return 0;
    }
});


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

function paidSend() {
    let error = paidValidate();

    if (error !== 0) {
        $('.buyModal').css({
            height: '450px'
        });
        errorMes.css({
            display: "block"
        });
        return false;
    }
    return true;
}

function paidValidate() {
    let error = 0;

    errorMes.css({
        display: "none"
    });

    const res = $(".res");

    for (let i = 0; i < res.length; i++) {
        const inputS = res[i];

        removeError(inputS);
        if (inputS.id === "formEmail") {
            if (emailValidate(inputS)) {
                addError(inputS);
                error++;
            }
        }else {
            if (inputS.value === "") {
                addError(inputS);
                error++;
            }
        }
    }

    return error;
}

function formSend() {

    let error = formValidate();

    if (error !== 0) {
        errorMes.css({
            display: "block"
        });
        return false;
    }
    return true;
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