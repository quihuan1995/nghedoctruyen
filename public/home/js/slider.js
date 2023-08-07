(function($) {
    "use strict";
    var slider = {
        initialised: false,
        version: 1.0,
        mobile: false,
        init: function() {
            if (!this.initialised) {
                this.initialised = true;
            } else {
                return;
            }
            this.Slider();
        },
        // Slider
        Slider: function() {
            var swiper = new Swiper('.ms_feature_slider.swiper', {
                slidesPerView: 6,
                spaceBetween: 30,
                loop: false,
                speed: 1500,
                grid: {
                    fill: 'row',
                    rows: 1,
                },
                autoplay: {
                    delay: 10000,
                },
                navigation: {
                    nextEl: '.swiper-button-next1',
                    prevEl: '.swiper-button-prev1',
                },
                breakpoints: {
                    1800: {
                        slidesPerView: 6,
                        spaceBetween: 30,
                    },
                    1400: {
                        slidesPerView: 6,
                        spaceBetween: 30,
                    },
                    992: {
                        slidesPerView: 6,
                        spaceBetween: 30,
                    },
                    768: {
                        slidesPerView: 5,
                        spaceBetween: 20,
                    },
                    640: {
                        slidesPerView: 3,
                        spaceBetween: 15,
                    },
                    480: {
                        slidesPerView: 3,
                        spaceBetween: 15,
                    },
                    375: {
                        slidesPerView: 3,
                        spaceBetween: 15,
                    }
                },
            })
        },
    };
    $(document).ready(function() {
        slider.init();
    });

    // Window Scroll
    // $(window).scroll(function() {
    //     var wh = window.innerWidth;
    //     //Go to top
    //     if ($(this).scrollTop() > 100) {
    //         $('.gotop').addClass('goto');
    //     } else {
    //         $('.gotop').removeClass('goto');
    //     }
    // });
    // $(".gotop").on("click", function() {
    //     $("html, body").animate({
    //         scrollTop: 0
    //     }, 600);
    //     return false
    // });
})(jQuery);

