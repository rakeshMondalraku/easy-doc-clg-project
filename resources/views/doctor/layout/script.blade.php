<!-- Bootstrap core JavaScript-->
<script src="{{ asset('admin-assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('admin-assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('admin-assets/js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/jquery-loading-overlay/loadingoverlay.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
