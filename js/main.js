(function ($) {
    "use strict";
    
    // Initiate the wowjs animation library
    new WOW().init();

    // Initiate nav menu
    $('.menu, .overlay').click(function () {
        $('.menu').toggleClass('clicked');
        $('#nav').toggleClass('show');
    }); 
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });
})(jQuery);

