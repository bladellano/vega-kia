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
                         <a href="<?=SITE['root']?>/admin/posts/create" class="btn btn-primary">Novo</a>
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
                                     <th>Slug</th>
                                     <th>Tipo</th>
                                     <th>Criado</th>
                                     <th>Atualizado</th>
                                     <th style="width: 70px"></th>
                                 </tr>
                             </thead>

                             <tbody>
                                 <?php foreach ($posts as $p) : ?>

                                     <tr>
                                         <td><?= $p->id ?></td>
                                         <td><a href="posts/edit/<?=$p->id?>"><?= $p->title ?></a></td>
                                         <td><?= $p->description ?></td>
                                         <td><?= $p->slug ?></td>
                                         <td><?= $p->type ?></td>
                                         <td><?= convertDatePtbr($p->created_at)?></td>
                                         <td><?= convertDatePtbr($p->updated_at)?></td>
                                         <td>
                                             <a href="posts/edit/<?=$p->id?>" class="btn btn-default btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></a> 
                                             <a onclick="return confirm('Deseja realmente excluir este registro?')" href="posts/delete/<?=$p->id?>" class="btn btn-default btn-sm" title="Excluir"><i class="fas fa-trash-alt"></i></a> 
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

