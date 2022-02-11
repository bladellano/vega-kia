/**
 * Script customizado para ADMINLTE
 * Caio Dellano em 25-01-2022
 */
$(function () {

    /**
     * Controla div de versões
     */

    $('body').delegate(".btnAddWrapVersion", "click", function (e) {
        e.preventDefault();

        let content = `
        <div class="row wrapVersions pb-2">

        <div class="form-group col-md-4">
            <label for="nome">Versão</label>
            <input type="text" class="form-control" id="nome" name="dataVersao[nome][]" placeholder="Ex.: E.473">
        </div>
        <div class="form-group col-md-4">
            <label for="ano">Ano</label>
            <input type="text" class="form-control" id="ano" name="dataVersao[ano][]" maxlength="4" placeholder="0000">
        </div>
        <div class="form-group col-md-4">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="dataVersao[modelo][]" maxlength="4" placeholder="0000">
        </div>
        <div class="form-group col-md-12">
            <label for="descricao">Principais características</label>
            <textarea name="dataVersao[descricao][]" cols="30" rows="5" class="summernoteVersion"></textarea>
        </div>
        <div class="col-md-12">
            <a href="#" class="btn btn-default btn-sm btnAddWrapVersion"><i class="fas fa-plus"></i></a>
            <a href="#" class="btn btn-default btn-sm btnRemoveWrapVersion"><i class="fas fa-minus"></i></a>
        </div
    </div>`;

        $('.wrapVersions:last').after(content);

        runSummernote('.wrapVersions:last textarea');
    });

    $('body').delegate(".btnRemoveWrapVersion", "click", function (e) {
        e.preventDefault();
        if ($('.wrapVersions').length > 1)
            $('.wrapVersions:last').remove()
    });


    /**
     * Seta os tipos de imagens para detalhes do carro.
     */
    $('.setTypeImage').change(function () {

        let title = $(this).parent().parent().parent().siblings().find('[name="title"]').val();
        let description = $(this).parent().parent().parent().siblings().find('[name="description"]').val();
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
    runSummernote();

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

function runSummernote(element = '.summernote', height = 350) {
    return $(element).summernote({
        height: height,
    });
}

