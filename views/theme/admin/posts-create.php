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

                     <?php if (isset($post->id)) : ?>
                         <form action="<?= SITE['root'] ?>/admin/posts/update/<?= $post->id ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                         <?php else : ?>
                             <form action="<?= SITE['root'] ?>/admin/posts/register" method="POST" enctype="multipart/form-data" autocomplete="off">
                             <?php endif; ?>

                             <div class="card-body">

                                 <div class="login_form_callback"> <?= flash(); ?></div>

                                 <div class="form-group">
                                     <label for="title">Título</label>
                                     <input value="<?= isset($post->title) ? $post->title : "" ?>" type="text" class="form-control" id="title" name="title">
                                 </div>

                                 <div class="form-group">
                                     <label for="description">Descrição</label>
                                     <input value="<?= isset($post->description) ? $post->description : "" ?>" type="text" class="form-control" id="description" name="description">
                                 </div>

                                 <div class="form-group">
                                     <label for="content">Conteúdo</label>
                                     <textarea name="content" id="content" cols="30" rows="5" class="summernote"><?= isset($post->content) ? $post->content : "" ?></textarea>
                                 </div>

                                 <div class="form-group">
                                     <label for="type">Tipo</label>
                                     <select name="type" id="type" class="form-control">
                                         <option value="">--</option>
                                         <option value="post" <?=(isset($post->type) && $post->type == 'post') ? 'selected' :'' ?>>post</option>
                                         <option value="page" <?=(isset($post->type) && $post->type == 'page') ? 'selected' :'' ?>>page</option>
                                     </select>
                                 </div>
                                 <!--  -->

                             </div>
                             <!-- /.card-body -->
                             <div class="card-footer">
                             <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>
                                 <?php if (isset($post->id)) : ?>
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