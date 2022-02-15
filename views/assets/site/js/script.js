$(function () {




    /** Agendamento */
    $('#btnScheduling').click(function (e) {
        e.preventDefault();
        $('#preAgendamento').modal();
    });

    $('.btnSendForm').click(function (e) {
        $(this.form).submit();
    });

    /**
     * Exibe os detalhes do carro na página inicial com o click
     */

    $('.btnShowCar').click(function (e) {

        let idCar = e.currentTarget.dataset.idCar;

        $.ajax({
            type: "GET",
            url: `/get-car-home/${idCar}`,
            dataType: "JSON",
            success: function (su) {

                if (su.id) {

                    $('.wrap_target_car h2').text(su.nome_titulo);
                    $('.wrap_target_car img').attr('src', su.imagem_thumb);
                    $('.wrap_target_car .itens_car').html(su.descricao);
                    $('.wrap_target_car a').attr('href', `novos/${su.slug}`);
                }

            }
        });

    });

    /**
     * Botão para abrir/fechar o pop-up
     * Popula o pop-up com informação do carro
     */
    document.addEventListener('keydown', function (event) {
        if (event.key == "Escape") {
            $('.popup_wrap').fadeOut();
        }
    });

    $('.closeBtn').click(function (e) {
        e.preventDefault();
        $(this).parent().fadeOut();
    });

    $('.openBtn').click(function () {

        let title = $(this).find('p').text();
        let content = $(this).data('content');
        let image = $(this).find('img')[0].src;

        $('.pop_con img').attr('src', image);
        $('.pop_con dl dt').text(title);
        $('.pop_con dl dd').text(content);

        $('.popup_wrap').fadeIn();
    });


    /* Exibição do botão topo */
    $(window).scroll(function (e) {

        if ($(this).scrollTop() - 1000 > 0) {
            $('.topo').fadeIn();
        } else {
            $('.topo').fadeOut();
        }
    });

    $('.topo').click(function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 500)
    });

    /** Custom clicked button front */
    $('.card_consorcio_seguros.consorcio').click(function (e) {
        window.location.href = e.target.dataset.url;
    });

    $('.card_consorcio_seguros.seguro').click(function (e) {
        window.location.href = e.target.dataset.url;
    });

    // The slider being synced must be initialized first
    $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 180,
        itemMargin: 5,
        asNavFor: '#slider',
        customDirectionNav: $(".nav-carousel a"),
    });

    $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        customDirectionNav: $(".custom-navigation a")

    });

    // Scroll page

    var scrollLink = $('.scroll');

    scrollLink.click(function (e) {
        if (!$(this.hash).length)/* Retorna ao index se não encontrar ids */
            return location.href = location.href.match(/^http.*?.\w\//m)[0];

        e.preventDefault();

        $('body,html').animate({//this.hash - pega o valor do atributo id
            scrollTop: $(this.hash).offset().top
        }, 220)
    });

    //Fixa navbar
    const navbar = document.querySelector('nav.navbar');
    const headerHeight = document.querySelector('.header_info').offsetHeight;
    window.onscroll = () => {
        if (window.pageYOffset > headerHeight && window.screen.width > 576) {
            navbar.classList.add('navbar-fixed-top');
        } else {
            navbar.classList.remove('navbar-fixed-top');
        }
    }

});