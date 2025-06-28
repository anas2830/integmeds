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

    // Wishlist
    $(document).on('click', '#wishlist-btn', function(e) {
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

    // Add to Cart
    $(document).on('click', '#add-to-cart', function(e) {
        e.preventDefault();
        var product_id = $(this).data('product-id');        
        var quantity = $('.product-qty').val();

        $(this).prop('disabled', true).addClass('disabled').css('pointer-events', 'none');
        $('.spinner').removeClass('d-none');

        // Fallback to default quantity if none provided
        if (!quantity) {
            quantity = 1;
        }

        // Perform AJAX request
        $.ajax({
            url: '/cart',
            method: 'POST',
            data: {
                product_id: product_id,
                quantity: quantity,
                _token: "{{csrf_token()}}"
            },
            success: function(response) {
                console.log(response);
                
                if (response.status === 'success') {
                    $('.cart_count').text(response.cart_count);
                    $('#mini-cart-area').html(response.minicart);
                    $('#add-to-cart').prop('disabled', false).removeClass('disabled').css('pointer-events', '');
                    $('.spinner').addClass('d-none');
                    $('#cart-stock').html('<div class="product-cart-Btn"> <a href="#" class="btn-icon btn-add-cart product-type-simple" id="add-to-cart" data-product-id="'+product_id+'"> <i class="fas fa-spinner fa-spin me-2 d-none spinner"></i> <i class="icon-shopping-cart icon-bag"></i><span>ADD TO CART</span> </a> </div>')
                    showSuccessMessage(response.message);
                }else if(response.status === 'out-of-stock'){
                    $('#cart-stock-error').html('<div class="stock-out"> <i class="fa-solid fa-basket-shopping me-1"></i> <span>Product Out Of Stock</span> </div>')
                    $('#cart-stock').html('<div class="product-cart-Btn"> <a href="#" class="btn-icon btn-add-cart product-type-simple" id="add-to-cart" data-product-id="'+product_id+'"> <i class="fas fa-spinner fa-spin me-2 d-none spinner"></i> <i class="icon-shopping-cart icon-bag"></i><span>ADD TO CART</span> </a> </div> <div class="stock-out"> <i class="fa-solid fa-basket-shopping me-1"></i> <span>Product Out Of Stock</span> </div>')
                    $('#add-to-cart').prop('disabled', false).removeClass('disabled').css('pointer-events', '');
                    $('.spinner').addClass('d-none');
                }
                    else {
                    console.log('Failed to add product to cart.');
                }
            },
            error: function(xhr) {
                console.log('Something went wrong. Please try again.');
            }
        });
    });

    

</script>