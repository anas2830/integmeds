
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
    // $(document).ready(function () {
    //     var swiper = new Swiper(".modal-slide-2", {
    //         spaceBetween: 10,
    //         slidesPerView: 4,
    //         spaceBetween: 10,
    //         loop: true,
    //         freeMode: true,
    //         watchSlidesProgress: true,
    //     });
    //     var swiper2 = new Swiper(".modal-slide-1", {
    //         spaceBetween: 10,
    //         loop: true,
    //         navigation: {
    //             nextEl: ".swiper-button-next",
    //             prevEl: ".swiper-button-prev",
    //         },
    //         thumbs: {
    //             swiper: swiper,
    //         },
    //     });
    // }); 

    // cart-plus-minus
    $(".quickview-cart-plus-minus").append('<div class="dec qtybutton">-</div><div class="inc qtybutton">+</div>');
    $(document).on("click", ".qtybutton", function () {
        var $button = $(this);
        var oldValue = parseFloat($button.parent().find("input").val());

        if ($button.text() == "+") {
            var newVal = oldValue + 1;
        } else {
            // Don't allow decrementing below 1
            if (oldValue > 1) {
                var newVal = oldValue - 1;
            } else {
                var newVal = 1;
            }
        }

        $button.parent().find("input").val(newVal);
    });

    $(document).on("change", ".qtybutton-input", function () {
        var val = parseInt($(this).val());
        if (isNaN(val) || val < 1) {
            $(this).val(1);
        }
    });
    // Restrict input to digits only and validate on input
    $(document).on("input", ".qtybutton-input", function () {
        let val = $(this).val().replace(/[^\d]/g, ''); // Remove non-digit characters
        $(this).val(val);
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
    $('.searchTerm').on('input', function () {
        console.log('input');
        let query = $(this).val();
        let url = $(this).data('url');
        if (query.length > 2) {
            $.ajax({
                url: url,
                method: "GET",
                data: { query: query },
                success: function (response) {
                    let html = '';
                    if (response.length > 0) {
                        $.each(response, function (i, product) {
                            html += `
                                <li>
                                    <a href="/product-details/${product.slug}">
                                        <div class="search-suggestions-items">
                                            <div class="search-sugge-items-img">
                                                <img class="img-fluid" src="${product.image_url}" alt="${product.product_name}">
                                            </div>
                                            <div class="search-sugge-items-title-price">
                                                <h5>${product.product_name}</h5>
                                                <div class="price-info">
                                                    <span class="sale-price">৳${product.sale_price}</span>
                                                    ${product.regular_price && product.regular_price != product.sale_price ? `<del class="regular-price">৳${product.regular_price}</del>` : ''}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            `;
                        });

                        if (response.length === 5) {
                            html += `
                                <li class="view-all-suggestion">
                                    <a href="/search?search=${encodeURIComponent(query)}">View all results</a>
                                </li> 
                            `;
                        }
                    } else {
                        html = `<li class="no-product-found"><p>No product found</p></li>`;
                    }

                    $('.suggestions').html(html).show();
                }
            });
        } else {
            $('.suggestions').hide();
        }
    });
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.search').length) {
            $('.suggestions').hide();
        }
    });
    $(document).ready(function () {
        $('#success-msg').fadeIn().delay(4000).fadeOut();
    });
});













