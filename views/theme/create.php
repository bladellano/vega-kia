<?php $v->layout("theme/_theme"); ?>

<!--Aproveitando o mesmo formulário de criar para editar -->

<?php if (isset($product->id)) : ?>

    <form class="form-signin" action="<?= site() . "/produtos/update/" . $product->id  ?>" method="post" autocomplete="off" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?= $product->id ?>">

    <?php else : ?>

        <form class="form-signin" action="<?= site() . "/produtos/register" ?>" method="post" autocomplete="off" enctype="multipart/form-data">

        <?php endif; ?>

        <div class="login_form_callback"> <?= flash(); ?></div>

        <h3><?= $title ?></h3>

        <div class="form-group">
            <input value="<?= isset($product->name) ? $product->name : "" ?>" type="text" name="name" id="name" class="form-control" placeholder="Nome do Produto">
        </div>

        <div class="form-group">
            <input type="file" name="image" onchange="previewFile(this)">
            <img src="<?= isset($product->image) ? site() . DS . $product->image : asset('images/default-product.png') ?>" id="previewImg" alt="product image" />
        </div>


        <div class="form-group">
            <input value="<?= isset($product->description) ? $product->description : "" ?>" type="text" name="description" id="description" class="form-control" placeholder="Descrição do Produto">
        </div>

        <div class="form-group">
            <input value="<?= isset($product->price) ? $product->price : "" ?>" type="text" name="price" id="price" class="form-control money" placeholder="Preço">
        </div>

        <div class="form-group">
            <input value="<?= isset($product->amount) ? $product->amount : "" ?>" type="text" name="amount" id="amount" class="form-control" placeholder="Quantidade">
        </div>

        <div class="form-group text-center">
            <button class="btn btn-success btn--default">Salvar</button>
        </div>
        </form>

        <?php $v->start("scripts"); ?>
        <script src="<?= asset("/js/form.js"); ?>"></script>
        <?php $v->end(); ?>