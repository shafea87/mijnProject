jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var loader              = $('#loader');
    var loader_container    = $('#preloader');
    var scroll              = $(window).scrollTop();  
    var scrollup            = $('.backtotop');
    var menu_toggle         = $('.menu-toggle');
    var dropdown_toggle     = $('button.dropdown-toggle');
    var nav_menu            = $('.main-navigation');
    var introduction_slider = $('.introduction-slider')
    var portfolio_slider    = $('.portfolio-slider');
    var filtering           = $('.filtering-posts');

/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

    loader_container.delay(1000).fadeOut();
    loader.delay(1000).fadeOut("slow");
    
/*------------------------------------------------
            BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
            MAIN NAVIGATION
------------------------------------------------*/

    menu_toggle.click(function(){
        nav_menu.slideToggle();
        $(this).toggleClass('active');
        $('.menu-overlay').toggleClass('active');
        $('.main-navigation').toggleClass('menu-open');
        $('body').toggleClass('main-navigation-active');
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            $('.menu-sticky #masthead').addClass('nav-shrink');
        }
        else {
            $('.menu-sticky #masthead').removeClass('nav-shrink');
        }
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
       $('#primary-menu > li:last-child button.active').unbind('keydown');
    });

/*------------------------------------------------
            Sliders
------------------------------------------------*/
introduction_slider.slick({
    responsive: [
    {
        breakpoint: 767,
            settings: {
            slidesToShow: 1,
            dots: false
        }
    }
    ]
});

portfolio_slider.slick({
    responsive: [
    {
    breakpoint: 992,
        settings: {
            slidesToShow: 2,
            arrows: false,
            dots: false
        }
    },
    {
        breakpoint: 767,
            settings: {
            slidesToShow: 1,
            arrows: false
        }
    }
    ]
});

$('.testimonial-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: false,
    asNavFor: '.testimonial-nav',
    responsive: [
    {
        breakpoint: 1200,
            settings: {
            slidesToShow: 1,
            arrows: false
        }
    }
    ]
});

$('.testimonial-nav').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.testimonial-slider',
    arrows: false,
    dots: true,
    focusOnSelect: true,
    responsive: [
    {
    breakpoint: 1800,
        settings: {
            slidesToShow: 4,
            arrows: false
        }
    },
    {
        breakpoint: 992,
            settings: {
            slidesToShow: 3,
            arrows: false
        }
    },
    {
        breakpoint: 567,
            settings: {
            slidesToShow: 1,
            arrows: false
        }
    }
    ]
});

/*------------------------------------------------
                Slick Filter
------------------------------------------------*/

filtering.slick({
    responsive: [
    {
        breakpoint: 1200,
            settings: {
            slidesToShow: 1,
            arrows: false
        }
    }
    ]
});

$('ul.filter-tabs li a').click(function(e){
    e.preventDefault();

    $('ul.filter-tabs li').removeClass('active');
    $(this).parent().addClass('active');

    var currentCategory = '.' + $(this).data('slug');
    filtering.slick('slickUnfilter');
    filtering.slick('slickFilter', currentCategory);
});


/*------------------------------------------------
                Match Height
------------------------------------------------*/

$('.post-item-wrapper').matchHeight();
$('.portfolio-slider article').matchHeight();



/*--------------------------------------------------------------
 Keyboard Navigation
----------------------------------------------------------------*/
if( $(window).width() < 1024 ) {
    $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });

    $('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });
}
else {
    $('#primary-menu').find("li").unbind('keydown');
}

$(window).resize(function() {
    if( $(window).width() < 1024 ) {
        $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });

        $('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });
    }
    else {
        $('#primary-menu').find("li").unbind('keydown');
    }
});

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});