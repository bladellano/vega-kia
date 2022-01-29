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

                     <?php if (isset($car->id)) : ?>
                         <form action="<?= SITE['root'] ?>/admin/cars/update/<?= $car->id ?>" method="POST" enctype="multipart/form-data">
                         <?php else : ?>
                             <form action="<?= SITE['root'] ?>/admin/cars/register" method="POST" enctype="multipart/form-data">
                             <?php endif; ?>

                             <div class="card-body">

                                 <div class="login_form_callback"> <?= flash(); ?></div>

                                 <!--  -->
                                 <div class="row">
                                     <div class="form-group col-md-4">
                                         <label for="nome_titulo">Título</label>
                                         <input value="<?= isset($car->nome_titulo) ? $car->nome_titulo : "" ?>" type="text" class="form-control" id="nome_titulo" name="nome_titulo">
                                     </div>

                                     <div class="form-group col-md-4">
                                         <label for="nome_subtitulo">Subtítulo</label>
                                         <input value="<?= isset($car->nome_subtitulo) ? $car->nome_subtitulo : "" ?>" type="text" class="form-control" id="nome_subtitulo" name="nome_subtitulo">
                                     </div>

                                     <div class="form-group col-md-4">
                                         <label for="id_modelo">Modelo</label>
                                         <select name="id_modelo" id="id_modelo" class="form-control">
                                             <option value="">--</option>
                                             <?php foreach ($modelos as $m) : ?>
                                                 <option value="<?= $m->id ?>" <?= (isset($car->id_modelo) && $car->id_modelo == $m->id) ? 'selected' : '' ?>><?= $m->nome ?></option>
                                             <?php endforeach ?>
                                         </select>
                                     </div>

                                     <!-- <div class="form-group col-md-6">
                                         <label for="versao">Versão</label>
                                         <input value="<?= isset($car->versao) ? $car->versao : "" ?>" type="text" class="form-control" id="versao" name="versao" placeholder="Ex.: E.473">
                                     </div> -->
                                 </div>

                                 <div class="form-group">
                                     <label for="descricao">Descrição</label>
                                     <textarea name="descricao" id="descricao" cols="30" rows="5" class="summernote"><?= isset($car->descricao) ? $car->descricao : "" ?></textarea>
                                 </div>

                                 <!--  -->
                                 <div class="row">

                                     <div class="form-group col-md-6">
                                         <label for="quilometragem">Quilometragem</label>
                                         <input value="<?= isset($car->quilometragem) ? $car->quilometragem : "" ?>" type="text" class="form-control" id="quilometragem" name="quilometragem">
                                     </div>

                                     <div class="form-group col-md-6">
                                         <label for="cambio">Cambio</label>
                                         <select name="cambio" id="cambio" class="form-control">
                                             <option value="">--</option>
                                             <option <?= (isset($car->cambio) && $car->cambio == 'MECANICA OU MANUAL') ? 'selected' : '' ?> value="MECANICA OU MANUAL">MECANICA OU MANUAL</option>
                                             <option <?= (isset($car->cambio) && $car->cambio == 'AUTOMATIZADA, SEMIAUTOMATICO OU SEQUENCIAL') ? 'selected' : '' ?> value="AUTOMATIZADA, SEMIAUTOMATICO OU SEQUENCIAL">AUTOMATIZADA, SEMIAUTOMATICO OU SEQUENCIAL</option>
                                             <option <?= (isset($car->cambio) && $car->cambio == 'AUTOMATICO') ? 'selected' : '' ?> value="AUTOMATICO">AUTOMÁTICO</option>
                                             <option <?= (isset($car->cambio) && $car->cambio == 'CVT') ? 'selected' : '' ?> value="CVT">CVT</option>
                                             <option <?= (isset($car->cambio) && $car->cambio == 'AUTOMATIZADA DE DUPLA EMBREAGEM') ? 'selected' : '' ?> value="AUTOMATIZADA DE DUPLA EMBREAGEM">AUTOMATIZADA DE DUPLA EMBREAGEM</option>
                                         </select>
                                     </div>

                                     <div class="form-group col-md-6">
                                         <label for="cor">Cor</label>
                                         <input type="color" class="form-control form-control-color" id="cor" name="cor" value="<?= isset($car->cor) ? $car->cor : "" ?>" title="Selecione uma cor">
                                     </div>

                                     <div class="form-group col-md-6">
                                         <label for="id_combustivel">Combustível</label>
                                         <select name="id_combustivel" id="id_combustivel" class="form-control">
                                             <option value="">--</option>
                                             <?php foreach ($combustiveis as $c) : ?>
                                                 <option value="<?= $c->id ?>" <?= (isset($car->id_combustivel) && $car->id_combustivel == $c->id) ? 'selected' : '' ?>><?= $c->nome ?></option>
                                             <?php endforeach ?>
                                         </select>
                                     </div>

                                 </div>

                                 <!--  -->
                                 <div class="row">

                                     <div class="form-group col-md-4">
                                         <label for="valor">Valor</label>
                                         <input value="<?= isset($car->valor) ? $car->valor : "" ?>" type="text" class="form-control" id="valor" name="valor">
                                     </div>

                                     <!-- Chaves Estrangeiras -->
                                     <div class="form-group col-md-4">
                                         <label for="id_cidade">Cidade</label>
                                         <select name="id_cidade" id="id_cidade" class="form-control">
                                             <option value="">--</option>
                                             <?php foreach ($cidades as $c) : ?>
                                                 <option value="<?= $c->id ?>" <?= (isset($car->id_cidade) && $car->id_cidade == $c->id) ? 'selected' : '' ?>><?= $c->nome ?></option>
                                             <?php endforeach ?>

                                         </select>
                                     </div>

                                     <div class="form-group col-md-4">
                                         <label for="id_unidade_loja">Loja</label>
                                         <select name="id_unidade_loja" id="id_unidade_loja" class="form-control">
                                             <option value="">--</option>

                                             <?php foreach ($unidadesLojas as $u) : ?>
                                                 <option value="<?= $u->id ?>" <?= (isset($car->id_unidade_loja) && $car->id_unidade_loja == $u->id) ? 'selected' : '' ?>><?= $u->nome ?></option>
                                             <?php endforeach ?>

                                         </select>
                                     </div>

                                 </div>

                                 <div class="form-group">
                                     <label for="content">Imagem do Carro</label>
                                     <div class="custom-file">
                                         <input type="file" class="custom-file-input" id="customFile" name="imageCar" onchange="previewFile(this)">
                                         <label class="custom-file-label" for="customFile">Choose file</label>
                                     </div>
                                 </div>

                                 <?php if (isset($car->id)) : ?>
                                     <img src="<?= SITE['root'] . DS . $car->imagem_thumb ?>" id="previewImg"></img>
                                 <?php else : ?>
                                     <img style="display:none" id="previewImg"></img>
                                 <?php endif; ?>

                                 <hr>

                                 <div class="form-group">
                                     <label for="content">Galeria de imagens</label>
                                     <div class="custom-file">
                                         <input type="file" class="custom-file-input" id="customFile_" name="file[]" multiple>
                                         <label class="custom-file-label" for="customFile_">Choose file</label>
                                     </div>
                                 </div>

                                 <div class="row">
                                     <?php if (isset($car->id)) : ?>
                                         <?php foreach ($imagensCarro as $i) : ?>
                                             <div class="col-md-2">
                                                 <img class="img-fluid" src="<?= SITE['root'] . DS . $i->imagem_thumb ?>" alt="<?= $i->id ?>">
                                             </div>
                                         <?php endforeach ?>
                                     <?php endif; ?>
                                 </div>

                             </div> <!-- /.card-body -->

                             <div class="card-footer">
                                 <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>
                                 <?php if (isset($car->id)) : ?>
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