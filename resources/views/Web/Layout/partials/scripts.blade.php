<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
    $(document).ready(function() {
    // Minus button
    $('.qtyminus').click(function(e) {
        e.preventDefault();
        var $input = $(this).siblings('input');
        var value = parseInt($input.val());
        var min = parseInt($input.attr('min'));

        if (value > min) {
            $input.val(value - 1).change();
        }
    });

    // Plus button
    $('.qtyplus').click(function(e) {
        e.preventDefault();
        var $input = $(this).siblings('input');
        var value = parseInt($input.val());
        var max = parseInt($input.attr('max'));

        if (value < max) {
            $input.val(value + 1).change();
        }
    });
});
</script>
<script src="{{asset('web_assets/common/js/main.js')}}"></script>

<script>
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
</script>