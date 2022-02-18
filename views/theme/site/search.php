<?php $v->layout("theme/site/_theme"); ?>

<div class="container page">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?= buildBreadcrumb() ?>
        </ol>
    </nav>

    <h1><?= $title ?></h1>
    <hr>
    <div class="content_page">

        <table class="table table-light">
            <tbody>
                <tr>
                    <td style="width:25%">Título</td>
                    <td>Descrição</td>
                </tr>

                <?php foreach ($result as $r) : ?>

                    <tr>
                        <td><a href="#" data-id="<?= $r->id ?>" data-slug="<?= $r->slug ?>"> &bull; <?= $r->title ?></a></td>
                        <td><a href="#" data-id="<?= $r->id ?>" data-slug="<?= $r->slug ?>"><?= $r->description ?></a></td>
                    </tr>

                <?php endforeach; ?>

            </tbody>
        </table>


    </div>
</div>
<!-- ./container -->

<?php $v->start("scripts"); ?>
<?php $v->end(); ?>