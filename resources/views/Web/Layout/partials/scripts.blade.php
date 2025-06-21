<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
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