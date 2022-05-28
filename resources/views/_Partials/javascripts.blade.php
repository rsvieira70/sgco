    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/dist/js/adminlte.js?v=3.2.0') }}"></script>
    <script src="{{ asset('jquery/jquery.several/jquery.selected.menu.js') }}"></script>

    @yield("java-complement")

    <!-- sweetalert ---------------------------------------------------->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>;

    <script>
        $('.formDelete').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '{{ $swalFormDeleteTitle }}',
                text: '{{ $swalFormDeleteText }}',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ $swalFormDeleteConfirmButtonText }}',
                cancelButtonText: '{{ $swalFormDeleteCancelButtonText }}'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        })
    </script>
    <script>
        $('.formSuspend').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '{{ $swalFormSuspendTitle }}',
                text: '{{ $swalFormSuspendText }}',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ $swalFormSuspendConfirmButtonText }}',
                cancelButtonText: '{{ $swalFormSuspendCancelButtonText }}'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        })
    </script>
    @if (session('alert') == 'update-ok')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ $swalUpdateTitle }}!',
                text: '{{ $reference }} {{ $swalUpdateText }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    @if (session('alert') == 'destroy-ok')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ $swalDeleteTitle }}!',
                text: '{{ $reference }} {{ $swalDeleteText }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    @if (session('alert') == 'store-ok')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ $swalIncludedTitle }}!',
                text: '{{ $reference }} {{ $swalIncludedText }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    @if (session('alert') == 'errors')
        <script>
            Swal.fire({
                icon: 'error',
                title: '{{ $swalErrorTitle }}!',
                text: '{{ $swalErrorText }}',
                footer: '{{ $swalErrorfooter }}!'
            })
        </script>
    @endif
