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
                 <!-- general form elements -->
                 <div class="card card-primary">
                     <div class="card-header">
                         <h3 class="card-title">Formulário</h3>
                     </div>
                     <!-- /.card-header -->
                     <!-- form start -->

                     <?php if (isset($user->id)) : ?>
                         <form action="<?= SITE['root'] ?>/admin/users/update/<?= $user->id ?>" method="POST" autocomplete="off">
                         <?php else : ?>
                             <form action="<?= SITE['root'] ?>/admin/users/register" method="POST" autocomplete="off">
                             <?php endif; ?>

                             <div class="card-body">

                                 <div class="login_form_callback"> <?= flash(); ?></div>

                                 <div class="form-group">
                                     <label for="first_name">Primeiro nome</label>
                                     <input value="<?= isset($user->first_name) ? $user->first_name : "" ?>" type="text" class="form-control" id="first_name" name="first_name">
                                 </div>

                                 <div class="form-group">
                                     <label for="last_name">Último nome</label>
                                     <input value="<?= isset($user->last_name) ? $user->last_name : "" ?>" type="text" class="form-control" id="last_name" name="last_name">
                                 </div>

                                 <div class="form-group">
                                     <label for="email">E-mail</label>
                                     <input value="<?= isset($user->email) ? $user->email : "" ?>" type="email" class="form-control" id="email" name="email">
                                 </div>

                                 <div class="form-group">
                                     <label for="password">Senha</label>
                                     <input value="<?= isset($user->password) ? $user->password : "" ?>" type="password" class="form-control" id="password" name="password">
                                 </div>
                                 <!--  -->

                             </div>
                             <!-- /.card-body -->
                             <div class="card-footer">
                             <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>
                                 <?php if (isset($user->id)) : ?>
                                     <button type="submit" class="btn btn-primary">Alterar</button>
                                 <?php else : ?>
                                     <button type="submit" class="btn btn-primary">Cadastrar</button>
                                 <?php endif; ?>
                             </div>
                             </form>
                 </div>
                 <!-- /.card -->
             </div>
         </div>
         <!-- /.row -->
     </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->

 <?php $v->start("scripts"); ?>
 <script src="<?= asset("js/form.js"); ?>"></script>
 <?php $v->end(); ?>