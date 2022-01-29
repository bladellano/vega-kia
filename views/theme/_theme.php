<!doctype html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="<?= asset("style.min.css"); ?>" />

	<link rel="icon" type="image/png" href="<?= asset("images/favicon.ico"); ?>" />

	<title>Desafio ZPT Digital | <?= $title ?></title>

</head>

<body>

	<div class="ajax_load">
		<div class="ajax_load_box">
			<div class="ajax_load_box_circle"></div>
			<div class="ajax_load_box_title">Aguarde, carrengando...</div>
		</div>
	</div>

	<nav class="navbar navbar-expand-lg navbar-light bg-light bg--navbar">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarToggler">
			<a class="navbar-brand" href="<?= site() ?>">
				<img class="brand--img--top" src="<?= asset("/images/logo.png"); ?>" alt="Logo">
			</a>

			<?php if (!isset($menu)) : ?>
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produtos</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenu">
							<a class="dropdown-item" href="<?= site() ?>/produtos/cadastro">Cadastro de Produto</a>
							<a class="dropdown-item" href="<?= site() ?>/produtos">Lista de Produtos</a>
					</li>
				</ul>
			<?php endif; ?>
		</div>

	</nav>

	<div class="container">
		<?= $v->section("content"); ?>
	</div>

	<footer>
		<p>Todos os direitos reservados – ZPTDigital 2020</p>
		<p>Todas as marcas comerciais, nomes comerciais, marcas de serviço e logotipos aqui mencionados pertencem às suas respectivas empresas</p>
	</footer>

	<script src="<?= asset("/script.min.js"); ?>"></script>

	<?= $v->section("scripts"); ?>

</body>

</html>