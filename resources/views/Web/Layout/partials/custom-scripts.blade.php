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
</script>