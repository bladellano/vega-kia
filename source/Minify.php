<?php

/**
 * CSS
 */

$minCSS = new \MatthiasMullie\Minify\CSS();
$minCSS->add(dirname(__DIR__,1)."/views/assets/css/bootstrap.min.css");
$minCSS->add(dirname(__DIR__,1)."/views/assets/css/bootstrap4-toggle.min.css");
$minCSS->add(dirname(__DIR__,1)."/views/assets/css/style.css");
$minCSS->add(dirname(__DIR__,1)."/views/assets/css/message.css");
$minCSS->add(dirname(__DIR__,1)."/views/assets/css/load.css");

$minCSS->minify(dirname(__DIR__,1)."/views/assets/style.min.css");

/**
 * JS
 */

$minJS = new \MatthiasMullie\Minify\JS();
$minJS->add(dirname(__DIR__,1)."/views/assets/js/jquery.js");
$minJS->add(dirname(__DIR__,1)."/views/assets/js/jquery-ui.js");
$minJS->add(dirname(__DIR__,1)."/views/assets/js/bootstrap.min.js");
$minJS->add(dirname(__DIR__,1)."/views/assets/js/jquery.mask.min.js");
$minJS->add(dirname(__DIR__,1)."/views/assets/js/bootstrap4-toggle.min.js");
$minJS->add(dirname(__DIR__,1)."/views/assets/js/script.js");

$minJS->minify(dirname(__DIR__,1)."/views/assets/script.min.js");
