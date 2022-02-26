<form action="<?= SITE['root'] ?>/form-submission" method="POST">

    <div class="wrap_form">
        <h3>Orçamento</h3>
        <h4>Receba seu orçamento rápido e fácil.</h4>
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

            <div class="col-md-12 text-left">

                <label>
                    <p> <input type="checkbox" name="usar_veiculo_usado"> Usar veículo usado como parte do pagamento? </p>
                </label>

                <label>
                    <p> <input type="checkbox" name="financiamento"> Financiamento</p>
                </label>

                <label>
                    <p><input type="checkbox" name="ciente"> Ao enviar esses dados, declaro ciência que meus dados pessoais serão tratados conforme a Política de Privacidade.</p>
                </label>

            </div>
        </div>

        <div class="login_form_callback"> <?= flash(); ?></div>

        <input type="hidden" name="typeForm" value="Orçamento">

        <button class="btn btn-default btn-lg btn-block">Enviar mensagem</button>

    </div>

</form>

<?php $v->start("scripts"); ?>
<script src="<?= asset("/js/jquery-ui.js"); ?>"></script>
<script src="<?= asset("/js/script.js"); ?>"></script>
<script src="<?= asset("/js/form.js"); ?>"></script>
<?php $v->end(); ?>