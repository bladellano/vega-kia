<div style="width: 500px; max-width: 100%; padding: 10px; font-family: 'Trebuchet MS', sans-serif; font-size: 1.2em;">
    <h4>Olá! Eu sou o(a) <?= $data['nome'] ?>. <br />Estou tentando contato através do portal da <b><?= SITE['root'] ?></b>.</h4>
    <p><b>Meu e-mail:</b> <?= $data['email'] ?></p>
    <p><b>Meu celular:</b> <?= $data['telefone'] ?></p>
    <p><b>Serviço de interesse:</b> <?= $data['servico_de_interesse'] ?></p>
    <p><b>Mensagem:</b> <?= $data['mensagem'] ?></b></p>
    <p> <i>Atenciosamente, <?= $data['nome'] ?>.</i></p>
</div>