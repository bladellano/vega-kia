<?php $v->layout("theme/admin/_theme"); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $title ?> - <?= $titleHeader ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= SITE['root'] ?>/admin">Home</a></li>
                    <li class="breadcrumb-item active"><?= $title ?> - <?= $titleHeader ?></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <!-- <div class="card-header">
                        <a href="<?= SITE['root'] ?>/admin/cars/create" class="btn btn-primary">Novo</a>
                    </div> -->
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Conteúdo</th>
                                    <th>Tipo</th>
                                    <th>Criado</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($leads as $l) : ?>
                                    <tr>
                                        <td><?= $l->id ?></td>
                                        <td><?= $l->name ?></td>
                                        <td><?= $l->email ?></td>
                                        <td><?= base64_decode($l->content)?></td>
                                        <td><?= mb_strtoupper( $l->type ) ?></td>
                                        <td><?= convertDatePtbr($l->created_at) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>

                </div>

            </div>
        </div> <!-- /.row -->
    </div>

</section>

<!-- /.content -->