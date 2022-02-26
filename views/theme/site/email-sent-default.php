<div style="width: 500px; max-width: 100%; padding: 5px; font-family: 'Trebuchet MS', sans-serif; font-size: 1.2em; background-color:#E4E4E4; color:#000; border:1px solid #CCC">
    <img src="https://vegakia.com.br/views/assets/site/images/selo-pros-documentos.png" alt="VEGA|KIA" width="250px">
    <h2> <?= $data['typeForm'] ?> </h2>
    <hr>
    <h4>Olá! Eu sou o(a) <?= $data['nome'] ?>. <br />Estou tentando contato através do portal da <b>
            <?= SITE['root'] ?></b>.</h4>
    <?php foreach ($data as $k => $d) : ?>

        <?php if ($k != 'typeForm') : ?>
            <p><b><?= ucfirst(str_replace("_", " ", $k)) ?></b>: <?= $d ?></p>
        <?php endif; ?>

    <?php endforeach; ?>
    <p> <i>Atenciosamente, <?= $data['nome'] ?>.</i></p>
</div>