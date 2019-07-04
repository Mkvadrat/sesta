document.addEventListener(
    "DOMContentLoaded", () => {
        new Mmenu("#menu", {
            "extensions": [
                "pagedim-black",
                "position-right"
            ]
        });
    }
);

$(document).ready(function () {

    $(".slider__main .owl-carousel").owlCarousel({
        items: 1,
        nav: true,
        video: true,
        autoplay: true,
        loop: true,
        autoplayTimeout: 4000,
        navText: ["<img src='/wp-content/themes/sesta/image/left-arrow.svg'/>", "<img src='/wp-content/themes/sesta/image/right-arrow.svg'/>"],
        responsiveClass: true,
        responsive: {
            0: {
                nav: false
            },
            768: {
                nav: true
            }
        }
    });

    $(".products__carousel.owl-carousel").owlCarousel({
        items: 3,
        nav: false,
        dots: false,
        margin: 18,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                stagePadding: 50,
                center: true,
                startPosition: 1
            },
            768: {
                items: 2,
                stagePadding: 75,
                center: true,
                startPosition: 1
            },
            1200: {
                items: 3,
                stagePadding: 0,
                startPosition: 0
            }
        }
    });

    $(".recomm__grid.owl-carousel").owlCarousel({
        items: 4,
        nav: false,
        dots: false,
        margin: 18,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                stagePadding: 50,
                center: true,
                startPosition: 2
            },
            768: {
                items: 2,
                stagePadding: 75,
                center: true,
                startPosition: 2
            },
            1200: {
                items: 4,
                stagePadding: 0,
                startPosition: 0
            }
        }
    });

    $(".big__carousel .owl-carousel").owlCarousel({
        items: 1,
        nav: true,
        video: true,
        thumbs: true,
        dots: false,
        thumbsPrerendered: true,
        navText: ["<img src='/wp-content/themes/sesta/image/left-arrow.svg'/>", "<img src='/wp-content/themes/sesta/image/right-arrow.svg'/>"],
        responsiveClass: true,
        responsive: {
            0: {
                nav: false
            },
            768: {
                nav: true
            }
        }
    });

    $('[data-toggle="tooltip"]').tooltip();

});
