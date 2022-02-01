<?php $v->layout("theme/site/_theme"); ?>

<div class="container page">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?= buildBreadcrumb() ?>
        </ol>
    </nav>

    <h1>Novos</h1>

    <ul>
        <?php foreach ($newsCars as $c) : ?>
            <li> <a href="<?= $_SERVER['REQUEST_URI'] . DS . $c->slug ?>"> <?= $c->nome_titulo ?> </a></li>
        <?php endforeach; ?>
    </ul>

</div>