<?php $v->layout("theme/_theme"); ?>

<div class="login_form_callback"> <?= flash(); ?></div>

<form action="<?= site() . "/comprado/" . $product->id  ?>">

    <div class="row">

        <div class="col-md-6">
            <img class="img-fluid" src="<?= site() . DS . $product->image ?>" alt="<?= $product->name ?>">
        </div>
        <div class="col-md-6">

            <div class="row">
                <div class="col-md-6">
                    <h3><?= $product->name ?></h3>
                </div>
                <div class="col-md-6 ">
                    <h4 class="text-muted text-right">R$ <?= money($product->price) ?></h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p class="text-justify"><?= $product->description ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php if ($product->amount) : ?>
                        <button class="btn btn-success btn-lg btn--default">Comprar</button>
                    <?php else : ?>
                        <button class="btn btn-default btn-lg disabled--buy--button">Produto esgotado</button>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 text-right text-muted small">
                Disponível: <?=$product->amount?>
                </div>
            </div>

        </div>
</form>
</div>

<?php $v->start("scripts"); ?>
<script src="<?= asset("/js/form.js"); ?>"></script>
<?php $v->end(); ?>