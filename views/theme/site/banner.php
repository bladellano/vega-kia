<?php $v->layout("theme/site/_theme"); ?>

<div class="container page">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?= buildBreadcrumb() ?>
        </ol>
    </nav>

    <h1><?= $banner->title ?></h1>
    <h5><?= $banner->description ?></h5>
    <hr>
    <div class="content_page">

        <img src="<?= SITE['root']. DS. $banner->image ?>" alt="SEM IMAGEM" class="img-responsive">

        <?= $banner->content ?>

    </div>
</div>
<!-- ./container -->

<?php $v->start("scripts"); ?>
<?php $v->end(); ?>