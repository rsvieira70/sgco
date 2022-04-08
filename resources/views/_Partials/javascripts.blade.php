    <!-- REQUIRED SCRIPTS ---------------------------------------------->
    <!-- jQuery -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE/dist/js/adminlte.js?v=3.2.0') }}"></script>
    <!--    <script src="../../dist/js/demo.js"></script> --<
    <!-- dataTAbles ---------------------------------------------------->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                //              dom: 'Bfrtip',
                //              buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print' ],
                "language": {
                    "search": "Buscar",
                    "lengthMenu": "Mostrando _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(filtrado de _MAX_ registros no total)",
                    "decimal": ",",
                    "thousands": ".",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Seguinte",
                        "first": "Primeira",
                        "last": "Última"
                    }
                }
            });
        });
    </script>
    <!-- sweetalert ---------------------------------------------------->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>;
    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Você tem certeza?',
                text: "Você não será capaz de reverter esta ação!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, exclua-o!',
                cancelButtonText: 'não, cancele!'
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
                title: 'Alterado!',
                text: '{{ $reference }} alterado com sucesso!',
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
                title: 'Excluido!',
                text: '{{ $reference }} excluido com sucesso!',
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
                title: 'Incluido!',
                text: '{{ $reference }} incluido com sucesso!',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    @if (session('alert') == 'erro')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: '{{ $reference }} não foi encontrado!',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    <!-- mask ---------------------------------------------------------->
    <script src="{{ asset('AdminLTE/plugins/jquery-mask/jquery.mask.min.js') }}"></script>
    <script>
        $('.telefone').mask('(00) 0000-0000');
        $('.celular').mask('(00) 00000-0000');
        $('.cep').mask('00000-000');
        $('.cpf').mask('000.000.000-00');
        $('.cnpj').mask('00.000.000/0000-00');
        //$('.data').mask('00/00/0000');
        //$('.compe').mask('00/0000');
        $('.uf').mask('SS')
    </script>
