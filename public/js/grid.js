$(document).ready(function () {
    // init Isotope
    var $grid = $('.grid').isotope({
        itemSelector: '.element-item',
        layoutMode: 'fitRows',
        getSortData: {
            name: '.name',
            symbol: '.symbol',
            number: '.number parseInt',
            category: '[data-category]',
            weight: function (itemElem) {
                var weight = $(itemElem).find('.weight').text();
                return parseFloat(weight.replace(/[\(\)]/g, ''));
            }
        }
    });
// filter functions
    var filterFns = {
        // show if number is greater than 50
        numberGreaterThan50: function () {
            var number = $(this).find('.number').text();
            return parseInt(number, 10) > 50;
        },
        // show if name ends with -ium
        ium: function () {
            var name = $(this).find('.name').text();
            return name.match(/ium$/);
        }
    };
// bind filter button click
    $('#filters').on('click', 'button', function () {
        var filterValue = $(this).attr('data-filter');
        $('button.green-active-background').removeClass('green-active-background text-white');
        $(this).addClass('green-active-background text-white');
        // use filterFn if matches value
        filterValue = filterFns[ filterValue ] || filterValue;
        $grid.isotope({filter: filterValue});
    });
    $('#filters2').on('click', 'button', function () {
        var filterValue = $(this).attr('data-filter');
        $('button.green-active-background').removeClass('green-active-background text-white');
        $(this).addClass('green-active-background text-white');
        // use filterFn if matches value
        filterValue = filterFns[ filterValue ] || filterValue;
        $grid.isotope({filter: filterValue});
    });
     $('#filters3').on('click', 'button', function () {
        var filterValue = $(this).attr('data-filter');
        $('button.green-active-background').removeClass('red text-white');
        $(this).addClass('green-active-background text-white');
        // use filterFn if matches value
        filterValue = filterFns[ filterValue ] || filterValue;
        $grid.isotope({filter: filterValue});
    });
    new WOW().init();
    var carouselContainer = $('.carousel');
    var slideInterval = 5000;
    function toggleH() {
        $('.toggleHeading').hide()
        var caption = carouselContainer.find('.active').find('.toggleHeading').addClass('animated fadeInRight').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                function () {
                    $(this).removeClass('animated fadeInRight')
                });
        caption.slideToggle();
    }

    function toggleC() {
        $('.toggleCaption').hide()
        var caption = carouselContainer.find('.active').find('.toggleCaption').addClass('animated fadeInUp').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
                function () {
                    $(this).removeClass('animated fadeInUp')
                });
        caption.slideToggle();
    }
    carouselContainer.carousel({
        interval: slideInterval, cycle: true, pause: "hover"})
            .on('slide.bs.carousel slid.bs.carousel', toggleH).trigger('slide.bs.carousel')
            .on('slide.bs.carousel slid.bs.carousel', toggleC).trigger('slide.bs.carousel');
});


