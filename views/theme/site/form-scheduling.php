

<form class="formSchedulingSubmission" action="<?= SITE['root'] ?>/form-scheduling-submission" method="post">

    <div class="login_form_callback"> <?= flash(); ?></div>

    <input type="hidden" name="typeForm" value="Pré-agendamento">
    <div class="row">

        <div class="form-group col-md-4">
            <input type="text" class="form-control" name="nome" placeholder="Nome*">
        </div>
        <div class="form-group col-md-4">
            <input type="email" class="form-control" name="email" placeholder="E-mail*">
        </div>
        <div class="form-group col-md-4">
            <input type="text" class="form-control" name="telefone" placeholder="DDD + Fixo ou celular*">
        </div>
    </div>

    <div class="row">

        <div class="form-group col-md-4">
            <input type="text" class="form-control" name="quilometragem" placeholder="Quilometragem*">
        </div>
        <div class="form-group col-md-4">
            <input type="text" class="form-control" name="ano" placeholder="Ano*">
        </div>
        <div class="form-group col-md-4">
            <input type="text" class="form-control" name="placa" placeholder="Placa*">
        </div>
    </div>

    <div class="row">

        <div class="form-group col-md-12">
            <input type="text" class="form-control" name="modelo_e_versao" placeholder="Modelo e versão*">
        </div>

    </div>

    <div class="row">

        <div class="form-group col-md-12">
            <select name="servico" class="form-control">
                <option value="">Selecione o serviço</option>
                <option value="Veículos novos">Veículos novos</option>
                <option value="Teste Drive">Teste Drive</option>
                <option value="Veículos Seminovos">Veículos Seminovos</option>
                <option value="Peças e acessórios">Peças e acessórios</option>
                <option value="Serviços">Serviços</option>
            </select>
        </div>

    </div>

    <div class="row">

        <div class="form-group col-md-12">
            <textarea class="form-control" rows="5" name="observacoes" placeholder="Observações"></textarea>
        </div>

    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <button type="button" class="btn btn-primary btnSendForm">Enviar</button>
        </div>
    </div>
</form>