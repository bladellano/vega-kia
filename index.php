<?php

ob_start();

session_start();

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$app = new Router(site());
$app->namespace("Source\Controllers");

/**
 * WEB
 */

$app->group(null);
$app->get("/", "Web:home", "web.home");
/** Páginas da Web */
$app->get("/semi-novos", "Web:semiNew", "web.seminew");

$app->get("/novos", "Web:news", "web.news");
$app->get("/novos/{slug}", "Web:getCar", "web.getcar");

/**
 * ADMIN
 */

$app->group('admin')->namespace('Source\Dash');
$app->get("/", "Admin:home", "admin.home");

$app->get("/{errcode}", "Admin:error", "admin.error");

/** Posts */
$app->get("/posts", "Posts:home", "posts.home");
$app->get("/posts/create", "Posts:create", "posts.create");
$app->post("/posts/register", "Posts:register", "posts.register");
$app->post("/posts/update/{id}", "Posts:update", "posts.update");
$app->get("/posts/delete/{id}", "Posts:delete", "posts.delete");
$app->get("/posts/edit/{id}", "Posts:edit", "posts.edit");

/** Banners */
$app->get("/banners", "Banners:home", "banners.home");
$app->get("/banners/create", "Banners:create", "banners.create");
$app->post("/banners/register", "Banners:register", "banners.register");
$app->post("/banners/update/{id}", "Banners:update", "banners.update");
$app->get("/banners/delete/{id}", "Banners:delete", "banners.delete");
$app->get("/banners/edit/{id}", "Banners:edit", "banners.edit");

/** Cars */
$app->get("/cars", "Cars:home", "cars.home");
$app->get("/cars/create", "Cars:create", "cars.create");
$app->post("/cars/register", "Cars:register", "cars.register");
$app->post("/cars/update/{id}", "Cars:update", "cars.update");
$app->get("/cars/delete/{id}", "Cars:delete", "cars.delete");
$app->get("/cars/edit/{id}", "Cars:edit", "cars.edit");


/**
 * ERRORS
 */
$app->group("ops");
$app->get("/{errcode}", "Web:error", "web.error");

/**
 * ROUTE PROCESS
 */

$app->dispatch();
/**
 * ERRORS PROCESS
 */

if ($app->error()) {
    $app->redirect("web.error", ['errcode' => $app->error()]);
}

ob_end_flush();
