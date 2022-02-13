<form action="<?= SITE['root'] ?>/send-form-contact_" method="POST">

    <div class="wrap_form">
        <h3>Tenho interesse nesse modelo.</h3>
        <h4>Faça uma cotação agora mesmo, para isso, preencha o formulário abaixo que entraremos em
            contato rapidamente.</h4>
        <p>*Campo obrigatórios</p>
        <input type="text" placeholder="*Nome" name="nome">
        <input type="text" placeholder="*E-mail" name="email">
        <select name="servico_de_interesse" id="" class="form-control">
            <option value="">--Selecione--</option>
            <option value="Veículos Novos">Veículos Novos</option>
            <option value="Veículos Seminovos">Veículos Seminovos</option>
            <option value="Peças e acessórios">Peças e acessórios</option>
            <option value="Serviços">Serviços</option>
        </select>
        <input type="text" placeholder="Telefone" name="telefone">
        <textarea name="mensagem" id="" cols="30" rows="4" placeholder="*Mensagem"></textarea>
        <div class="row">
            <div class="col-md-6">Financiamento:

                <label class="interest-options">
                    <input type="radio" class="interest-options" name="financiamento" value="SIM" checked>
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
                    <input type="radio" class="interest-options" name="usar_veiculo_usado" value="SIM" checked>
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

                <p class="text-justify"><input type="checkbox" name="ciencia" id=""> Ao enviar esses dados,
                    declaro ciência que meus dados pessoais serão tratados
                    conforme a Política de Privacidade.</p>
            </div>
        </div>

        <div class="login_form_callback"> <?= flash(); ?></div>

        <button class="btn btn-default btn-lg btn-block">Enviar mensagem</button>

    </div>

</form>

<?php $v->start("scripts"); ?>
<script src="<?= asset("/js/jquery-ui.js"); ?>"></script>
<script src="<?= asset("/js/script.js"); ?>"></script>
<script src="<?= asset("/js/form.js"); ?>"></script>
<?php $v->end(); ?>