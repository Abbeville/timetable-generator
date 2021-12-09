//alert("loaded")
(function($) {

    $.fn.menumaker = function(options) {

        var navMenu = $(this), settings = $.extend({
            title: "Menu",
            format: "dropdown",
            breakpoint: 768,
            sticky: false
        }, options);

        return this.each(function() {
            navMenu.find('li ul').parent().addClass('has-sub');
            if (settings.format != 'select') {
                navMenu.prepend('<div id="menu-button">' + settings.title + '</div>');
                $(this).find("#menu-button").on('click', function() {
                    $(this).toggleClass('menu-opened');
                    var mainmenu = $(this).next('ul');
                    if (mainmenu.hasClass('open')) {
                        mainmenu.hide().removeClass('open');
                    }
                    else {
                        mainmenu.show().addClass('open');
                        if (settings.format === "dropdown") {
                            mainmenu.find('ul').show();
                        }
                    }
                });

                multiTg = function() {
                    navMenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                    navMenu.find('.submenu-button').on('click', function() {
                        $(this).toggleClass('submenu-opened');
                        if ($(this).siblings('ul').hasClass('open')) {
                            $(this).siblings('ul').removeClass('open').hide();
                        }
                        else {
                            $(this).siblings('ul').addClass('open').show();
                        }
                    });
                };

                if (settings.format === 'multitoggle')
                    multiTg();
                else
                    navMenu.addClass('dropdown');
            }

            else if (settings.format === 'select')
            {
                navMenu.append('<select style="width: 100%"/>').addClass('select-list');
                var selectList = navMenu.find('select');
                selectList.append('<option>' + settings.title + '</option>', {
                    "selected": "selected",
                    "value": ""});
                navMenu.find('a').each(function() {
                    var element = $(this), indentation = "";
                    for (i = 1; i < element.parents('ul').length; i++)
                    {
                        indentation += '-';
                    }
                    selectList.append('<option value="' + $(this).attr('href') + '">' + indentation + element.text() + '</option');
                });
                selectList.on('change', function() {
                    window.location = $(this).find("option:selected").val();
                });
            }

            if (settings.sticky === true)
                navMenu.css('position', 'fixed');

            resizeFix = function() {
                if ($(window).width() > settings.breakpoint) {
                    navMenu.find('ul').show();
                    navMenu.removeClass('small-screen');
                    if (settings.format === 'select') {
                        navMenu.find('select').hide();
                    }
                    else {
                        navMenu.find("#menu-button").removeClass("menu-opened");
                    }
                }

                if ($(window).width() <= settings.breakpoint && !navMenu.hasClass("small-screen")) {
                    navMenu.find('ul').hide().removeClass('open');
                    navMenu.addClass('small-screen');
                    if (settings.format === 'select') {
                        navMenu.find('select').show();
                    }
                }
            };
            resizeFix();
            return $(window).on('resize', resizeFix);

        });
    };
})(jQuery);

(function($) {
    $(document).ready(function() {

        $(document).ready(function() {
            $("#navMenu").menumaker({
                title: "Menu",
                format: "dropdown"
            });

            $("#navMenu a").each(function() {
                var linkTitle = $(this).text();
                $(this).attr('data-title', linkTitle);
            });
        });

    });
})(jQuery);


$(function() {
      
//    $('.login_btn').click(function(evt) {
//        evt.preventDefault();
//  $('#myModal').modal();
//        return;
//    });


});