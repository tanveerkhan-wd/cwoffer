$(document).ready(function () {
	var owl = $('.info_slider');
    owl.owlCarousel({
        stagePadding: 0,
        margin: 0,
        nav: true,
        loop: true,
        autoplay: true,
        autoPlaySpeed: 50,
        autoPlayTimeout: 5000000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
                loop: true,
                
            },
            600: {
                items: 1,
                nav: true,
                loop: true,
                
            },
            1000: {
                items: 1,
                nav: true,
                loop: true,
                
            }
        }
    })


});