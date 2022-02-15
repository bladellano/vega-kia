<div class="container-fluid bg-default contactUs">
    <div class="container">

        <form action="<?= SITE['root'] ?>/form/form-contact-us-submission" method="post">

            <div class="login_form_callback"> <?= flash(); ?></div>

            <input type="hidden" name="typeForm" value="Fale-conosco">

            <div class="row">
                <div class="col-md-12">
                    <h2>Fale Conosco</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <div class="row">

                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="nome" placeholder="Nome*">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="sobrebnome" placeholder="Sobrebnome*">
                        </div>

                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="cpf_cnpj" placeholder="CPF ou CNPJ*">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="telefone" placeholder="Telefone*">
                        </div>

                        <div class="form-group col-md-12">
                            <input type="email" class="form-control" name="email" placeholder="Email*">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control" name="assunto" placeholder="Assunto*">
                    </div>
                    <div class="form-group col-md-12">
                        <textarea name="mensagem" class="form-control" cols="30" rows="3" placeholder="Mensagem*"></textarea>
                    </div>
                </div>

                <div class="col-md-6">(*) campos obrigatórios</div>
                <div class="col-md-6">
                    <div class="col-md-6">
                        <p> Aceito receber comunicação via e-mail</p> <input type="checkbox" name="aceita_receber_email"> <br />
                        <p> Aceito receber comunicação via sms</p> <input type="checkbox" name="aceita_receber_sms">
                    </div>
                    <div class="col-md-6"><button class="btn btn-primary btn-sm pull-right">Enviar mensagem</button></div>
                </div>
            </div>

        </form>
    </div>

</div>