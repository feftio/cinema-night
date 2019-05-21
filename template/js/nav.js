$(function() {

    var navbar__adapted__bar = $('#navbar__adapted__bar');
        navbar__adapted = $('#navbar__adapted');
        wrapper__navigation = $('#wrapper__navigation');
        navbar__list = $('#navbar__list');
        navbar = $('#navbar');

    function MoveBar() {
        var w = window.innerWidth;

        if ((w <= 1280) && (wrapper__navigation.find(navbar__list).length == 0)) {

        	navbar__list.appendTo(wrapper__navigation);

        }

        if ((w > 1280) && (wrapper__navigation.find(navbar__list).length == 1)) {

            navbar__list.insertBefore("#navbar__form");

            if (wrapper__navigation.css("display") == "block") {
                wrapper__navigation.css("display", "none");
                navbar.toggleClass('navbar__opacity');
        		wrapper__navigation.toggleClass('navbar__opacity');
            }
        }
    }

    $(navbar__adapted__bar).on('click', function(e) {
        e.preventDefault();
        wrapper__navigation.slideToggle("fast");
        navbar__list.css("display", "inline-block");
        navbar.toggleClass('navbar__opacity');
        wrapper__navigation.toggleClass('navbar__opacity');
    });

    $(window).resize(MoveBar);
    jQuery(document).ready(MoveBar);

});
