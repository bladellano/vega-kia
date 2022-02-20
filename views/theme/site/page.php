<?php $v->layout("theme/site/_theme"); ?>

<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?= buildBreadcrumb() ?>
        </ol>
    </nav>

</div>

<?php if (!empty($page->cover)) : ?>
    <div class="wrapInternalImage">
        <p><?=$page->title?></p>
        <img class="img-responsive" src="<?= SITE['root'] . DS . $page->cover ?>" alt="SEM IMAGEM">
    </div>
<?php endif; ?>

<div class="container page">

    <h1><?= $page->title ?></h1>
    <hr>
    <div class="content_page">

        <?= $page->content ?>

        <?php if (isset($showForm) && $typeForm == 'container') : ?>
            <br>
            <h1>PRÉ-AGENDAMENTO</h1>
            <hr>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <?php include($showForm) ?>
                </div>
                <div class="col-md-3"></div>
            </div>

            <hr>
        <?php endif; ?>

    </div>
</div>
<!-- ./container -->

<?php if (isset($showForm) && $typeForm == 'fluid') : ?>
    <?php include($showForm) ?>
<?php endif; ?>


<?php $v->start("scripts"); ?>
<script src="<?= asset("/js/jquery-ui.js"); ?>"></script>
<script src="<?= asset("/js/script.js"); ?>"></script>
<script src="<?= asset("/js/form.js"); ?>"></script>
<?php $v->end(); ?>