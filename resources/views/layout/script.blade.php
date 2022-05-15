<script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
<script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('js/ajax-form.js') }}"></script>
<script src="{{ asset('js/waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('js/scrollIt.js') }}"></script>
<script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/nice-select.min.js') }}"></script>
<script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/gijgo.min.js') }}"></script>
<!--contact js-->
<script src="{{ asset('js/contact.js') }}"></script>
<script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/mail-script.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/jquery-form/jquery.form.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/jquery-loading-overlay/loadingoverlay.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/toastr/toastr.min.js') }}"></script>

<script src="{{ asset('js/main.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#login-form').ajaxForm({
    resetForm: true,
    beforeSubmit: function() {
        $('#add-error-message').html('');
        $('#login-modal').LoadingOverlay('show');
    },
    success: function(response) {
        location.href="{{ route('patient.profile')}}";
    },
    error: function(response) {
        $('#login-modal').LoadingOverlay('hide');
        const errors = response.responseJSON;
        let errorsHtml = '<div class="alert alert-danger"><ul>';

        if (response.status == 422) {
            $.each(errors.errors, function(k, v) {
                errorsHtml += '<li>' + v + '</li>';
            });
        } else {
            errorsHtml += '<li>' + errors.message + '</li>';
        }

        errorsHtml += '</ul></di>';

        $('#add-error-message').html(errorsHtml);
    },
    });


</script>