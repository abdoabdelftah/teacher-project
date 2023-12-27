"use strict";

!function(){
    var e = document.getElementById("slider-pricing"),
        reviews1 = document.getElementById("swiper-reviews"),
        reviews2 = document.getElementById("swiper-reviews2"),
        i = document.getElementById("swiper-clients-logos");

    // Your existing code...

    // Modify the swiper initialization for swiper-reviews
    reviews1 && new Swiper(reviews1, {
        slidesPerView: 1,
        spaceBetween: 5,
        centeredSlides: true,
        grabCursor: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false
        },
        loop: true,
        loopAdditionalSlides: 1,
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        breakpoints: {
            992: {
                slidesPerView: 4,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20
            }
        }
    });

    // Modify the swiper initialization for swiper-reviews2
    reviews2 && new Swiper(reviews2, {
        slidesPerView: 1,
        spaceBetween: 5,
        centeredSlides: true,
        grabCursor: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false
        },
        loop: true,
        loopAdditionalSlides: 1,
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        breakpoints: {
            992: {
                slidesPerView: 4,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20
            }
        }
    });

    // Your existing code...
}();
