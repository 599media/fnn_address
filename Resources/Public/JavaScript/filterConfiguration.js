$(document).ready(function() {

    // enable touch for member list
    $('.fnn-address-list-network-touch-enable').addClass('defocus').on('touchstart', function() {
        $('.fnn-address-list-network-touch-enable.focus').not(this).removeClass('.focus').addClass('defocus');
        $(this).toggleClass('focus').toggleClass('defocus',1);
    });

    if ($('.fnn-address-list').length) {
        $('.fnn-address-list').mixItUp({
            selectors: {
                target: '.filter-list-item'
            },
            layout: {
                display: 'block'
            },
            animation: {
                easing: 'cubic-bezier(0.86, 0, 0.07, 1)',
                duration: 600,
                animateResizeContainer: true
            }
        });
    }

});




