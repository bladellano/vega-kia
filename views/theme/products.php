<?php $v->layout("theme/_theme"); ?>

<div class="login_form_callback">
    <?= flash(); ?>
</div>

<h3>Lista de Produtos</h3>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Ativo</th>
            <th scope="col">Preço</th>
            <th scope="col" style="width: 20%"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($products as $p) :

            $checked = ($p->status) ? 'checked' : '';

            echo '<tr>
			<th scope="row">' . $p->id . '</th>
			<td><a href="' . site() . '/produtos/editar/' . $p->id . '">' . $p->name . '</a></td>
			<td>' . '<input class="toggle-one"  ' . $checked . ' type="checkbox" onchange="toggleStatus(this)" data-id="' . $p->id . '"></td>
			<td>R$ ' . money($p->price) . '</td>
			<td>
			    <a href="' . site() . '/produtos/editar/' . $p->id . '" class="btn btn-sm btn-primary" >Editar</a> 
			    <a onclick="return confirm(\'Deseja realmente excluir este registro?\')" href="' . site() . '/produtos/deletar/' . $p->id . '" class="btn btn-sm btn-danger" >Excluir</a> 
			</td>
			</tr>';

        endforeach;
        ?>
    </tbody>
</table>

<p>

    <?= $pages ?>

</p>