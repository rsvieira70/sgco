    <script src="https://kit.fontawesome.com/febf1463db.js" crossorigin="anonymous"></script>
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/dist/js/adminlte.js?v=3.2.0') }}"></script>
    <script src="{{ asset('jquery/jquery.several/jquery.selected.menu.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
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
    <script>
        $('.formReactivate').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '{{ $swalFormReactivateTitle }}',
                text: '{{ $swalFormReactivateText }}',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ $swalFormReactivateConfirmButtonText }}',
                cancelButtonText: '{{ $swalFormReactivateCancelButtonText }}'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        })
    </script>
    @yield('java-complement')
