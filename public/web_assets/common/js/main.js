
$(document).ready(function () {


    // sticky-menu
    $(window).scroll(function () {
        if ($(window).scrollTop() > 20) {
            $(".main-menu").addClass('sticky');
        } else {
            $(".main-menu").removeClass('sticky');
        }
    });

    // mobilel menu js
    $(".mobile-topbar .bars i").on("click", function () {
        $(".mobile-menu-overlay,.mobile-menu-main").addClass("active");
        return false;
    });
    
    $(".close-mobile-menu,.mobile-menu-overlay").on("click", function () {
        $(".mobile-menu-overlay,.mobile-menu-main").removeClass("active");
    });
    
    $(document).ready(function () {
        $(".accordion-click").click(function () {
            let submenu = $(this).closest(".sub-mobile-menu").find("ul");
            $(".sub-mobile-menu ul").not(submenu).slideUp(300);
            $(".accordion-click i").not($(this).find("i")).removeClass("fa-angle-up").addClass("fa-angle-down");

            if (submenu.is(":visible")) {
                submenu.slideUp(300);
                $(this).find("i").removeClass("fa-angle-up").addClass("fa-angle-down");
            } else {
                submenu.slideDown(300);
                $(this).find("i").removeClass("fa-angle-down").addClass("fa-angle-up");
            }
        });
    });

    // profile-js-here    
    $(document).ready(function () {
        var $el = $(".user-btn");
        var $ee = $(".user-profile");

        $el.on('click', function (e) {
            e.stopPropagation();
            $ee.toggleClass('info');
        });
        $(document).on('click', function (e) {
            if (!$(e.target).closest($el).length && !$(e.target).closest($ee).length) {
                $ee.removeClass('info');
            }
        });
    });

    // back-to
    var btn = $('#button');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, '300');
    });

  //  quick-view-modal-slider-js 
    $(document).ready(function () {
        var swiper = new Swiper(".modal-slide-2", {
            spaceBetween: 10,
            slidesPerView: 4,
            spaceBetween: 10,
            loop: true,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".modal-slide-1", {
            spaceBetween: 10,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    }); 

// cart-plus-minus
    $(".quickview-cart-plus-minus").append('<div class="dec qtybutton">-</div><div class="inc qtybutton">+</div>');
    $(".qtybutton").on("click", function () {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find("input").val(newVal);
    });

    /*Product Details*/
    var productDetails = function () {
        $('.product-image-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: false,
            asNavFor: '.slider-nav-thumbnails',
        });

        $('.slider-nav-thumbnails').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.product-image-slider',
            dots: false,
            focusOnSelect: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-angle-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-angle-right"></i></button>'
        });

        // Remove active class from all thumbnail slides
        $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');

        // Set active class to first thumbnail slides
        $('.slider-nav-thumbnails .slick-slide').eq(0).addClass('slick-active');

        // On before slide change match active thumbnail to current slide
        $('.product-image-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            var mySlideNumber = nextSlide;
            $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
            $('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');
        });

        $('.product-image-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            var img = $(slick.$slides[nextSlide]).find("img");
            $('.zoomWindowContainer,.zoomContainer').remove();
            if ($(window).width() > 768) {
                $(img).elevateZoom({
                    zoomType: "inner",
                    cursor: "crosshair",
                    zoomWindowFadeIn: 500,
                    zoomWindowFadeOut: 750
                });
            }
        });
        //Elevate Zoom
        if ( $(".product-image-slider").length ) {
            if ($(window).width() > 768) {
                $('.product-image-slider .slick-active img').elevateZoom({
                    zoomType: "inner",
                    cursor: "crosshair",
                    zoomWindowFadeIn: 500,
                    zoomWindowFadeOut: 750
                });
            }
        }
    };

    //Load functions
    $(document).ready(function () {
        productDetails();
    });

    $('.zoom-icon').on('click', function (e) {
        e.preventDefault();

        const images = $('.product-image-slider figure img').map(function () {
            return {
                src: $(this).attr('src'),
                type: 'image'
            };
        }).get();

        const currentIndex = $('.product-image-slider').slick('slickCurrentSlide') + 1;

        Fancybox.show(images, {
            startIndex: currentIndex,
            Thumbs: false,
            Toolbar: true
        });
    });


//    rating-select-js
    $(document).ready(function () {
    var selectedRating = 0;

    $('.form-rating i').on('click', function () {
        var rating = $(this).data('rating');

        if (rating === selectedRating) {
            $(this).parent().find('i').removeClass('selected');
            selectedRating = 0;
            console.log("Rating cleared");
        } else {

            $(this).parent().find('i').removeClass('selected');
            $(this).parent().find('i').each(function (index) {
                if (index < rating) {
                    $(this).addClass('selected');
                }
            });
            selectedRating = rating;
            console.log("Selected rating: " + rating);
        }

        $('#rating-value').val(selectedRating);
    });
});

//  hearder-search-suggestions-js
    $('.searchTerm').on('focus', function() {
        $('.suggestions').show();
    });
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.search').length) {
            $('.suggestions').hide();
        }
    });

});













