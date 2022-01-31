<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <link rel="stylesheet" href="<?= asset("css/flexslider.css", 'site'); ?>">
    <link rel="stylesheet" href="<?= asset("css/custom-flexslider.css", 'site'); ?>">

    <link rel="stylesheet" href="<?= asset("css/style.css", 'site'); ?>">
    <link rel="stylesheet" href="<?= asset("css/style-mobile.css", 'site'); ?>">
    <title>VEGA KIA | <?= $title ?></title>
    <link rel="icon" type="image/png" sizes="96x96" href="<?= asset("images/favicon.png", 'site'); ?>">
</head>

<body>

    <!--AJAX LOAD-->
    <div class="ajax_load">
        <div class="ajax_load_box">
            <div class="ajax_load_box_circle"></div>
            <div class="ajax_load_box_title">Aguarde, carregando!</div>
        </div>
    </div>

    <!-- Header -->
    <div class="header_info">
        <div class="container">
            <div class="container_header">
                <div style="text-align: left;">
                    <a href="<?= SITE['root'] ?>" style="text-decoration:none">
                        <img class="logo_vega" src="<?= asset("images/logo_vega_preto.png", 'site'); ?>" alt="LOGO_VEGA">
                        <img class="logo_kia" src="<?= asset("images/logo_kia.svg", 'site'); ?>" alt="LOGO_KIA">
                    </a>
                </div>
                <div style="width: 44%;">
                    <p class="btn d-sm-none"><i class="fa fa-map-marker"></i> BR, KM 1</p>
                </div>
                <div>
                    <a href="#" class="btn btn-success btn--success d-sm-none">COMPRE AGORA! <i class="fa fa-whatsapp"></i></a>
                </div>
                <div>
                    <a href="#" class="btn btn-default d-sm-none btn--dark"><i class="fa fa-phone-square"></i> 91 - 3245.2564
                    </a>
                </div>
                <div><input type="text" name="search" class="form-control d-sm-none"></div>
            </div>

        </div>
    </div>

    <!-- Navbar -->

    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">

                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            NOVOS <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">

                            <div class="sub_menu">

                                <?php foreach (getCarsMenu() as $car) : ?>

                                    <div class="col">
                                        <a href="<?= SITE['root'] . DS . "novos" . DS . $car->slug ?>">
                                            <img src="<?= SITE['root'] . DS . $car->imagem_thumb ?>" alt="<?= $car->nome_titulo ?>">
                                            <h4><?= $car->nome_titulo ?></h4>
                                        </a>
                                    </div>

                                <?php endforeach; ?>

                            </div>

                        </ul>
                    </li>

                    <li><a href="<?= SITE['root'] ?>/semi-novos">SEMI-NOVOS</a></li>

                    <li><a class="nav-link scroll" href="<?= SITE['root'] ?>/#servicos">PEÇA E ACESSÓRIOS</a></li>
                    <li><a class="nav-link scroll" href="<?= SITE['root'] ?>/#consorcio-seguros">CONSÓRCIO</a></li>
                    <li><a href=" #about">TEST DRIVE</a></li>
                    <li><a class="nav-link scroll" href="<?= SITE['root'] ?>/#servicos">AGENDAMENTO</a></li>
                    <li><a href="#about">VENDA DIRETA</a></li>
                    <li><a class="nav-link scroll" href="<?= SITE['root'] ?>/#vega-kia">SOBRE</a></li>
                    <li><a class="nav-link scroll" href="<?= SITE['root'] ?>/#showroom">FALE CONOSCO</a></li>
                    <li>
                        <a href="#" class="btn btn-success btn--success d-sm-block d-md-none">COMPRE AGORA! <i class="fa fa-whatsapp"></i></a>
                    </li>
                    <li>
                        <a href="#" class="btn btn-default btn--dark d-sm-block d-md-none"><i class="fa fa-phone-square"></i> 91 - 3245.2564
                        </a>
                    </li>
                    <li>
                        <input type="text" name="search" class="form-control d-sm-block d-md-none">
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>

    <?= $v->section("content"); ?>

    <!-- Localização -->
    <section id="localizacao" class="section_kia">
        <h2>Localização</h2>
        <hr>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d156238.78444678415!2d-48.43251937378271!3d-1.3165317458622527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x92a4f55eb3730de3%3A0x997334d1a788da76!2sVega%20Volkswagen!5e0!3m2!1spt-BR!2sbr!4v1641820185065!5m2!1spt-BR!2sbr" width="100%" height="380" frameborder="0" style="border:0;margin-bottom: -12px;" allowfullscreen="" aria-hidden="false" tabindex="0">
        </iframe>

    </section>

    <footer>
        <div class="container">
            <div class="row">

                <div class="col-md-3">

                    <img class="logo_vega" src="<?= asset("images/logo_vega_preto.png", 'site'); ?>" alt="LOGO_VEGA">
                    <img class="logo_kia" src="<?= asset("images/logo_kia.svg", 'site'); ?>" alt="LOGO_KIA">
                    <h4>Funcionamento:</h4>
                    <p>2ª a 6ª: 08h às 18h<br>
                        Sábado: 08h às 12h.
                    </p>
                    <h4>Localização:</h4>
                    <p>BR, KM 1.</p>
                    <h4>Redes Sociais:</h4>
                    <p class="icon_socials">
                        <a href="#"><img src="<?= asset("images/facebook.png", 'site'); ?>" alt="FACEBOOK"> </a>
                        <a href="#"><img src="<?= asset("images/instagram.png", 'site'); ?>" alt="INSTAGRAM"> </a>
                    </p>
                </div>
                <div class="col-md-3">
                    <div class="footer_menu_itens">
                        <h3>Modelos</h3>
                        <ul>
                            <li>Kia Stonic Hybrid</li>
                            <li>Kia Cerato</li>
                            <li>Kia Carnival</li>
                            <li>Kia Bongo</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer_menu_itens">
                        <h3>Site Map</h3>
                        <ul>
                            <li>Novos</li>
                            <li>Seminovos</li>
                            <li>Peças e acessórios</li>
                            <li>Consórcio</li>
                            <li>Test Drive</li>
                            <li>Agendamento</li>
                            <li>Venda Direta</li>
                            <li>Fale Conosco</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer_menu_itens">
                        <h3>Modelos</h3>
                        <ul class="modelos">
                            <li><b>Central de atendimento:</b></li>
                            <li>91 - 3025.3251</li>
                            <li><b>Whatsapp:</b></li>
                            <li>91 - 9.9854.2589</li>
                            <li><b>Agendamento:</b></li>
                            <li>91 - 3587.6583</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <img src="<?= asset("images/ibama.png", 'site'); ?>" alt="IBAMA">
                        No trânsito, dê sentido à vida.
                    </div>
                    <div class="col-md-6 text-right">© Copyright 2022 Grupo Vega. Todos os direitos reservados.</div>
                </div>
            </div>
        </div>

        <div class="container-fluid desenvolvido">
            <p class="text-center">Desenvolvido por Grupo Vega.</p>
        </div>

    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="<?= asset("js/jquery.flexslider.js", 'site'); ?>"></script>
    <script src="<?= asset("js/script.js", 'site'); ?>"></script>
</body>

</html>