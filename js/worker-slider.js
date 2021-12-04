let avatarPosition = 0;
let textPosition = 0;
let currentActive = 2;
const itemShow = 1;
const itemMove = 1;
const avatarContainer = $(".slider-avatars");
const avatarTrack = $(".slider-track-avatars");
const avatarItem = $(".item-avatar");
const textContainer = $(".slider-text");
const textTrack = $(".slider-track-text");
const textItem = $(".item-text");
const avatarNext = $(".avatarNext");
const avatarPrev = $(".avatarPrev");
let avatarItemWidth = 0;
let textItemWidth = 0;
const countItems = textItem.length;
const avatarActive = $(".avatarActive");

$(document).ready(function() {
    $(`.slider-item-avatar-${currentActive}`).addClass("current");
    checkAvatars(textPosition);
});

if ($(document).width() > 767) {
    avatarItemWidth = 150;
} else if ($(document).width() < 576) {
    avatarItemWidth = 100;
};

if ($(document).width() > 767) {
    textItemWidth = 600;
} else if ($(document).width() > 575) {
    textItemWidth = 450;
} else {
    textItemWidth = 300;
};

if ($(document).width() > 767) {
    textPosition = -600;
} else if ($(document).width() > 575) {
    textPosition = -450;
} else {
    textPosition = -300;
};

const lastTextPosition = (countItems - itemShow) * textItemWidth;




$('body').on('mousedown', '.avatarNext', function() {
    avatarPosition = avatarPosition - avatarItemWidth;
    textPosition = textPosition - textItemWidth;
    $(`.slider-item-avatar-${currentActive}`).removeClass("current");
    currentActive += itemMove;
    moveAvatarItem(avatarPosition, currentActive);
    moveTextItem(textPosition);
    avatarActive.css({
        animation: "none"
    });
    setTimeout(() => {
        avatarActive.css({
            animation: "blick 1s linear"
        });
    }, 0.001);
});

$('body').on('mousedown', '.avatarPrev', function() {
    console.log(textPosition);
    avatarPosition += avatarItemWidth;
    textPosition += textItemWidth;
    $(`.slider-item-avatar-${currentActive}`).removeClass("current");
    currentActive -= itemMove;
    moveAvatarItem(avatarPosition, currentActive);
    moveTextItem(textPosition);
    avatarActive.css({
        animation: "none"
    });
    setTimeout(() => {
        avatarActive.css({
            animation: "blick 1s linear"
        });
    }, 0.001);

});




function moveAvatarItem(avatarPosition, currentActive) {
    avatarTrack.css({
        transform: `translateX(${avatarPosition}px)`
    });
    $(`.slider-item-avatar-${currentActive}`).addClass("current");
    checkAvatars(textPosition);
}

function moveTextItem(textPosition) {
    textTrack.css({
        transform: `translateX(${textPosition}px)`
    });
}

function checkAvatars(textPosition) {
    if (textPosition === 0) {
        avatarPrev.css({
            display: "none"
        })
    } else {
        avatarPrev.css({
            display: "block"
        })
    }

    if (Math.abs(textPosition) === lastTextPosition) {
        avatarNext.css({
            display: "none"
        })
    } else {
        avatarNext.css({
            display: "block"
        })
    }
}