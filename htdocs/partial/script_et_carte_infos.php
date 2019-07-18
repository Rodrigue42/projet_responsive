<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <script>
        var tc_breakpoint = 767;

        jQuery(document).ready(function() {
            "use strict";

            jQuery(".vertab-container .vertab-menu .list-group a").click(function(e) {
                var index = jQuery(this).index();
                var container = jQuery(this).parents('.vertab-container');
                var accordion = container.find('.vertab-accordion');
                var contents = accordion.find(".vertab-content");

                e.preventDefault();

                jQuery(this).addClass("active");
                jQuery(this).siblings('a.active').removeClass("active");

                contents.removeClass("active");
                contents.eq(index).addClass("active");
                container.data('current', index);

                jQuery(this).parents('.vertab-menu').css('min-height', jQuery(container).children('.vertab-accordion').height() + 20);
            });

            jQuery('.vertab-accordion').on('show.bs.collapse', '.collapse', function() {
                var accordion, container, current, index;

                accordion = jQuery(this).parents('.vertab-accordion');
                container = accordion.parents('.vertab-container');

                accordion.find('.collapse.in').each(function() {
                    jQuery(this).collapse('hide');
                });

                jQuery(this).siblings('.panel-heading').addClass('active');

                current = accordion.find('.panel-heading.active');
                index = accordion.find('.panel-heading').index(current);

                container.data('current', index);
            });

            jQuery('.vertab-accordion .panel-collapse').on('hide.bs.collapse', function() {
                jQuery(this).siblings('.panel-heading').removeClass('active');
            });

            jQuery(window).on("resize orientationchange", function() {
                resize_vertical_accordions();
            });

            jQuery(".vertab-accordion .panel-heading").click(function() {
                var el = this;
                setTimeout(function() {
                    jQuery("html, body").animate({
                        scrollTop: jQuery(el).offset().top - 10
                    }, 1000);
                }, 500);

                return true;
            });

            resize_vertical_accordions();
        });

        function resize_vertical_accordions() {
            "use strict";
            jQuery('.vertab-container').each(function(i, e) {
                var index, menu, contents;
                var container = jQuery(this);

                index = jQuery(this).data('current');
                if (index === undefined) {
                    jQuery(this).data('index', 0);
                    index = 0;
                }

                if (jQuery(window).width() > tc_breakpoint) {

                    jQuery(this).find('.panel-collapse.collapse').css('height', 'auto');

                    menu = jQuery(this).find('.vertab-menu .list-group a');
                    menu.removeClass("active");

                    contents = jQuery(this).find(".vertab-accordion .vertab-content");
                    contents.removeClass("active");

                    menu.eq(index).addClass('active');
                    contents.eq(index).addClass("active");

                    jQuery(this).children('.vertab-menu').css('min-height', jQuery(this).children('.vertab-accordion').height() + 20);
                } else {
                    jQuery(this).find('.vertab-content .panel-collapse.collapse').collapse('hide');

                    jQuery(this).find('.vertab-content .panel-heading').removeClass('active');

                    setTimeout(function() {
                        jQuery(container).find('.vertab-content .panel-heading').eq(index).addClass("active");
                        jQuery(container).find('.vertab-content .panel-collapse.collapse').eq(index).collapse('show');
                    }, 1000);

                }
            });
        }
    </script>
</body>

</html>