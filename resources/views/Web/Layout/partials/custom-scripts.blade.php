<script>
    $(document).on('click','#newsletterSubmit', function () {
        const email = $('#newsletterEmail').val();
        const token = $('input[name="_token"]').val();

        $('#newsletterMessage').html('');

        $.ajax({
            url: $('#newsletterForm').attr('action'),
            method: 'POST',
            data: {
                email: email,
                _token: token
            },
            success: function (response) {
                $('#newsletterMessage').html('<small class="text-success">' + response.message + '</small>');
                $('#newsletterForm')[0].reset();
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    if (errors.email) {
                        $('#newsletterMessage').html('<small class="text-danger">' + errors.email[0] + '</small>');
                    }
                } else {
                    $('#newsletterMessage').html('<small class="text-danger">Something went wrong. Please try again.</small>');
                }
            }
        });
    });

    function showSuccessMessage(message) {
        console.log('showSuccessMessage called with:', message);

        const html = `
        <div class="row">
          <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible fade show text-success p-2 small" role="alert">
              <span class="text-sm">
                <i class="fa-solid fa-circle-check me-1"></i> ${message}
              </span>
            </div>
          </div>
        </div>`;

        const $container = $('#success-msg');
        $container.stop(true, true).hide().html(html).fadeIn().delay(4000).fadeOut();
    }

    // Initialize Swiper for quick view modal
    function initQuickViewSwiper() {
        // new Swiper(".modal-slide-1", {
        //     slidesPerView: 1,
        //     spaceBetween: 10,
        //     navigation: {
        //         nextEl: ".swiper-button-next",
        //         prevEl: ".swiper-button-prev"
        //     },
        //     observer: true,              // ✅ new
        //     observeParents: true,        // ✅ new
        //     loop: false
        // });

        // new Swiper(".modal-slide-2", {
        //     slidesPerView: 4,
        //     spaceBetween: 10,
        //     breakpoints: {
        //         640: { slidesPerView: 4 },
        //         768: { slidesPerView: 4 },
        //         1024: { slidesPerView: 4 }
        //     },
        //     observer: true,              // ✅ new
        //     observeParents: true         // ✅ new
        // });

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
    }


    // quick view modal
    $(document).on('click', '.quick-view-btn', function (e) {
        e.preventDefault();
        let productId = $(this).data('id');

        $.ajax({
            url: '{{ route("product.quick.view") }}',
            method: 'GET',
            data: { id: productId },
            success: function (res) {
                $('#quick-view-modal').remove(); // remove any old modal
                $('#quick-view-container').html(res.html); // inject new modal
                const $modal = $('#quick-view-modal');
                $modal.modal('show');

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
            },
            error: function () {
                console.log(); ('Could not load quick view!');
            }
        });
    });

    $(document).on('click', '.wishlist-btn', function(e) {
        console.log('Wishlist button clicked');
        
        e.preventDefault();
        const $btn = $(this);
        const productId = $(this).data('prod-id');

        $.ajax({
            url: '{{ route("user.wishlist.add") }}',
            method: 'POST',
            data: {
                product_id: productId,
                _token: '{{ csrf_token() }}'
            },
            success: function(res) {
                showSuccessMessage(res.message);
                $btn.addClass('bg-success');
            },
            error: function(xhr) {
                
            }
        });
    });


</script>