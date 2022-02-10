/**
 * Script customizado para ADMINLTE
 * Caio Dellano em 25-01-2022
 */
$(function () {

    /**
     * Seta os tipos de imagens para detalhes do carro.
     */
    $('.setTypeImage').change(function () {

        let title = $(this).parent().prev().prev().find('[name="title"]').val();
        let description = $(this).parent().prev().find('[name="description"]').val();
        let id = $(this).data('id');
        let type = $(this).val();

        $.ajax({
            type: "POST",
            url: "/admin/cars/set-type-image",
            data: { id, type, title, description },
            dataType: "JSON",
            beforeSend: function () {
                ajax_load('open');
            },
            success: function (su) {
                if (su.success)
                    ajax_load('close');
            }
        })
    });

    //Máscaras
    $('#valor').mask('#.##0,00', { reverse: true });
    $('#quilometragem').mask('#.##0.000', { reverse: true });

    //Input File    
    bsCustomFileInput.init();

    //Editor 
    $('.summernote').summernote({
        height: 450,
    });

    /**
     * Datatables para tabelas que possuirem a class .table
     */
    $('.table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "order": [[0, "desc"]],
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "oLanguage": {
            "sProcessing": "<img src='../../../../images/loading.gif'></img>",
            "sZeroRecords": "Nada encontrado, desculpe",
            "sLengthMenu": "Mostrar _MENU_ itens por p&aacute;gina",
            "sInfo": "Mostrando de _START_ &aacute; _END_ de _MAX_",
            "sInfoEmpty": "Nenhum registro encontrado",
            "sInfoFiltered": "(filtrado de _MAX_ registros)",
            "sSearch": "Pesquisar:",
            "oPaginate": {
                "sNext": "Pr&oacute;xima",
                "sPrevious": "Anterior",
                "sLast": "&Uacute;ltima",
                "sFirst": "Primeira"
            }
        }
    });
});

// FUNCTIONS
function ajax_load(action) {
    ajax_load_div = $(".ajax_load");

    if (action === "open") {
        ajax_load_div.fadeIn(200).css("display", "flex");
    }

    if (action === "close") {
        ajax_load_div.fadeOut(200);
    }
}

function previewFile(e) {

    let file = $(e).get(0).files[0];

    if (file) {
        let reader = new FileReader();
        reader.onload = function () {
            $('#previewImg').attr('src', reader.result).fadeIn();
        }
        reader.readAsDataURL(file);
    }
}

