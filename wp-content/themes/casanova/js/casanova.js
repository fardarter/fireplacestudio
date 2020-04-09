/*global document:true, imagesLoaded:true, setInterval:true, clearInterval:true, Maplace:true, google:true, countUp:true*/
/*jslint nomen: true */
(function () {
    'use strict';

    var root, $, casanova;

    /* Create the window instance */
    root = this;
    $ = root.jQuery || root.$;

    /* Define casanova as an object */
    casanova = {};

    /* Header Collapse function */
    function headerCollapse(){
        var header = $('header.header');
        if ($(window).scrollTop() >= 200) {
            header.addClass('is-collapsed');
        } else if ( $(window).scrollTop() < 200 ) {
            header.removeClass('is-collapsed');
        }
    }

    /* Fixed header */
    casanova.fixedHeader = function () {
        var doc    = $(document),
            header = $('header.header');

        if (doc.outerWidth() > 800) {
            header.sticky();

            headerCollapse();

            $(window).scroll( function(){
                headerCollapse();
            });
        }
    };

    /* Main menu */
    casanova.menu = function () {
        var header  = $('header.header'),
            menu    = $('#site-nav'),
            mobile  = $('<nav id="mobile-menu" />'),
            clone   = menu.children('.dropdown').clone(),
            trigger = $('<a id="mobile-menu-trigger" href="#"><i class="fa fa-bars"></i></a>');

        clone.removeClass('dropdown');
        clone.find('ul, li').removeAttr('class');
        clone.find('.fa').remove();

        menu.casanovaMenu();
        
        trigger.insertAfter(menu);
        mobile.append(clone).appendTo(header);
        mobile.children().slicknav({
            prependTo: '#mobile-menu',
            duplicate: false
        });

        trigger.click(function (event) {
            if ($(this).hasClass('open')) {
                $(this).removeClass('open');
                mobile.find('.slicknav_nav').slicknav('close');
            } else {
                $(this).addClass('open');
                mobile.find('.slicknav_nav').slicknav('open');
            }
            event.preventDefault();
        });

    };

    /* Portfolio items */
    casanova.portfolioItem = function () {
        var projects = $('.projects'),
            filters = projects.prev('.project-filter'),
            imgLoad = imagesLoaded(projects),
            overlay = $('.project .project-thumb figcaption'),
            bgColor = overlay.css('background-color');

        if (projects.length) {
            if( bgColor ){
                overlay.css('background-color', casanova.rgbtorgba(bgColor, '0.8'));
            }

            imgLoad.on('always', function () {
                projects.isotope({
                    masonry: {
                        columnWidth: 1,
                        gutter: 0
                    }
                }).find('.project-thumb').each(function () {
                    $(this).hoverdir({
                        hoverElem: 'figcaption'
                    });
                });
            });

            filters.on('click', 'a', function (event) {
                var _this = $(this),
                    filter = _this.data('filter'),
                    allFilters = _this.parents('nav').find('li');

                allFilters.removeClass('active');

                _this.parent().addClass('active');

                projects.isotope({
                    filter: filter,
                    masonry: {
                        columnWidth: 1,
                        gutter: 0
                    }
                });

                event.preventDefault();
            });
        }
    };

    /* RGB to RGBA */
    casanova.rgbtorgba = function (rgb, opacity) {
        var color = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);

        if (color) {
            return 'rgba(' + color[1] + ',' + color[2] + ',' + color[3] + ',' + opacity + ')';
        }
    };

    /* Toggle and accordion */
    casanova.toggleAccordion = function () {
        $('.accordion').not('.toggles').casanovaAccordion();

        $('.toggles').casanovaAccordion({
            closeOthers: false
        });
    };

    /* Quote rotator */
    casanova.quoteRotator = function () {
        var quotes = $('.quote-rotator');

        quotes.find('.bxslider').bxSlider({
            adaptiveHeight: true,
            nextText: '<i class="fa fa-angle-right" />',
            prevText: '<i class="fa fa-angle-left" />'
        });
    };

    /* Progress bar */
    casanova.progress = function () {
        var bars = $('.progress-bar');

        bars.appear().one('appear', function () {
            var bar = $(this).find('.bar'),
                width = bar.data('width'),
                note = bar.prev('.label').children('.right');

            bar.children().animate({
                width: width + '%'
            }, 1500);

            note.html(width + '%');
        });
    };

    casanova.formValidation = function() {
        // contact form map validation
        $('.section-map').each(function(){
            var $form = $(this).find('form');

            $form.find('.button').click(function(){
                var ffErrorClass = 'error';
                var isValid = true;
                var $form = $(this).parents('form:first');
            //class="ff-input-name", email, mesage

                $form.find('input, select, textarea, radio, checkbox').removeClass( ffErrorClass );

                var $name = $form.find('.ff-input-name');
                if( $name.val() == '' ) {
                    isValid = false;
                    $name.addClass(ffErrorClass);
                }

                var $email = $form.find('.ff-input-email');
                if( $email.val() == '' || !frslib.validator.email( $email.val() ) ) {
                    isValid = false;
                    $email.addClass(ffErrorClass);
                }

                var $message = $form.find('.ff-input-message');
                if( $message.val() == '' ) {
                    isValid = false;
                    $message.addClass(ffErrorClass);
                }


          //##############################################################################
          //# FRESHFACE CONTACT EDITATION START
          //##############################################################################
                if( !isValid ) {
                    return false;
                }

            	var $form = $(this).parents('form:first');
            	var serializedContent = $form.serialize();


                var data = {};
                data.formInput = serializedContent;
                data.contactInfo = $form.find('.ff-contact-info').html();
                frslib.ajax.frameworkRequest('contactform-send-ajax', null, data, function( response ) {
                    if( response == 'true' ) {
                        var $message = $form.find('.ff-contact-info-message-good');
                    }	else {
                        var $message = $form.find('.ff-contact-info-message-bad');
                    }

                    $message.css('opacity', 0)
                            .css('display', 'block')
                            .animate({opacity:1},300)
                            .delay(2000)
                            .animate({opacity:0},300, function(){
                                $(this).css('display', 'none');
                            });
                    ;
                });


          //##############################################################################
          //# FRESHFACE CONTACT EDITATION END
          //##############################################################################

                return false;
            });
        });
    };

    casanova.commentFormValidation = function() {
        var $commentForm = $('.ff-validate-comment-form');

        if( $commentForm.size() > 0 ) {
            $commentForm.find('.button').click(function(){

                var isOk = true;
                var cssClassToAdd = 'error';

                $commentForm.find('input, select, textarea, radio, checkbox').removeClass( cssClassToAdd );


                //class="ff-field-author"
                //if( )
                var $author = $commentForm.find('.ff-field-author');
                if( $author.size() > 0 && $author.val() == '' ) {
                    isOk = false;

                    $author.addClass( cssClassToAdd );
                }

                var $email = $commentForm.find('.ff-field-email');
                if( $email.size() > 0 && ( $email.val() == '' || !frslib.validator.email( $email.val() ) ) ) {
                    isOk = false;
                    $email.addClass(cssClassToAdd);
                }

                var $comment = $commentForm.find('.ff-field-comment');
                if( $comment.size() > 0 && $comment.val() == '' ) {
                    isOk = false;
                    $comment.addClass(cssClassToAdd);
                }

                if( isOk == false ) {
                    return false;
                }
            });
        }
    }

    /* Section */
    casanova.section = function () {
        var self = this;

        $('.section').each(function () {
            var section = $(this),
                data    = section.data(),
                isMap   = section.hasClass('section-map'),
                map     = section.children('.map'),
                div     = $('<div />');

            if (data.overlay) {
                div.clone().addClass('section-overlay').css('background-color', data.overlay).css('opacity', data.overlayOpacity).prependTo(section);
            }

            if (data.pattern) {
                div.clone().addClass('section-pattern ' + data.pattern).css('opacity', data.patternOpacity).prependTo(section);
            }

            if( data.background_image ) {
                $(this).css('background-image','url(' + data.background_image+ ')'  );
            }

            if (isMap) {
                section.on('click', '.map-switcher', function (event) {
                    var content = section.children('.section-overlay, .section-pattern, .container'),
                        height  = section.children('.container').outerHeight();

                    if ($(this).hasClass('show-map')) {
                        content.hide();
                        section.height(height);
                        $(this).hide();
                        $('.hide-map').show();
                    } else {
                        content.show();
                        section.height('auto');
                        $(this).hide();
                        $('.show-map').show();
                    }

                    event.preventDefault();
                });
            }
        });
    };

    /* Initialize google map */
    casanova.gmap = function (el) {
        var data = el.data() || {},
            id = el.attr('id'),
            map;

        if (typeof Maplace === 'function') {
            map = new Maplace({
                map_div: '#' + id,
                locations: [{
                    lat: data.lat || "0",
                    lon: data.lon || "0"
                }],
                map_options: {
                    mapTypeId: data.type ? google.maps.MapTypeId[data.type] : google.maps.MapTypeId.ROADMAP,
                    zoom: data.zoom || 12
                }
            });

            map.Load();
        }
    };

    /* Map element */
    casanova.map = function () {
        $('.map').each(function () {
            var id = casanova.uniqueId();

            $(this).attr('id', id);

            casanova.gmap($(this));
        });
    }

    /* Initialize tabs */
    casanova.initTabs = function () {
        $('.tabs').casanovaTabs();
    };

    /* Initialize pie chart */
    casanova.initPieChart = function () {
        $('.pie-chart').each(function(){
            var el = $(this);

            el.appear();

            el.data.percent = '1';

            el.easyPieChart({
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.el).find('.percent').children().text(Math.round(percent));
                }
            });

            el.data('easyPieChart').update(el.data('value'));
        });
    };

    /* Initialize image slider */
    casanova.imageSlider = function () {
        var slider = $('.image-slider ul'),
            imgLoad = imagesLoaded(slider);

        imgLoad.on('always', function () {
            slider.bxSlider({
                adaptiveHeight: true,
                nextText: '<i class="fa fa-angle-right" />',
                prevText: '<i class="fa fa-angle-left" />',
                pager: false
            });
        });
    };

    /* Initialize tabs */
    casanova.stats = function () {
        var el = $('.stats');

        el.each(function () {
            var id = casanova.uniqueId();

            $(this).find('.number').attr('id', id);
        });

        el.appear().one('appear', function () {
            var num  = $(this).find('.number'),
                anim = new countUp(num.attr('id'), 0, num.text().replace(',', ''), 0, 2.5);

            anim.start();
        });
    };

    /* Initialize masontry blog */
    casanova.masonryBlog = function () {
        var entries = $('.masonry-entries'),
            imgLoad = imagesLoaded(entries);

        imgLoad.on('always', function () {
            entries.isotope({
                masonry: {
                    columnWidth: 0,
                    gutter: 0
                }
            });
        });
    };

    casanova.onAppear = function () {
        var el = $('[data-on-appear]');

        el.appear().addClass('waypoint');

        el.on('appear', function (event, elements) {
            var anim = $(this).data('onAppear');

            $(this).addClass('animated ' + anim);
        });
    };

    /* Notification box */
    casanova.notificationBox = function () {
        var el = $('.vc_message_box p');

        el.each(function () {
            var box = $(this),
                close = $('<span class="close pull-right"><i class="fa fa-times"></i></span>');

            box.prepend(close);

            close.on('click', function () {
                $(this).closest('.vc_message_box').remove();
            });
        });
    };

    /* Tooltip */
    casanova.tooltip = function () {
        $('.tooltip').each(function () {
            var el = $(this),
                data = el.data();

            data.positionTracker = true;
            el.tooltipster(data);
        });
    };

    /* Lightbox */
    casanova.lightBox = function () {
        var el = $('.lightbox');

        el.swipebox();
    };

    casanova.backToTop = function () {
        var el = $('<div id="back-to-top"><a class="icon square primary" href="#"><i class="fa fa-chevron-up"></i></a></div>');

        $(window).scroll(function () {
            if ( $(this).scrollTop() > ( $(this).height() / 3 ) ) {
                el.fadeIn('slow');
            } else {
                el.fadeOut('slow');
            }
        });

        el.appendTo('body').on('click', function (e) {
            $('body,html').animate({
                scrollTop: 0
            }, 800);

            e.preventDefault();
        });
    };

    /* Create unique ID */
    casanova.uniqueId = function (type, length) {
        var output = '', chars, count = isNaN(length) ? 5 : Number(length), i = 0;

        switch (type) {
        case 'alphabet':
            chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            break;
        case 'lowercase':
            chars = 'abcdefghijklmnopqrstuvwxyz';
            break;
        case 'uppercase':
            chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            break;
        case 'number':
            chars = '0123456789';
            break;
        default:
            chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            break;
        }

        while (i < count) {
            output += chars.charAt(Math.floor(Math.random() * chars.length));
            i = i + 1;
        }

        return output;
    };

    /* Attach casanova object to the window */
    root.casanova = casanova;

}).call(this);