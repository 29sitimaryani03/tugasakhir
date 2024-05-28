// owl-carousel banner

    $(document).ready(function(){
        $('#banner').owlCarousel({
            responsiveClass: true,
            nav: true,
            loop: true,
            dots: true,
            infinite: true,
            autoplay: true,
            speed: 1000,
            autoplaySpeed: 2000,
            items: 1,
            navText: [
                "<i class='fas fa-angle-left'></i>",
                "<i class='fas fa-angle-right'></i>"
            ],
            navContainer: ".owl-nav"
        });
    });
