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
                                     <div class="form-group col-md-3">
                                         <label for="content">Imagem do Carro</label>
                                         <div class="custom-file">
                                             <input type="file" class="custom-file-input" id="customFile" name="imageCar" onchange="previewFile(this)">
                                             <label class="custom-file-label" for="customFile">Choose file</label>
                                         </div>
                                         <?php if (isset($car->id)) : ?>
                                             <img src="<?= SITE['root'] . DS . $car->imagem_thumb ?>" id="previewImg"></img>
                                         <?php else : ?>
                                             <img style="display:none" id="previewImg"></img>
                                         <?php endif; ?>
                                     </div>

                                     <div class="col-md-9">
                                         <div class="form-group col-md-12">
                                             <label for="nome_titulo">Título (nome do carro)</label>
                                             <input value="<?= isset($car->nome_titulo) ? $car->nome_titulo : "" ?>" type="text" class="form-control" id="nome_titulo" name="nome_titulo">
                                         </div>

                                         <div class="form-group col-md-12">
                                             <label for="nome_subtitulo">Subtítulo (breve descrição do carro)</label>
                                             <input value="<?= isset($car->nome_subtitulo) ? $car->nome_subtitulo : "" ?>" type="text" class="form-control" id="nome_subtitulo" name="nome_subtitulo">
                                         </div>

                                         <div class="form-group col-md-12">
                                             <label for="id_modelo">Modelo</label>
                                             <select name="id_modelo" id="id_modelo" class="form-control">
                                                 <option value="">--</option>
                                                 <?php foreach ($modelos as $m) : ?>
                                                     <option value="<?= $m->id ?>" <?= (isset($car->id_modelo) && $car->id_modelo == $m->id) ? 'selected' : '' ?>><?= $m->nome ?></option>
                                                 <?php endforeach ?>
                                             </select>
                                         </div>
                                     </div>

                                 </div>

                                 <div class="form-group">
                                     <label for="descricao">Descrição</label>
                                     <textarea name="descricao" id="descricao" cols="30" rows="5" class="summernote"><?= isset($car->descricao) ? $car->descricao : "" ?></textarea>
                                 </div>

                                 <?php if (isset($car->id) && count($versoes)) : ?>

                                     <?php foreach ($versoes as $ver) : ?>

                                         <div class="row wrapVersions pb-2">

                                             <div class="form-group col-md-4">
                                                 <label for="nome">Versão</label>
                                                 <input value="<?= isset($ver->nome) ? $ver->nome : "" ?>" type="text" class="form-control" id="nome" name="dataVersao[nome][]" placeholder="Ex.: E.473">
                                             </div>
                                             <div class="form-group col-md-4">
                                                 <label for="ano">Ano</label>
                                                 <input value="<?= isset($ver->ano) ? $ver->ano : "" ?>" type="text" class="form-control" id="ano" name="dataVersao[ano][]" maxlength="4" placeholder="0000">
                                             </div>
                                             <div class="form-group col-md-4">
                                                 <label for="modelo">Modelo</label>
                                                 <input value="<?= isset($ver->modelo) ? $ver->modelo : "" ?>" type="text" class="form-control" id="modelo" name="dataVersao[modelo][]" maxlength="4" placeholder="0000">
                                             </div>
                                             <div class="form-group col-md-12">
                                                 <label for="descricao">Principais características</label>
                                                 <textarea name="dataVersao[descricao][]" cols="30" rows="5" class="summernote">
                                                     <?= isset($ver->descricao) ? $ver->descricao : "" ?>
                                                    </textarea>
                                             </div>
                                             <div class="col-md-12">
                                                 <a href="#" class="btn btn-default btn-sm btnAddWrapVersion"><i class="fas fa-plus"></i></a>
                                                 <a href="#" class="btn btn-default btn-sm btnRemoveWrapVersion"><i class="fas fa-minus"></i></a>
                                             </div>
                                         </div>

                                     <?php endforeach; ?>

                                 <?php else : ?>
                                     <div class="row wrapVersions pb-2">

                                         <div class="form-group col-md-4">
                                             <label for="nome">Versão</label>
                                             <input type="text" class="form-control" id="nome" name="dataVersao[nome][]" placeholder="Ex.: E.473">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <label for="ano">Ano</label>
                                             <input type="text" class="form-control" id="ano" name="dataVersao[ano][]" maxlength="4" placeholder="0000">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <label for="modelo">Modelo</label>
                                             <input type="text" class="form-control" id="modelo" name="dataVersao[modelo][]" maxlength="4" placeholder="0000">
                                         </div>
                                         <div class="form-group col-md-12">
                                             <label for="descricao">Principais características</label>
                                             <textarea name="dataVersao[descricao][]" cols="30" rows="5" class="summernote"></textarea>
                                         </div>
                                         <div class="col-md-12">
                                             <a href="#" class="btn btn-default btn-sm btnAddWrapVersion"><i class="fas fa-plus"></i></a>
                                             <a href="#" class="btn btn-default btn-sm btnRemoveWrapVersion"><i class="fas fa-minus"></i></a>
                                         </div>
                                     </div>
                                 <?php endif; ?>

                                 <hr>

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

                                 <hr>

                                 <div class="form-group">
                                     <label for="content">Galeria de imagens</label>
                                     <div class="custom-file">
                                         <input type="file" class="custom-file-input" id="customFile_" name="file[]" multiple>
                                         <label class="custom-file-label" for="customFile_">Choose file</label>
                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label>Configuração de imagens de detalhes do Carro</label>
                                         </div>

                                         <?php if (isset($car->id)) : ?>
                                             <div class="car_galery">
                                                 <ul>
                                                     <?php foreach ($imagensCarro as $i) : ?>
                                                         <li>
                                                             <img class="<?= ($i->tipo == "") ? 'emptyType' : '' ?>" class="img-fluid" src="<?= SITE['root'] . DS . $i->imagem_thumb ?>" alt="<?= $i->id ?>">

                                                             <div class="row">
                                                                 <div class="col-md-12">
                                                                     <input value="<?= isset($i->titulo) ? $i->titulo : "" ?>" type="text" name="title" class="form-control" placeholder="Título">
                                                                 </div>
                                                                 <div class="col-md-12">
                                                                     <input value="<?= isset($i->descricao) ? $i->descricao : "" ?>" type="text" name="description" class="form-control" placeholder="Descrição">
                                                                 </div>
                                                                 <div class="col-md-12">

                                                                     <div class="row">
                                                                         <div class="col-md-8">
                                                                             <select name="type_image" data-id="<?= $i->id ?>" class="form-control setTypeImage">
                                                                                 <option value="">--Selecione um tipo--</option>
                                                                                 <?php foreach ($tipos as $t) : ?>
                                                                                     <option value="<?= $t ?>" <?= (isset($i->tipo) && $i->tipo == $t) ? 'selected' : '' ?>><?= $t ?></option>
                                                                                 <?php endforeach ?>
                                                                             </select>
                                                                         </div>
                                                                         <div class="col-md-4">
                                                                             <a onclick='$("[name=type_image][data-id=<?= $i->id ?>]").trigger("change");' class="btn btn-primary btn-sm">
                                                                                 <i class="fas fa-save"></i>
                                                                             </a>
                                                                             <a href="<?= SITE['root'] ?>/admin/cars/delete-image/<?= $i->id ?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-sm btnDeleteImage">
                                                                                 <i class="fas fa-trash"></i>
                                                                             </a>
                                                                         </div>
                                                                     </div><!-- ./row -->

                                                                 </div>
                                                             </div>
                                                         </li>
                                                     <?php endforeach ?>
                                                 </ul>
                                             </div>
                                         <?php endif; ?>

                                         <?php if (isset($imagensCarro) && !count($imagensCarro)) : ?>
                                             <div class="alert alert-warning" role="alert">
                                                 Nenhuma imagem para o carro.
                                             </div>
                                         <?php endif; ?>
                                     </div>
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