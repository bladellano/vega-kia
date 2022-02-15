<div style="width: 500px; max-width: 100%; padding: 10px; font-family: 'Trebuchet MS', sans-serif; font-size: 1.2em; background-color:#05141f; color:#fff">

    <h4>Olá! Eu sou o(a) <?= $data['nome'] ?>. <br />Estou tentando contato através do portal da <b><?= SITE['root'] ?> - <?= $data['typeForm'] ?></b>.</h4>

    <?php foreach ($data as $k => $d) : ?>

        <?php if ($k != 'typeForm') : ?>
            <p><b><?= ucfirst($k) ?></b>: <?= $d ?></p>
        <?php endif; ?>

    <?php endforeach; ?>

    <p> <i>Atenciosamente, <?= $data['nome'] ?>.</i></p>
</div>