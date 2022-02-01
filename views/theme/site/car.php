<?php $v->layout("theme/site/_theme"); ?>

<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?=buildBreadcrumb()?>           
        </ol>
    </nav>

    <h2 class="title_car"><?= $car->nome_titulo ?></h2>
    <div class="row">
        <div class="col-md-8">

            <!-- Flexslider -->
            <div class="container_default">
                <div id="slider" class="flexslider">
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
                        <img src="<?= SITE['root'] . DS ?>views/assets/site/images/left.png">
                    </a>
                    <a href="#" class="flex-next">
                        <img src="<?= SITE['root'] . DS ?>views/assets/site/images/right.png">
                    </a>
                </div>

                <div id="carousel" class="flexslider d-sm-none">
                    <ul class="slides">

                        <?php foreach ($carImages as $c) : ?>
                            <li>
                                <img src="<?= SITE['root'] . DS . $c->imagem_thumb ?>" />
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div>

                <div class="nav-carousel">
                <a href="#" class="btn flex-prev"><img src="<?= SITE['root'] . DS ?>views/assets/site/images/left.png"></a>
                <a href="#" class="btn flex-next"><img src="<?= SITE['root'] . DS ?>views/assets/site/images/right.png"></a>
                 </div>

            </div>

            <!-- Custom buttons -->
            <div class="row buttons_show_images_car">
                <div class="col-md-6"><a href="<?=SITE['root']?>/agende-seu-teste-drive" class="btn btn-default btn-block">
                    <img src="<?= SITE['root'] . DS ?>views/assets/site/images/steering-wheel.png" alt=""> Agende seu <b>Teste Drive</b></a></div>
                <div class="col-md-6"><a href="<?=SITE['root']?>/avalie-seu-usado" class="btn btn-default btn-block">
                    <img src="<?= SITE['root'] . DS ?>views/assets/site/images/sedan-car-front.png" alt="">Avalie seu <b>usado</b></a></div>
            </div>

        </div>
        <div class="col-md-4">
            <!-- Form de Contato -->
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
        </div>
    </div>
</div>
<!-- /.container -->

<!-- Sua via com mais emoção -->
<div class="img_fluid_car">
    <img src="<?= asset("images/cerato/cerato01.jpg", "site") ?>" alt="TITULO">
    <div class="legend">Sua vida com mais emoção.</div>
</div>

<hr>

<!-- Duas colunas/imagens -->
<div class="container">

    <div class="row">
        <div class="col-md-6">
            <img class="img-responsive two_columns" src="<?= asset("images/cerato/cerato02.jpg", "site") ?>" alt="">
            <h3>Tecnologia dos espelhos retrovisores</h3>
            <p>
                Para agregar à tecnologia de ponta do sedan, o Kia Cerato 2.0 possui espelhos retrovisores externos com rebatimento e regulagem elétrica, setas integradas em LED e sistema anti-embaçamento.
            </p>
        </div>
        <div class="col-md-6">
            <img class="img-responsive two_columns" src="<?= asset("images/cerato/cerato03.jpg", "site") ?>" alt="">
            <h3>Porta-malas espaçoso</h3>
            <p>
                Com capacidade de 520 litros, o porta-malas do Kia Cerato 2.0 está entre os maiores do segmento, com espaço suficiente para acomodar as bagagens de toda a família ou grupo de amigos.

            </p>
        </div>
    </div>
</div>

<hr>

<!-- Interior -->

<div class="img_fluid_car">
    <img src="<?= asset("images/cerato/cerato04.jpg", "site") ?>" alt="TITULO">
    <div class="legend">Interior</div>
</div>

<hr>
<!-- Uma colunas/imagens -->
<div class="container">

    <div class="row">
        <div class="col-md-6">
            <img class="img-responsive" src="<?= asset("images/cerato/cerato05.jpg", "site") ?>" alt="">
        </div>
        <div class="col-md-6">
            <h3>Novo motor Nu-2 flex 2.0 L de 167 cv no etanol e 157 cv na gasolina.</h3>
            <p>
                O salto em tecnologia da nova geração do Kia Cerato 2.0 também se traduz em novo patamar de motorização. Sob o capô alongado do sedã está o motor Nu2 de quatro cilindros, 2.0 litros, flex, 16 válvulas. Com gasolina, o novo motor desenvolve até 157 cv a 6.200 rpm e torque de 19,2kgm a 4.700 rpm. Com etanol, a potência sobe para 167 cv a 6.200 rpm, com torque de 20,6 kgm a 4.700 rpm.
            </p>
        </div>
    </div>
</div>

<hr>

<!-- Segurança -->
<div class="img_fluid_car">
    <img src="<?= asset("images/cerato/cerato06.jpg", "site") ?>" alt="TITULO">
    <div class="legend">Segurança</div>
</div>

<!-- Versões -->

<section id="vega-kia" class="section_kia">
    <div class="container">
        <h2>Versões</h2>
        <hr>

        <!-- Tabs -->
        <ul class="nav nav-tabs custom_car" role="tablist">
            <li class="nav-item active">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#e473" role="tab" aria-controls="e473" aria-selected="true">E.473</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#e497" role="tab" aria-controls="e497" aria-selected="false">E.497</a>
            </li>
        </ul>

        <div class="tab-content">

            <div class="tab-pane fade active in" id="e473" role="tabpanel" aria-labelledby="e473-tab">

                <div class="content_tab">

                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-responsive" src="<?= SITE['root'] . DS . $car->imagem ?>" alt="">
                        </div>
                        <div class="col-md-6 text-left">

                            <div class="title_car_details">Cerato E.473</div>

                            <div class="sub_title_car">Ano 2021, Modelo 2022</div>

                            <div class="sub_title_car">Principais Características</div>

                            <li> Motor 2.0L Flex, 4 Cil, 16V, Dual CVVT, 167cv no etanol</li>
                            <li> Transmissão Automática de 6 velocidades com opção de trocas sequenciais</li>
                            <li> Ar-condicionado manual com filtro Antipólen</li>
                            <li> Saída de ar condicionado para o banco traseiro</li>
                            <li> Volante multifuncional com controle de som, computador de bordo e piloto automático</li>
                            <li> Escapamento com ponteira cromada</li>
                            <li> Espelhos retrovisores externos c/ regulagem elétrica</li>
                            <li> Assistente de partida em rampa – HAC</li>
                            <li> Câmera de ré com gráfico auxiliar de manobra e visor no sistema multimídia</li>
                            <li> Controle de Estabilidade – ESC</li>
                            <li> Controle de Tração – TCS</li>
                            <li> Luz diurna de navegação em LED (DRL)</li>
                            <li> Sensor de monitoramento de pressão dos pneus – TPMS</li>
                            <li> Sistema de condução Economy / Comfort</li>
                            <li> Sistema de condução "SPORT" nas trocas sequenciais</li>
                            <li> Sistema Multimídia, com tela de 8" sensível ao toque (Apple CarPlay e Android Auto)</li>

                        </div>
                    </div>
                </div>
                <!-- /.content_tab -->

            </div>
            <div class="tab-pane fade" id="e497" role="tabpanel" aria-labelledby="e497-tab">

                <div class="content_tab">

                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-responsive" src="<?= SITE['root'] . DS . $car->imagem ?>" alt="">
                        </div>
                        <div class="col-md-6 text-left">

                            <div class="title_car_details">Cerato E.497</div>

                            <div class="sub_title_car">Ano 2021, Modelo 2022</div>

                            <div class="sub_title_car">Principais Características</div>

                            <li> Motor 2.0L Flex, 4 Cil, 16V, Dual CVVT, 167cv no etanol</li>
                            <li> Transmissão Automática de 6 velocidades com opção de trocas sequenciais</li>
                            <li> Ar-condicionado automático digital Dual Zone com filtro Antipólen</li>
                            <li> Bancos com revestimento em Altaica</li>
                            <li> Bancos dianteiros com aquecimento em três níveis</li>
                            <li> Botão "Start/Stop" para partida do motor por reconhecimento da chave "Smart Key"</li>
                            <li> Chave "Smart Key" para travamento e abertura das portas e acionamento do alarme a distância</li>
                            <li> Paddle shift</li>
                            <li> Saída de ar condicionado para o banco traseiro</li>
                            <li> Volante multifuncional com controle de som, computador de bordo e piloto automático</li>
                            <li> Escapamento com ponteira cromada</li>
                            <li> Espelhos retrovisores externos c/ rebatimento e regulagem elétrica e setas integradas em LED</li>
                            <li> Lanternas de posicionamento dianteiras e traseiras em LED</li>
                            <li> Assistente de partida em rampa – HAC</li>
                            <li> Câmera de ré com gráfico auxiliar de manobra e visor no sistema multimídia</li>
                            <li> Controle de Estabilidade – ESC</li>
                            <li> Controle de Tração – TCS</li>
                            <li> Luz diurna de navegação em LED (DRL)</li>
                            <li> Sensor de monitoramento de pressão dos pneus – TPMS</li>
                            <li> Sistema de condução Economy/ Smart / Comfort</li>
                            <li> Sistema de condução "SPORT" nas trocas sequenciais</li>
                            <li> Sistema Multimidia, com tela de 8" sensível ao toque (Apple CarPlay e Android Auto)</li>
                        </div>
                    </div>
                </div>
                <!-- /.content_tab -->
            </div>

        </div>

        <div class="row buttons_show_images_car">
            <div class="col-md-12">
                <a href="#" class="btn btn-default btn-block"><img src="<?= SITE['root'] . DS ?>views/assets/site/images/key.png" alt="">Tenho interesse</a>
            </div>
        </div>

    </div>
    <!-- ./container -->
</section>