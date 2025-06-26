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

</script>