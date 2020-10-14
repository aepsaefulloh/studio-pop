$(document).ready(function () {
    // ========= Video Carousel ========= \\
    $('.owl-carousel.owl-thumb-video').owlCarousel({
        items: 1,
        loop: true,
        video: true,
        lazyLoad: false
    });
    // ========= Image Carousel ========= \\
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
    });
    // ========= Checkbox ========= \\
    $('input[type="checkbox"]').on('change', function () {
        $('input[type="checkbox"]').not(this).prop('checked', false);
    });
    // ========= Product Size Choice ========= \\
    var sizes = jQuery(".product-size").find("span");
    sizes.click(function () {
        sizes.removeClass("active");
        $(this).addClass("active");
    });

});

// Thumbnail Product Detail
function changeimg(url, e) {
    document.getElementById("img").src = url;
    let nodes = document.getElementById("thumb_img");
    let img_child = nodes.children;
    for (i = 0; i < img_child.length; i++) {
        img_child[i].classList.remove('active')
    }
    e.classList.add('active');
}


// Header \\


