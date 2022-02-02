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
                         <a href="<?=SITE['root']?>/admin/users/create" class="btn btn-primary">Novo</a>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">

                     <div class="login_form_callback"> <?= flash(); ?></div>

                         <table class="table table-bordered">
                             <thead>
                                 <tr>
                                     <th style="width: 10px">#</th>
                                     <th>Usuário</th>
                                     <th>Último nome</th>
                                     <th>E-mail</th>
                                     <th>Criado</th>
                                     <th style="width: 60px"></th>
                                 </tr>
                             </thead>

                             <tbody>
                                 <?php foreach ($users as $u) : ?>

                                     <tr>
                                         <td><?= $u->id ?></td>
                                         <td><a href="users/edit/<?=$u->id?>"><?= $u->first_name ?></a></td>
                                         <td><?= $u->last_name ?></td>
                                         <td><?= $u->email ?></td>
                                         <td><?= convertDatePtbr($u->created_at)?></td>
                                         <td>
                                             <a href="users/edit/<?=$u->id?>" class="btn btn-default btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></a> 
                                             <a onclick="return confirm('Deseja realmente excluir este registro?')" href="users/delete/<?=$u->id?>" class="btn btn-default btn-sm" title="Excluir"><i class="fas fa-trash-alt"></i></a> 
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

