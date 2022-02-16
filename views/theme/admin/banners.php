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
                    <div class="card-header">
                        <a href="<?=SITE['root']?>/admin/banners/create" class="btn btn-primary">Novo</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                    <div class="login_form_callback"> <?= flash(); ?></div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Título</th>
                                    <th>Descrição</th>
                                    <th>Imagem</th>
                                    <th>Ordem</th>
                                    <th>Criado</th>
                                    <th>Atualização</th>
                                    <th style="width: 60px"></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($banners as $b) : ?>

                                    <tr>
                                        <td><?= $b->id ?></td>
                                        <td><a href="banners/edit/<?=$b->id?>"><?= $b->title ?></a></td>
                                        <td><?= $b->description ?></td>
                                        <td> <img height="100" width="200" src="<?= SITE['root'].DS.$b->image_thumb ?>" alt="SEM IMAGEM"></td>
                                        <td style="text-align:center"> 
                                            <input 
                                                type="radio" name="changeOrder" 
                                                onChange='window.location.href = "<?=SITE['root']?>/admin/banners/change-order-banner/<?= $b->id ?>"'
                                            > 
                                        </td>
                                        <td><?= convertDatePtbr($b->created_at)?></td>
                                        <td><?= convertDatePtbr($b->updated_at)?></td>
                                        <td style="width:70px">
                                            <a href="banners/edit/<?=$b->id?>" class="btn btn-default btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></a> 
                                            <a onclick="return confirm('Deseja realmente excluir este registro?')" href="banners/delete/<?=$b->id?>" class="btn btn-default btn-sm" title="Excluir"><i class="fas fa-trash-alt"></i></a> 
                                        </td>
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

