<?php $v->layout("theme/site/_theme"); ?>

<div class="container">

    <h1>Novos!!!</h1>

    <ul>
        <?php foreach ($newsCars as $c) : ?>
            <li> <a href="<?= $_SERVER['REQUEST_URI'] . DS . $c->slug ?>"> <?= $c->nome_titulo ?> </a></li>
        <?php endforeach; ?>
    </ul>

    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus quidem deleniti aspernatur nobis doloremque magni provident saepe ea accusantium. Iste eaque rerum pariatur, tenetur unde voluptatum! Iste aliquam magni impedit!</p>

    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus quidem deleniti aspernatur nobis doloremque magni provident saepe ea accusantium. Iste eaque rerum pariatur, tenetur unde voluptatum! Iste aliquam magni impedit!</p>

    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus quidem deleniti aspernatur nobis doloremque magni provident saepe ea accusantium. Iste eaque rerum pariatur, tenetur unde voluptatum! Iste aliquam magni impedit!</p>

    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus quidem deleniti aspernatur nobis doloremque magni provident saepe ea accusantium. Iste eaque rerum pariatur, tenetur unde voluptatum! Iste aliquam magni impedit!</p>

    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus quidem deleniti aspernatur nobis doloremque magni provident saepe ea accusantium. Iste eaque rerum pariatur, tenetur unde voluptatum! Iste aliquam magni impedit!</p>
</div>