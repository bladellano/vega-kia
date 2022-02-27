<?php $v->layout("theme/site/_theme"); ?>

<!-- Flexslider -->
<div class="container_default">
    <div id="slider" class="flexslider">
        <ul class="slides">

            <?php foreach ($banners as $b) : ?>
                <li>
                    <a <?php if (empty($b->url)) : ?> href="<?= SITE['root'] . '/banner/' . $b->slug ?>" <?php else : ?> target="_blank" href="<?= $b->url ?>" <?php endif; ?>>
                        <img src="<?= $b->image ?>" />
                    </a>
                </li>
            <?php endforeach; ?>

        </ul>
    </div>

    <div class="custom-navigation">
        <a href="#" class="flex-prev">
            <img src="views/assets/site/images/seta-com-sombra.png">
        </a>
        <a href="#" class="flex-next">
            <img style="transform: rotateY(180deg);" src="views/assets/site/images/seta-com-sombra.png">
        </a>
    </div>

</div>

<!-- Vega-kia -->
<section id="vega-kia" class="section_kia">
    <div class="container">
        <h2>Vega Kia</h2>
        <hr>
        <h4>Com apenas um clique e conheça nossa linha de veículos e faça uma cotação. Vem que sai negócio!</h4>
    </div>
</section>

<!-- showroom -->
<section>
    <div class="container">

        <div class="wrapShowroom">
            <div class="col">

                <img class="imgLogoShowroom" src="https://cdn.autopapo.com.br/box/uploads/2021/01/06133133/novo-logo-da-kia-preto-em-fundo-branco.jpg" alt="">
                <h2>Veículos Novos</h2>

                <div class="wrapCardsCar">

                    <?php foreach ($cars as $c) : ?>

                        <div class="viewCar">
                            <h3><?= $c->nome_titulo ?></h3>
                            <p><?= $c->nome_subtitulo ?></p>
                            <a target="_blank" href="<?= SITE['root'] . '/novos/' . $c->slug ?>">
                            <img src="<?= $c->imagem_thumb ?>" alt="SEM IMAGEM">
                            </a>
                            <div>
                                <div class="openBox">
                                    <a target="_blank" href="<?= SITE['root'] . '/novos/' . $c->slug ?>"><i class="fa fa-plus-circle"></i>VER MAIS</a>
                                    <a href="#" class="btnScheduling"><i class="fa fa-car"></i>AGENDAR VISITA</a>
                                    <a href="#" class="btnScheduling"><i class="fa fa-hand-o-up"></i>QUERO ESSE</a>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

            <div class="col">
                <div class="wrapMoveableForm">
                    <?php include('form-contact-dark.php') ?>
                </div>
            </div>

        </div>
    </div>


</section>




<section id="showroom" style="display: none;">
    <div class="container">
        <div class="row">

            <div class="col-md-8">

                <div class="row">
                    <div class="col-md-4">

                        <div class="wrap_cards_car">

                            <ul>
                                <?php foreach ($cars as $c) : ?>
                                    <li class="btnShowCar" data-id-car="<?= $c->id ?>">
                                        <img class="img-responsive" src="<?= $c->imagem_thumb ?>" alt="SEM IMAGEM">
                                        <p><?= $c->nome_titulo ?></p>
                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="wrap_target_car">
                            <h2><?= $cars[0]->nome_titulo ?></h2>
                            <img class="img-responsive" src="<?= $cars[0]->imagem_thumb ?>" alt="">
                            <div class="itens_car">
                                <?= $cars[0]->descricao ?>
                            </div>

                            <a href="novos/<?= $cars[0]->slug ?>" class="btn btn-lg btn--veja--mais">Veja mais detalhes</a>

                        </div>

                    </div>
                </div>

            </div>

            <div class="col-md-4">

                <?php include('form-contact-dark.php') ?>

            </div>
        </div>
    </div>

</section>

<!-- Serviços -->
<section id="servicos" class="section_kia">

    <div class="container">

        <div class="wrapShowroom">
            <div class="col">
                <h2>Serviços - Agendamento online</h2>
                <hr>
                <p>Atendimento rápido com selo KIA e qualidade.</p>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card_services">
                            <img src="views/assets/site/images/servicos01.png" alt="">
                            <h3>Assitência técnica</h3>
                            <a href="<?= SITE['root'] ?>/assistencia-tecnica" class="btn btn-default btn-lg">Agende aqui</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card_services">
                            <img src="views/assets/site/images/servicos03.png" alt="">
                            <h3>Peças e acessórios</h3>
                            <a href="<?= SITE['root'] ?>/pecas-e-acessorios" class="btn btn-default btn-lg">Compre aqui</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card_services">
                            <img src="views/assets/site/images/servicos02.png" alt="">
                            <h3>Revisão preço fechado</h3>
                            <a href="<?= SITE['root'] ?>/revisao-preco-fechado" class="btn btn-default btn-lg">Agende aqui</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>

    <div class="container" style="display: none;">

        <h2>Serviços - Agendamento online</h2>
        <hr>
        <p>Atendimento rápido com selo KIA e qualidade.</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card_services">
                    <img src="views/assets/site/images/servicos01.png" alt="">
                    <h3>Assitência técnica</h3>
                    <a href="<?= SITE['root'] ?>/assistencia-tecnica" class="btn btn-default btn-lg">Agende aqui</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card_services">
                    <img src="views/assets/site/images/servicos03.png" alt="">
                    <h3>Peças e acessórios</h3>
                    <a href="<?= SITE['root'] ?>/pecas-e-acessorios" class="btn btn-default btn-lg">Compre aqui</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card_services">
                    <img src="views/assets/site/images/servicos02.png" alt="">
                    <h3>Revisão preço fechado</h3>
                    <a href="<?= SITE['root'] ?>/revisao-preco-fechado" class="btn btn-default btn-lg">Agende aqui</a>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Consorcio & Seguros -->
<section id="consorcio-seguros" class="section_kia">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card_consorcio_seguros consorcio" data-url="<?= SITE['root'] ?>/consorcio-kia">
                    <div class="legenda">
                        <h5>Consórcio KIA</h5>
                        <p>Com parcelas que cabem no seu bolso.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card_consorcio_seguros seguro" data-url="<?= SITE['root'] ?>/seguros">
                    <div class="legenda">
                        <h5>Seguros Vega Kia</h5>
                        <p>A melhor proposta para seu perfil.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>