
const swiper = new Swiper('.main__slider', {
    // Optional parameters
    loop: true,
    autoplay: true,
    effect: 'creative',
    creativeEffect: {
        prev: {
            // will set `translateZ(-400px)` on previous slides
            translate: [0, 0, -400],
        },
        next: {
            // will set `translateX(100%)` on next slides
            translate: ['100%', 0, 0],
        },
    },
    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
        clickableClass: 'swiper-pagination-clickable',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',

    },
});