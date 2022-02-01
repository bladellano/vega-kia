<?php $v->layout("theme/site/_theme"); ?>

<div class="container page">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?= buildBreadcrumb() ?>
        </ol>
    </nav>

    <h1><?=$page->title?></h1>
    <hr>
    <div class="content_page">
        <?=$page->content?>
    </div>
    <hr>
</div>