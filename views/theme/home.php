<?php $v->layout("theme/_theme"); ?>

<div class="login_form_callback">
    <?= flash(); ?>
</div>

<div class="row mb-4">
    <div class="col-md-12">

        <form action="">
            <div class="input-group input-group-sm">
                <input type="text" name="search" class="form-control" placeholder="Palavra-chave" value="<?= @$_REQUEST['search'] ?>">

                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default">Buscar</button>
                </div>
            </div>
        </form>
    </div>

</div>

<div class="row">

    <?php if (count($products)) : ?>

        <?php foreach ($products as $p) : ?>

            <div class="col-md-3 col-12 col-sm-6">
                <div class="card">
                    <img src="<?= isset($p->image) ? site() . DS . $p->image : asset('images/default-product.png') ?>" class="card-img-top" alt="<?= $p->name ?>">
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?= site() ?>/compra/<?= $p->id ?>"><?= substr($p->name, 0, 16) ?></a></h5>
                        <p class="card-text">R$ <?= money($p->price) ?></p>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

    <?php else : ?>

        <div class="col-md-12">
            <div class="alert alert-danger">Nenhum produto encontrado.</div>
        </div>

    <?php endif; ?>

</div>