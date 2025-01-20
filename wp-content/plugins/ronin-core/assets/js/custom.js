
jQuery(document).ready(function ($) {
    // init Isotope
    var $grid = $('.portfolio-items').isotope({
        // options
    });
    // filter items on button click
    $('.portfolio-menu ul').on('click', 'li', function () {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
    });

    $('.portfolio-menu ul').on('click', 'li', function () {
        $(this).siblings(".active").removeClass('active');
        $(this).addClass("active");
    })
})
