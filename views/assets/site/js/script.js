$(function () {

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
        // customDirectionNav: $(".custom-navigation_ a")
    });

    $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        // controlsContainer: $(".custom-controls-container"),
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