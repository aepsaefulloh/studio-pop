// ============= Video Thumb ============= \\
$(document).ready(function () {
    $('.owl-carousel.owl-thumb-video').owlCarousel({
        items: 1,
        loop: true,
        video: true,
        lazyLoad: false
    });
});

// Image-slide
$(document).ready(function () {
    $('.owl-carousel.thumb-img').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
});
