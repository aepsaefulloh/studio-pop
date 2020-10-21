$(document).ready(function () {
    // ========= Video Carousel ========= \\
    $('.owl-carousel.owl-thumb-video').owlCarousel({
        items: 1,
        loop: true,
        video: true,
        lazyLoad: false,
        dots: false,
        nav: true,
        navText: [
            '<i class="ion-ios-arrow-back" aria-hidden="true"></i>',
            '<i class="ion-ios-arrow-forward" aria-hidden="true"></i>'
        ]
    });
    // ========= Image Carousel ========= \\
    $('.owl-carousel.thumb-img').owlCarousel({
        loop: true,
        margin: 0,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        items: 1,
        center: true,
        autoHeight: true,
        dots: false,
        nav: true,
        navText: [
            '<i class="ion-ios-arrow-back" aria-hidden="true"></i>',
            '<i class="ion-ios-arrow-forward" aria-hidden="true"></i>'
        ]
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