$(document).ready(function () {
    $('#datatable').DataTable({
        columnDefs: [
            {
                target: 0,
                visible: false,
            }
        ],
        responsive: true,
        autoWidth: false,
        //      dom: 'Bfrtip',
        //      buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print' ],
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
