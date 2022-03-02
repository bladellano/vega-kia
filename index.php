<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

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
$app->get("/{slug}", "Web:page", "web.page");

/** Busca */
$app->get("/busca", "Web:search", "web.search");
$app->post("/redirect-result", "Web:redirectResult", "web.redirectresult");

/** Páginas da Web */
$app->get("/semi-novos", "Web:semiNew", "web.seminew");
$app->get("/test-drive", "Web:testDrive", "web.testdrive");
$app->get("/pecas-e-acessorios", "Web:partsAndAccessories", "web.partsandaccessories");
$app->get("/fale-conosco", "Web:contactUs", "web.contactus");
$app->get("/novos/{slug}", "Web:getCar", "web.getcar");

$app->get("/get-car-home/{id}", "Web:getCarHome", "web.getcarhome");

/** Forms */
$app->post("/form-submission", "Web:sendFormContact", "web.sendformcontact");
$app->post("/form-scheduling-submission", "Web:sendFormScheduling", "web.sendformscheduling");
$app->post("/formcontactussubmission", "Web:sendFormContactUs", "web.sendformcontactus");

$app->get("/banner/{slug}", "Web:showBanner", "web.showbanner");

/**
 * ADMIN
 */

$app->group('admin')->namespace('Source\Dash');

$app->get("/", "Admin:home", "admin.home");

$app->get("/{errcode}", "Admin:error", "admin.error");

/** Login */
$app->get("/login", "Auth:home", "auth.home");
$app->post("/login", "Auth:login", "auth.login");
$app->get("/logout", "Auth:logout", "auth.logout");

/** Posts */
$app->get("/posts", "Posts:home", "posts.home");
$app->get("/posts/create", "Posts:create", "posts.create");
$app->post("/posts/register", "Posts:register", "posts.register");
$app->post("/posts/update/{id}", "Posts:update", "posts.update");
$app->get("/posts/delete/{id}", "Posts:delete", "posts.delete");
$app->get("/posts/edit/{id}", "Posts:edit", "posts.edit");
    $app->get("/posts/remove-cover/{id}", "Posts:removeCover", "posts.removecover");

/** Banners */
$app->get("/banners", "Banners:home", "banners.home");
$app->get("/banners/create", "Banners:create", "banners.create");
$app->post("/banners/register", "Banners:register", "banners.register");
$app->post("/banners/update/{id}", "Banners:update", "banners.update");
$app->get("/banners/delete/{id}", "Banners:delete", "banners.delete");
$app->get("/banners/edit/{id}", "Banners:edit", "banners.edit");
    /** Banners - Métodos internos */
    $app->get("/banners/change-order-banner/{id}", "Banners:changeOrderBanner", "banners.changeorderbanner");    


/** Cars */
$app->get("/cars", "Cars:home", "cars.home");
$app->get("/cars/create", "Cars:create", "cars.create");
$app->post("/cars/register", "Cars:register", "cars.register");
$app->post("/cars/update/{id}", "Cars:update", "cars.update");
$app->get("/cars/delete/{id}", "Cars:delete", "cars.delete");
$app->get("/cars/edit/{id}", "Cars:edit", "cars.edit");
    /** Cars - Métodos internos */
    $app->post("/cars/set-type-image", "Cars:setTypeImage", "cars.settypeimage");
    $app->get("/cars/delete-image/{id}", "Cars:deleteImage", "cars.deleteimage");

/** Users */
$app->get("/users", "Users:home", "users.home");
$app->get("/users/create", "Users:create", "users.create");
$app->post("/users/store", "Users:register", "users.register");
$app->post("/users/update/{id}", "Users:update", "users.update");
$app->get("/users/delete/{id}", "Users:delete", "users.delete");
$app->get("/users/edit/{id}", "Users:edit", "users.edit");

/** Leads */
$app->get("/leads", "Leads:home", "leads.home");
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
