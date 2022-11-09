/* ===================================
     Text Animation
     ====================================== */
    function textEffect(text) {
        $.each(text.split(""), function (key, val) {

            $('.text-box').append('<div class="split-text">' + val + '</div>');
        });

        var each_text = $('.split-text');

        $.each(each_text, function () {
            var rand = Math.floor(Math.random() * 1000);

            // random color
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);

            $(this).css({
                'color': 'rgb(' + r + ',' + g + ',' + b + ')',
                'margin-top': -rand

            }).animate({
                marginTop: '0px'
            }, 1000);
        });
    }

$(document).ready(function () {

    /* ===================================
     CrossFade Image
     ====================================== */
    function cycleImages() {
        var $active = $('#cycler .active');
        var $next = ($active.next().length > 0) ? $active.next() : $('#cycler img:first');
        $next.css('z-index', 2);//move the next
        $active.fadeOut(1500, function () {//fade out the top image
            $active.css('z-index', 1).show().removeClass('active');//reset the z-index and unhide the image
            $next.css('z-index', 3).addClass('active');//make the next image the top one
        });
    }
    setInterval(cycleImages, 4000);//4secs

    /* ===================================
     Hover Image
     ====================================== */
    $("img.blackw").hover(
            function () {
                $(this).toggleClass("blackw");
            },
            function () {
                $(this).toggleClass("blackw");
            });

    /* ===================================
     Blink Text
     ====================================== */

    function blink_text() {
        $('.blink').fadeOut();
        $('.blink').fadeIn();
        $('.blink').hide();
        setInterval(blink_text2, 2000);
        $('.blinkk').show();
    }
// function blink_text2() {
//     $('.blinkk').fadeOut();
//     $('.blinkk').fadeIn();
// }
    $('.blinkk').hide();
    setInterval(blink_text, 2000);
    $('.blinkk').hide();

    /* ===================================
     dialog
     ====================================== */
    $("#dialog").dialog({
        autoOpen: false,
        show: {
            effect: "blind",
            duration: 1000
        },
        hide: {
            effect: "explode",
            effect: "fold",
            duration: 1000
        }
    });

    $("#opener").on("click", function () {
        $("#dialog").dialog("open");
    });
    /* ===================================
     scrollprogress jquery
     ====================================== */
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        dheight = $(document).height();
        wheight = $(window).height();
        scrollpercent = (scroll / (dheight - wheight)) * 100;
        $('#progress').css('height', scrollpercent + '%');
    });

    /* ===================================
     slider jquery
     ====================================== */
    $("#slider-range-min").slider({
        range: "min",
        value: 50,
        min: 0,
        max: 100,
        slide: function (event, ui) {
            $("#amount").val(ui.value + ".00$");
            $(".a, .b, .c, .d").width(ui.value + "%");
        }
    });
    $("#amount").val($("#slider-range-min").slider("value") + ".00$");

/* ===================================
     CSS gradient jquery
     ====================================== */
     function gradient() {
        $("b").toggleClass("gradient-heading");
     }
     setInterval(gradient, 8000);
});
