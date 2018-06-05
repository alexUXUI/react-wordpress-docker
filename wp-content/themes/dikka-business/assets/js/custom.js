 jQuery(document).ready(function($) {

/*------------------------------------------------
                MAIN NAVIGATION
------------------------------------------------*/

    $('.menu-toggle').click(function () {
        $(this).toggleClass('active');
        $('.menu-toggle + ul').slideToggle();
        $('ul#primary-menu').slideToggle();
    });

    $(".site-header li.menu-item-has-children > a").after('<button class="dropdown-toggle"><i class="fa fa-angle-down"></i></button>')
    $(".site-header button.dropdown-toggle").click(function() {
        $(this).toggleClass('active');
        $(this).parent().find('ul.sub-menu').first().slideToggle();
    });

/*------------------------------------------------
                SLICK SLIDER
------------------------------------------------*/

    $('#featured-slider .featured-slider-wrapper').slick();

/*------------------------------------------------
                MATCH HEIGHT
------------------------------------------------*/

    $('#latest-post .featured-image img').matchHeight();
    $('#latest-post .entry-container').matchHeight();
    $('.blog-archive-wrapper .featured-image img').matchHeight();
    $('.blog-archive-wrapper .entry-container').matchHeight();
    $('.team-content').matchHeight();
    $('.featured-services-content').matchHeight();

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});