
$(function () {

    /**
     * Aplica máscara para formato monetário
     */

    // $('.money').mask('#.##0,00', { reverse: true });

    // $('.toggle-one').bootstrapToggle({
    //     on: 'Sim',
    //     off: 'Não'
    // });
    
});

/**
 * FUNCTIONS
 */

function toggleStatus(e) {

    let status = $(e).is(':checked') ? 1 : 0;
    let id = $(e).data('id');

    $.ajax({
        type: "POST",
        url: "produtos/toggle_status",
        data: { id, status },
        dataType: "json",

        beforeSend: function (load) {
            ajax_load("open");
        },
        success: function (su) {

            if (su.message) {
                let view = '<div class="message ' + su.message.type + '">' + su.message.message + '</div>';
                $(".login_form_callback").html(view);
                $(".message").effect("bounce");
                return;
            }

            if (su.redirect) {
                window.location.href = su.redirect.url;
            }
        },
        complete: function () {
            ajax_load("close");
        }
    });

}

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