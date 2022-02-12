<?php $v->layout("theme/site/_theme"); ?>

<!-- Flexslider -->
<div class="container_default">
    <div id="slider" class="flexslider">
        <ul class="slides">

            <?php foreach ($banners as $b) : ?>
                <li>
                    <img src="<?= $b->image ?>" />
                </li>
            <?php endforeach; ?>

        </ul>
    </div>

    <div class="custom-navigation">
        <a href="#" class="flex-prev">
            <img src="views/assets/site/images/left.png">
        </a>
        <a href="#" class="flex-next">
            <img src="views/assets/site/images/right.png">
        </a>
    </div>

    <div id="carousel" class="flexslider d-sm-none">
        <ul class="slides">

            <?php foreach ($banners as $b) : ?>
                <li>
                    <img src="<?= $b->image_thumb ?>" />
                </li>
            <?php endforeach; ?>

        </ul>
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
<section id="showroom">
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

                <div class="wrap_form">
                    <h3>Tenho interesse nesse modelo.</h3>
                    <h4>Faça uma cotação agora mesmo, para isso, preencha o formulário abaixo que entraremos em
                        contato rapidamente.</h4>
                    <p>*Campo obrigatórios</p>
                    <input type="text" placeholder="*Nome">
                    <input type="text" placeholder="*Email">
                    <input type="text" placeholder="*Serviço de interesse">
                    <input type="text" placeholder="Telefone">
                    <textarea name="" id="" cols="30" rows="4" placeholder="*Mensagem"></textarea>
                    <div class="row">
                        <div class="col-md-6">Financiamento:

                            <label class="interest-options">
                                <input type="radio" class="interest-options" name="financiamento" value="SIM">
                                <i class="fa fa-thumbs-o-up"></i>
                                <p>SIM</p>
                            </label>

                            <label class="interest-options">
                                <input type="radio" class="interest-options" name="financiamento" value="NÃO">
                                <i class="fa fa-thumbs-o-down"></i>
                                <p>NÃO</p>
                            </label>

                        </div>

                        <div class="col-md-6">
                            <p> Usar veículo usado como parte do pagamento? </p>

                            <label class="interest-options">
                                <input type="radio" class="interest-options" name="usar_veiculo_usado" value="SIM">
                                <i class="fa fa-thumbs-o-up"></i>
                                <p>SIM</p>
                            </label>

                            <label class="interest-options">
                                <input type="radio" class="interest-options" name="usar_veiculo_usado" value="NÃO">
                                <i class="fa fa-thumbs-o-down"></i>
                                <p>NÃO</p>
                            </label>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <p class="text-justify"><input type="checkbox" name="" id=""> Ao enviar esses dados,
                                declaro ciência que meus dados pessoais serão tratados
                                conforme a Política de Privacidade.</p>
                        </div>
                    </div>
                    <button class="btn btn-default btn-lg btn-block">Enviar mensagem</button>

                </div>
                <!-- End wrap_form -->

            </div>
        </div>
    </div>

</section>

<!-- Serviços -->
<section id="servicos" class="section_kia">
    <div class="container">
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