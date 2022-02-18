$(function () {

    $("form:not([disable-ajax-form])").submit(function (e) {
        e.preventDefault();

        let form = $(this);
        let action = form.attr("action");
        let formdata = new FormData(form[0]);
        let method = form.attr("method");

        $.ajax({
            url: action,
            data: formdata,
            type: method,
            dataType: "json",

            processData: false,
            contentType: false,

            beforeSend: function (load) {
                ajax_load("open");
            },
            success: function (su) {
                ajax_load("close");

                if (su.message) {
                    let view = '<div class="message ' + su.message.type + '">' + su.message.message + '</div>';
                    $(".login_form_callback").html(view);
                    $(".message").effect("bounce");
                    $('form').each((i,e)=>{
                        e.reset()
                    });
                    return;
                }

                if (su.redirect) {
                    window.location.href = su.redirect.url;
                }
            }
        });

    });

});


