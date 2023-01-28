$(document).ready(function () {
    // detect screen size
    var width = $(window).width();
    var burger = $('#burger');
    var has__child = $('.has__child');

    if (width <= 990) {
        if (burger.length > 0) {
            $('#burger').click(function () {
                $('#main-menu').toggle(300);
                burger.toggleClass('fa-times');
            });
        }

        if (has__child.length > 0) {
            $('.has__child').click(function (e) {
                e.preventDefault();
                $(this).children('.layer__2').toggleClass('open');
            });
        }
    }


    // on scroll fixed header
    $(window).scroll(function () {
        if ($(this).scrollTop() > 132) {
            $('.main-menu').addClass('fixed top-0');
        } else {
            $('.main-menu').removeClass('fixed top-0');
        }
    }
    );

});

