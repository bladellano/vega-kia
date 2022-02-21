<?php $v->layout("theme/site/_theme"); ?>

<div class="container">

    <!-- Pop-up -->
    <div class="popup_wrap" style="display:none">
        <a class="closeBtn" href="#">
            <span class="fa fa-times"></span>
        </a>
        <div class="pop_con">
            <img src="" alt="SEM IMAGE">
            <dl>
                <dt>...</dt>
                <dd>...</dd>
            </dl>
        </div>
    </div>
    <!-- End - pop-up -->

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?= buildBreadcrumb() ?>
        </ol>
    </nav>

    <h2 class="title_car"><?= $car->nome_titulo ?></h2>
    <div class="row">
        <div class="col-md-8">

            <!-- Flexslider -->
            <div class="container_default">
                <div id="slider" class="flexslider cars hideFlexControlNav">
                    <ul class="slides">
                        <!-- Imagens do Carro -->

                        <?php foreach ($carImages as $c) : ?>
                            <li>
                                <img src="<?= SITE['root'] . DS . $c->imagem ?>" />
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div>

                <div class="custom-navigation">
                    <a href="#" class="flex-prev">
                        <img src="<?= SITE['root'] . DS ?>views/assets/site/images/seta-com-sombra.png">
                    </a>
                    <a href="#" class="flex-next">
                        <img style="transform: rotateY(180deg);" src="<?= SITE['root'] . DS ?>views/assets/site/images/seta-com-sombra.png">
                    </a>
                </div>

                <!-- <div id="carousel" class="flexslider d-sm-none">
                    <ul class="slides">

                        <?php foreach ($carImages as $c) : ?>
                            <li>
                                <img src="<?= SITE['root'] . DS . $c->imagem_thumb ?>" />
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div> -->

                <!-- <div class="nav-carousel">
                    <a href="#" class="btn flex-prev"><img src="<?= SITE['root'] . DS ?>views/assets/site/images/left.png"></a>
                    <a href="#" class="btn flex-next"><img src="<?= SITE['root'] . DS ?>views/assets/site/images/right.png"></a>
                </div> -->

            </div>

            <!-- Custom buttons -->
            <div class="row buttons_show_images_car">
                <div class="col-md-6"><a href="<?= SITE['root'] ?>/agende-seu-teste-drive" class="btn btn-default btn-block">
                        <img src="<?= SITE['root'] . DS ?>views/assets/site/images/steering-wheel.png" alt="SEM IMAGEM"> Agende seu <b>Teste Drive</b></a></div>
                <div class="col-md-6"><a href="<?= SITE['root'] ?>/avalie-seu-usado" class="btn btn-default btn-block">
                        <img src="<?= SITE['root'] . DS ?>views/assets/site/images/sedan-car-front.png" alt="SEM IMAGEM">Avalie seu <b>usado</b></a></div>
            </div>

        </div>
        <div class="col-md-4">
            <!-- Form de Contato -->
            <div id="tenho-interesse"></div>
            <?php include('form-contact-dark.php') ?>

        </div>
    </div>
</div>
<!-- /.container -->

<!-- BANNERS 1 -->
<div class="images_agrupadas">
    <div class="principal">
        <p><?= $buildImagesFront['FULL_BANNER_1']['titulo'] ?? '--' ?></p>
        <img src="<?= SITE('root') . DS . $buildImagesFront['FULL_BANNER_1']['imagem'] ?>" alt="SEM IMAGEM">
    </div>
    <div class="menores">
        <ul>
            <li class="openBtn" data-content="<?= $buildImagesFront['BANNER_1_1']['descricao'] ?? '--' ?>">
                <img src="<?= SITE('root') . DS . $buildImagesFront['BANNER_1_1']['imagem'] ?>" alt="SEM IMAGEM">
                <p><?= $buildImagesFront['BANNER_1_1']['titulo'] ?? '--' ?></p>
            </li>
            <li class="openBtn" data-content="<?= $buildImagesFront['BANNER_1_2']['descricao'] ?? '--' ?>">
                <img src="<?= SITE('root') . DS . $buildImagesFront['BANNER_1_2']['imagem'] ?>" alt="SEM IMAGEM">
                <p><?= $buildImagesFront['BANNER_1_2']['titulo'] ?? '--' ?></p>
            </li>
            <li class="openBtn" data-content="<?= $buildImagesFront['BANNER_1_3']['descricao'] ?? '--' ?>">
                <img src="<?= SITE('root') . DS . $buildImagesFront['BANNER_1_3']['imagem'] ?>" alt="SEM IMAGEM">
                <p><?= $buildImagesFront['BANNER_1_3']['titulo'] ?? '--' ?></p>
            </li>
        </ul>
    </div>
</div>

<hr>

<!-- Duas colunas/imagens -->
<div class="container">

    <div class="row">
        <div class="col-md-6">
            <div class="wrapImage">
                <img class="img-responsive two_columns" src="<?= SITE('root') . DS . $buildImagesFront['BANNER_COLUMN_1']['imagem'] ?>" alt="SEM IMAGEM">
            </div>
            <h3 class="titleColumnTwoDetailCar"><?= $buildImagesFront['BANNER_COLUMN_1']['titulo'] ?? '--' ?></h3>
            <p class="descriptionDetailCar">
                <?= $buildImagesFront['BANNER_COLUMN_1']['descricao'] ?? '--' ?>
            </p>
        </div>
        <div class="col-md-6">
            <div class="wrapImage">
                <img class="img-responsive two_columns" src="<?= SITE('root') . DS . $buildImagesFront['BANNER_COLUMN_2']['imagem'] ?>" alt="SEM IMAGEM">
            </div>
            <h3 class="titleColumnTwoDetailCar"><?= $buildImagesFront['BANNER_COLUMN_2']['titulo'] ?? '--' ?></h3>
            <p class="descriptionDetailCar">
                <?= $buildImagesFront['BANNER_COLUMN_2']['descricao'] ?? '--' ?>
            </p>
        </div>
    </div>
</div>

<hr>

<!-- BANNERS 2 -->
<div class="images_agrupadas">
    <div class="principal">
        <p><?= $buildImagesFront['FULL_BANNER_2']['titulo'] ?? '--' ?></p>
        <img src="<?= SITE('root') . DS . $buildImagesFront['FULL_BANNER_2']['imagem'] ?>" alt="SEM IMAGEM">
    </div>
    <div class="menores">
        <ul>
            <li class="openBtn" data-content="<?= $buildImagesFront['BANNER_2_1']['descricao'] ?? '--' ?>"><img src="<?= SITE('root') . DS . $buildImagesFront['BANNER_2_1']['imagem'] ?>" alt="SEM IMAGEM">
                <p><?= $buildImagesFront['BANNER_2_1']['titulo'] ?? '--' ?></p>
            </li>
            <li class="openBtn" data-content="<?= $buildImagesFront['BANNER_2_2']['descricao'] ?? '--' ?>"><img src="<?= SITE('root') . DS . $buildImagesFront['BANNER_2_2']['imagem'] ?>" alt="SEM IMAGEM">
                <p><?= $buildImagesFront['BANNER_2_2']['titulo'] ?? '--' ?></p>
            </li>
            <li class="openBtn" data-content="<?= $buildImagesFront['BANNER_2_3']['descricao'] ?? '--' ?>"><img src="<?= SITE('root') . DS . $buildImagesFront['BANNER_2_3']['imagem'] ?>" alt="SEM IMAGEM">
                <p><?= $buildImagesFront['BANNER_2_3']['titulo'] ?? '--' ?></p>
            </li>
        </ul>
    </div>
</div>

<hr>

<!-- UMA COLUNA -->
<div class="container">

    <div class="row">
        <div class="col-md-6">
            <div class="wrapImage">
                <img class="img-responsive two_columns" src="<?= SITE('root') . DS . $buildImagesFront['FULL_BANNER_COLUMN']['imagem'] ?>" alt="SEM IMAGEM">
            </div>
        </div>
        <div class="col-md-6">
            <h3 class="titleColumnDetailCar"><?= $buildImagesFront['FULL_BANNER_COLUMN']['titulo'] ?? '--' ?></h3>
            <p class="descriptionDetailCar">
                <?= $buildImagesFront['FULL_BANNER_COLUMN']['descricao'] ?? '--' ?>
            </p>
        </div>
    </div>
</div>

<hr>

<!-- BANNERS 3 -->
<div class="images_agrupadas">
    <div class="principal">
        <p><?= $buildImagesFront['FULL_BANNER_3']['titulo'] ?? '--' ?></p>
        <img src="<?= SITE('root') . DS . $buildImagesFront['FULL_BANNER_3']['imagem'] ?>" alt="SEM IMAGEM">
    </div>
    <div class="menores">
        <ul>
            <li class="openBtn" data-content="<?= $buildImagesFront['BANNER_3_1']['descricao'] ?? '--' ?>"><img src="<?= SITE('root') . DS . $buildImagesFront['BANNER_3_1']['imagem'] ?>" alt="SEM IMAGEM">
                <p><?= $buildImagesFront['BANNER_3_1']['titulo'] ?? '--' ?></p>
            </li>
            <li class="openBtn" data-content="<?= $buildImagesFront['BANNER_3_2']['descricao'] ?? '--' ?>"><img src="<?= SITE('root') . DS . $buildImagesFront['BANNER_3_2']['imagem'] ?>" alt="SEM IMAGEM">
                <p><?= $buildImagesFront['BANNER_3_2']['titulo'] ?? '--' ?></p>
            </li>
            <li class="openBtn" data-content="<?= $buildImagesFront['BANNER_3_3']['descricao'] ?? '--' ?>"><img src="<?= SITE('root') . DS . $buildImagesFront['BANNER_3_3']['imagem'] ?>" alt="SEM IMAGEM">
                <p><?= $buildImagesFront['BANNER_3_3']['titulo'] ?? '--' ?></p>
            </li>
        </ul>
    </div>
</div>

<!-- VERSÕES -->

<section id="vega-kia" class="section_kia">
    <div class="container">
        <h2>Versões</h2>
        <hr>

        <!-- Tabs -->
        <ul class="nav nav-tabs custom_car" role="tablist">

            <?php
            $i = 0;
            foreach ($versions as $v) : ?>
                <?php $active = $i == 0 ? "active" : ""; ?>
                <li class="nav-item <?= $active ?>">
                    <a class="nav-link <?= $active ?>" id="<?= str_replace(".", "", $v->nome) ?>-tab" data-toggle="tab" href="#<?= str_replace(".", "", $v->nome) ?>">
                        <?= $v->nome ?>
                    </a>
                </li>
            <?php $i++;
            endforeach; ?>

        </ul>

        <div class="tab-content">

            <?php
            $i = 0;
            foreach ($versions as $v) : ?>
                <?php $active = $i == 0 ? "active in" : ""; ?>
                <div class="tab-pane fade <?= $active ?>" id="<?= str_replace(".", "", $v->nome) ?>" role="tabpanel" aria-labelledby="<?= str_replace(".", "", $v->nome) ?>-tab">

                    <div class="content_tab">

                        <div class="row">
                            <div class="col-md-6">
                                <img class="img-responsive" src="<?= SITE['root'] . DS . $car->imagem ?>" alt="SEM IMAGEM">
                            </div>
                            <div class="col-md-6 text-left">

                                <div class="title_car_details"><?= $car->nome_titulo ?> <?= $v->nome ?></div>

                                <div class="sub_title_car">Ano <?= $v->ano ?>, Modelo <?= $v->modelo ?></div>

                                <div class="sub_title_car">Principais Características</div>

                                <?= $v->descricao ?>

                            </div>
                        </div>
                    </div>
                </div>

            <?php $i++;
            endforeach; ?>

        </div>

        <div class="row buttons_show_images_car">
            <div class="col-md-12">
                <a href="#tenho-interesse" class="btn btn-default btn-block nav-link scroll">
                    <img src="<?= SITE['root'] . DS ?>views/assets/site/images/key.png" alt="SEM IMAGEM">Tenho interesse
                </a>
            </div>
        </div>

    </div>
    <!-- ./container -->
</section>