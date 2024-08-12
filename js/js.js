$(function() {
    $(".banner-list").owlCarousel({
    items: 1,
    slideBy: 1,
    responsive: {
        1200: {
            item: 6,
        }, // breakpoint from 1200 up
        982: {
            items: 5,
        },
        768: {
            items: 1,
        },
        480: {
            items: 1,
            autoWidth: true,
           
        },
        0: {
            items: 1,
        }
    },
    rewind: false,
    autoplay: true,
    autoplayTimeout: 1,
    autoplayHoverPause: false,
    smartSpeed: 1,
    dots: true,
    loop: false,
    nav: false,
    autoWidth: false,
    margin: 15,
    lazyLoad: false,
    nav: false,
    navText: ["<img src='img/left.png'>", "<img src='img/right.png'>"],
    transitionStyle: "backSlide",
    animateOut: 'fadeOut', // default: false
    animateIn: 'fadeIn', // default: false
});
$(".main1-content").owlCarousel({
    items: 5,
    slideBy: 1,
    responsive: {
        1200: {
            item: 5,
        }, // breakpoint from 1200 up
        982: {
            items: 5,
        },
        768: {
            items: 2,
            autoWidth:true
           
        },
        480: {
            items: 2,
            autoWidth:true,
           
           
        },
        0: {
            items: 1,
        }
    },
    rewind: false,
    autoplay: true,
    autoplayTimeout: 1,
    autoplayHoverPause: false,
    smartSpeed: 1,
    dots: false,
    loop: false,
    nav: false,
    autoWidth: false,
    margin: 15,
    lazyLoad: false,
    nav: false,
    navText: ["<img src='img/left.png'>", "<img src='img/right.png'>"],
    transitionStyle: "backSlide",
    animateOut: 'fadeOut', // default: false
    animateIn: 'fadeIn', // default: false
});
$(".main1-content2").owlCarousel({
    items: 5,
    slideBy: 1,
    responsive: {
        1200: {
            item: 5,
        }, // breakpoint from 1200 up
        982: {
            items: 5,
        },
        768: {
            items: 2,
            autoWidth:true
           
        },
        480: {
            items: 2,
            autoWidth:true,
           
           
        },
        0: {
            items: 2,
        }
    },
    rewind: false,
    autoplay: true,
    autoplayTimeout: 1,
    autoplayHoverPause: false,
    smartSpeed: 1,
    dots: false,
    loop: false,
    nav: false,
    autoWidth: false,
    margin: 15,
    lazyLoad: false,
    nav: false,
    navText: ["<img src='img/left.png'>", "<img src='img/right.png'>"],
    transitionStyle: "backSlide",
    animateOut: 'fadeOut', // default: false
    animateIn: 'fadeIn', // default: false
});




 })

 $('#iconified').on('keyup', function() {
    var input = $(this);
    if(input.val().length === 0) {
        input.addClass('empty');
    } else {
        input.removeClass('empty');
    }
});
