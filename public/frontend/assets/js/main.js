(function($) {
    'use strict';

    /*
    |--------------------------------------------------------------------------
    | Template Name: Educve
    | Author: ThemeDox
    | Version: 1.0.0
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    | TABLE OF CONTENTS:
    |--------------------------------------------------------------------------
    |
    | 1. Preloader
    | 2. Mobile Menu
    | 3. Sticky Header
    | 4. Dynamic Background
    | 5. Slick Slider
    | 6. Modal Video
    | 7. Scroll Up
    | 8. Counter Animation
    | 9. Accordian
    | 10. Tabs
    | 11. Progress Bar
    | 12. Review
    | 13. Hobble Effect
    | 14. Countdown Initial
    | 15. Range Slider
    |
    */

    /*--------------------------------------------------------------
      Scripts initialization
    --------------------------------------------------------------*/
    $.exists = function(selector) {
        return $(selector).length > 0;
    };

    $(window).on('load', function() {
        preloader();
    });

    $(function() {
        mainNav();
        stickyHeader();
        dynamicBackground();
        counterInit();
        slickInit();
        modalVideo();
        scrollUp();
        accordian();
        tabs();
        progressBar();
        review();
        hobbleEffect();
        countdownInitial();
        if ($.exists('.wow')) {
            new WOW().init();
        }
    });

    $(window).on('scroll', function() {
        showScrollUp();
    });

    /*--------------------------------------------------------------
      1. Preloader
    --------------------------------------------------------------*/
    function preloader() {
        $('.td_preloader').fadeOut();
        $('td_preloader_in').delay(150).fadeOut('slow');
    }

    /*--------------------------------------------------------------
      2. Mobile Menu
    --------------------------------------------------------------*/
    function mainNav() {
        $('.td_nav').append('<span class="td_menu_toggle"><span></span></span>');
        $('.menu-item-has-children').append(
            '<span class="td_munu_dropdown_toggle"><span></span></span>',
        );
        $('.td_menu_toggle').on('click', function() {
            $(this)
                .toggleClass('td_toggle_active')
                .siblings('.td_nav_list_wrap')
                .toggleClass('td_active');
        });
        $('.td_munu_dropdown_toggle').on('click', function() {
            $(this).toggleClass('active').siblings('ul').slideToggle();
            $(this).parent().toggleClass('active');
        });

        $('.td_header_dropdown_btn').on('click', function() {
            $(this).toggleClass('active');
        });
        /* Search Toggle */
        $('.td_search_tobble_btn').on('click', function() {
            $('.td_header_search_wrap').toggleClass('active');
            $('.edc-searchbar-clickaway').toggleClass('active');
        });
        /* Side Nav */
        $('.td_hamburger_btn').on('click', function() {
            $('.td_side_header').addClass('active');
            $('html').addClass('td_hamburger_active');
        });
        $('.td_close, .td_side_header_overlay').on('click', function() {
            $('.td_side_header').removeClass('active');
            $('html').removeClass('td_hamburger_active');
        });
    }

    /*--------------------------------------------------------------
      3. Sticky Header
    --------------------------------------------------------------*/
    function stickyHeader() {
        var $window = $(window);
        var lastScrollTop = 0;
        var $header = $('.td_sticky_header');
        var headerHeight = $header.outerHeight() + 20;

        $window.scroll(function() {
            var windowTop = $window.scrollTop();

            if (windowTop >= headerHeight) {
                $header.addClass('td_gescout_sticky');
            } else {
                $header.removeClass('td_gescout_sticky');
                $header.removeClass('td_gescout_show');
            }

            if ($header.hasClass('td_gescout_sticky')) {
                if (windowTop < lastScrollTop) {
                    $header.addClass('td_gescout_show');
                } else {
                    $header.removeClass('td_gescout_show');
                }
            }
            lastScrollTop = windowTop;
        });
    }

    /*--------------------------------------------------------------
      4. Dynamic Background
    --------------------------------------------------------------*/
    function dynamicBackground() {
        $('[data-src]').each(function() {
            var src = $(this).attr('data-src');
            $(this).css({
                'background-image': 'url(' + src + ')',
            });
        });
    }

    /*--------------------------------------------------------------
      5. Slick Slider
    --------------------------------------------------------------*/
    function slickInit() {
        if ($.exists('.td_slider')) {
            $('.td_slider').each(function() {
                var $ts = $(this).find('.td_slider_container');
                var $slickActive = $(this).find('.td_slider_wrapper');
                var autoPlayVar = parseInt($ts.attr('data-autoplay'), 10);
                var autoplaySpdVar = 3000;
                if (autoPlayVar > 1) {
                    autoplaySpdVar = autoPlayVar;
                    autoPlayVar = 1;
                }
                var speedVar = parseInt($ts.attr('data-speed'), 10);
                var loopVar = Boolean(parseInt($ts.attr('data-loop'), 10));
                var centerVar = Boolean(parseInt($ts.attr('data-center'), 10));
                var variableWidthVar = Boolean(
                    parseInt($ts.attr('data-variable-width'), 10),
                );
                var paginaiton = $(this)
                    .find('.td_pagination')
                    .hasClass('td_pagination');
                var slidesPerView = $ts.attr('data-slides-per-view');
                if (slidesPerView == 1) {
                    slidesPerView = 1;
                }
                if (slidesPerView == 'responsive') {
                    var slidesPerView = parseInt($ts.attr('data-add-slides'), 10);
                    var lgPoint = parseInt($ts.attr('data-lg-slides'), 10);
                    var mdPoint = parseInt($ts.attr('data-md-slides'), 10);
                    var smPoint = parseInt($ts.attr('data-sm-slides'), 10);
                    var xsPoing = parseInt($ts.attr('data-xs-slides'), 10);
                }
                var fadeVar = parseInt($($ts).attr('data-fade-slide'));
                fadeVar === 1 ? (fadeVar = true) : (fadeVar = false);
                $slickActive.slick({
                    autoplay: autoPlayVar,
                    dots: paginaiton,
                    centerPadding: '28%',
                    speed: speedVar,
                    infinite: loopVar,
                    autoplaySpeed: autoplaySpdVar,
                    centerMode: centerVar,
                    fade: fadeVar,
                    prevArrow: $(this).find('.td_left_arrow'),
                    nextArrow: $(this).find('.td_right_arrow'),
                    appendDots: $(this).find('.td_pagination'),
                    slidesToShow: slidesPerView,
                    variableWidth: variableWidthVar,
                    swipeToSlide: true,
                    responsive: [{
                            breakpoint: 1600,
                            settings: {
                                slidesToShow: lgPoint,
                            },
                        },
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: mdPoint,
                            },
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: smPoint,
                            },
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: xsPoing,
                            },
                        },
                    ],
                });
            });
        }
    }

    /*--------------------------------------------------------------
      6. Modal Video
    --------------------------------------------------------------*/
    function modalVideo() {
        if ($.exists('.td_video_open')) {
            $('body').append(`
        <div class="td_video_popup">
          <div class="td_video_popup-overlay"></div>
          <div class="td_video_popup-content">
            <div class="td_video_popup-layer"></div>
            <div class="td_video_popup-container">
              <div class="td_video_popup-align">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="about:blank"></iframe>
                </div>
              </div>
              <div class="td_video_popup-close"></div>
            </div>
          </div>
        </div>
      `);
            $(document).on('click', '.td_video_open', function(e) {
                e.preventDefault();
                var video = $(this).attr('href');

                $('.td_video_popup-container iframe').attr('src', `${video}`);

                $('.td_video_popup').addClass('active');
            });
            $('.td_video_popup-close, .td_video_popup-layer').on(
                'click',
                function(e) {
                    $('.td_video_popup').removeClass('active');
                    $('html').removeClass('overflow-hidden');
                    $('.td_video_popup-container iframe').attr('src', 'about:blank');
                    e.preventDefault();
                },
            );
        }
    }

    /*--------------------------------------------------------------
      7. Scroll Up
    --------------------------------------------------------------*/
    function scrollUp() {
        $('.td_scrollup').on('click', function(e) {
            e.preventDefault();
            $('html,body').animate({
                    scrollTop: 0,
                },
                0,
            );
        });
    }
    /* For Scroll Up */
    function showScrollUp() {
        let scroll = $(window).scrollTop();
        if (scroll >= 350) {
            $('.td_scrollup').addClass('td_scrollup_show');
        } else {
            $('.td_scrollup').removeClass('td_scrollup_show');
        }
    }

    /*--------------------------------------------------------------
      8. Counter Animation
    --------------------------------------------------------------*/
    function counterInit() {
        if ($.exists('.odometer')) {
            $(window).on('scroll', function() {
                function winScrollPosition() {
                    var scrollPos = $(window).scrollTop(),
                        winHeight = $(window).height();
                    var scrollPosition = Math.round(scrollPos + winHeight / 1.2);
                    return scrollPosition;
                }

                $('.odometer').each(function() {
                    var elemOffset = $(this).offset().top;
                    if (elemOffset < winScrollPosition()) {
                        $(this).html($(this).data('count-to'));
                    }
                });
            });
        }
    }

    /*--------------------------------------------------------------
      9. Accordian
    --------------------------------------------------------------*/
    function accordian() {
        $('.td_accordian').children('.td_accordian_body').hide();
        $('.td_accordian.active').children('.td_accordian_body').show();
        $('.td_accordian_head').on('click', function() {
            $(this)
                .parent('.td_accordian')
                .siblings()
                .children('.td_accordian_body')
                .slideUp(250);
            $(this).siblings().slideDown(250);
            $(this)
                .parent()
                .parent()
                .siblings()
                .find('.td_accordian_body')
                .slideUp(250);
            /* Accordian Active Class */
            $(this).parents('.td_accordian').addClass('active');
            $(this).parent('.td_accordian').siblings().removeClass('active');
        });
    }

    /*--------------------------------------------------------------
      10. Tabs
    --------------------------------------------------------------*/
    function tabs() {
        $('.td_tabs .td_tab_links a').on('click', function(e) {
            var currentAttrValue = $(this).attr('href');
            $('.td_tabs ' + currentAttrValue)
                .fadeIn(400)
                .siblings()
                .hide();
            $(this).parents('li').addClass('active').siblings().removeClass('active');
            e.preventDefault();
        });
    }

    /*--------------------------------------------------------------
      11. Progress Bar
    --------------------------------------------------------------*/
    function progressBar() {
        $('.td_progress').each(function() {
            var progressPercentage = $(this).data('progress') + '%';
            $(this).find('.td_progress_in').css('width', progressPercentage);
        });
    }

    /*--------------------------------------------------------------
      12. Review
    --------------------------------------------------------------*/
    function review() {
        $('.td_rating').each(function() {
            var review = $(this).data('rating');
            var reviewVal = review * 20 + '%';
            $(this).find('.td_rating_percentage').css('width', reviewVal);
        });
    }

    /*--------------------------------------------------------------
      13. Hobble Effect
    --------------------------------------------------------------*/
    function hobbleEffect() {
        $(document)
            .on('mousemove', '.td_hobble', function(event) {
                var halfW = this.clientWidth / 2;
                var halfH = this.clientHeight / 2;
                var coorX = halfW - (event.pageX - $(this).offset().left);
                var coorY = halfH - (event.pageY - $(this).offset().top);
                var degX1 = (coorY / halfH) * 8 + 'deg';
                var degY1 = (coorX / halfW) * -8 + 'deg';
                var degX2 = (coorY / halfH) * -50 + 'px';
                var degY2 = (coorX / halfW) * 70 + 'px';
                var degX3 = (coorY / halfH) * -15 + 'px';
                var degY3 = (coorX / halfW) * 20 + 'px';
                var degX4 = (coorY / halfH) * 15 + 'deg';
                var degY4 = (coorX / halfW) * -15 + 'deg';
                var degX5 = (coorY / halfH) * -20 + 'px';
                var degY5 = (coorX / halfW) * 35 + 'px';

                $(this)
                    .find('.td_hover_layer_1')
                    .css('transform', function() {
                        return (
                            'perspective( 800px ) translate3d( 0, 0, 0 ) rotateX(' +
                            degX1 +
                            ') rotateY(' +
                            degY1 +
                            ')'
                        );
                    });
                $(this)
                    .find('.td_hover_layer_2')
                    .css('transform', function() {
                        return (
                            'perspective( 800px ) translateY(' +
                            degX2 +
                            ') translateX(' +
                            degY2 +
                            ')'
                        );
                    });
                $(this)
                    .find('.td_hover_layer_3')
                    .css('transform', function() {
                        return (
                            'perspective( 800px ) translateX(' +
                            degX3 +
                            ') translateY(' +
                            degY3 +
                            ')'
                        );
                    });
                $(this)
                    .find('.td_hover_layer_4')
                    .css('transform', function() {
                        return (
                            'perspective( 800px ) translate3d( 0, 0, 0 ) rotateX(' +
                            degX4 +
                            ') rotateY(' +
                            degY4 +
                            ')'
                        );
                    });
                $(this)
                    .find('.td_hover_layer_5')
                    .css('transform', function() {
                        return (
                            'perspective( 800px ) translateY(' +
                            degX5 +
                            ') translateX(' +
                            degY5 +
                            ')'
                        );
                    });
            })
            .on('mouseout', '.td_hobble', function() {
                $(this).find('.td_hover_layer_1').removeAttr('style');
                $(this).find('.td_hover_layer_2').removeAttr('style');
                $(this).find('.td_hover_layer_3').removeAttr('style');
                $(this).find('.td_hover_layer_4').removeAttr('style');
                $(this).find('.td_hover_layer_5').removeAttr('style');
            });
    }

    /*--------------------------------------------------------------
      14. Countdown Initial
    --------------------------------------------------------------*/
    function countdownInitial() {
        if ($.exists('.td_countdown')) {
            $('.td_countdown').each(function() {
                let _this = this;
                let el = $(_this).data('countdate');
                // Start Only for Never end Date
                const today = new Date();
                const tomorrow = new Date(today);
                tomorrow.setDate(today.getDate() + 1);

                const year = tomorrow.getFullYear();
                const month = tomorrow.getMonth() + 1;
                const day = tomorrow.getDate();
                const formattedTomorrow = `${year}-${
          month < 10 ? '0' + month : month
        }-${day < 10 ? '0' + day : day}`;
                el = formattedTomorrow;
                // End Only for Never end Date
                let countDownDate = new Date(el).getTime();
                let x = setInterval(function() {
                    let now = new Date().getTime();
                    let distance = countDownDate - now;
                    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    let hours = Math.floor(
                        (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60),
                    );
                    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    let seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    $(_this).find('.td_count_days').html(days);
                    $(_this).find('.td_count_hours').html(hours);
                    $(_this).find('.td_count_minutes').html(minutes);
                    $(_this).find('.td_count_seconds').html(seconds);

                    if (distance < 0) {
                        clearInterval(x);
                        $(_this).find('.td_count_days').html('00');
                        $(_this).find('.td_count_hours').html('00');
                        $(_this).find('.td_count_minutes').html('00');
                        $(_this).find('.td_count_seconds').html('00');
                    }
                }, 1000);
            });
        }
    }






})(jQuery); // End of use strict



document.addEventListener("DOMContentLoaded", () => {

    const paymentItems = document.querySelectorAll(".payment_select_item");
    const modals = document.querySelectorAll(".payment_select_modal");
    const closeButtons = document.querySelectorAll(".close_modal_btn");

    paymentItems.forEach((item, index) => {
        item.addEventListener("click", (e) => {
            e.preventDefault();
            modals[index].classList.add("active");
        });
    });

    closeButtons.forEach((button, index) => {
        button.addEventListener("click", () => {
            modals[index].classList.remove("active");
        });
    });
});
