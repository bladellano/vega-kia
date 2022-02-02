<?php

namespace Source\Controllers;

use Source\Models\Banner;
use Source\Models\Car;
use Source\Models\Car\CarImage;

/**
 * Class Web
 * @package Source\Controllers
 */
class Web extends Controller
{

    /**
     * Web constructor.
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct($router);
    }

    /**
     * Monta tela principal
     */
    public function home(): void
    {
        $banners = (new Banner)->find()->order("id DESC")->fetch(true) ?? [];

        echo $this->view->render("theme/site/home", [
            "title" => "Home",
            "banners" => $banners,
        ]);
    }

    public function page($data): void
    {

        $params = http_build_query([
            'slug' => $data['slug'],
            'type' =>  'page'
        ]);

        $page = (new \Source\Models\Post)->find("slug = :slug AND type = :type", $params)
            ->order('id DESC')->fetch() ?? [];

        /** Página não encontrada */
        if (!$page) {
            header("Location: " . $this->router->route("web.home"));
            exit;
        }

        echo $this->view->render("theme/site/page", [
            "title" => $page->title,
            "page" => $page,
        ]);
    }

    /** Métodos Car */
    public function semiNew(): void
    {
        echo $this->view->render("theme/site/semi-novos", [
            "title" => "Semi-novos",
        ]);
    }

    public function news(): void
    {
        $newsCars = (new Car())->find("novo = :novo", 'novo=1')->fetch(true) ?? [];

        echo $this->view->render("theme/site/novos", [
            "title" => "Novos",
            "newsCars" => $newsCars,
        ]);
    }
    public function getCar($data): void
    {
        $car = (new Car())->find("slug = :slug", "slug={$data['slug']}")->fetch();

        $carImages = (new CarImage())->find("id_carro = :id_carro", "id_carro={$car->id}")->fetch(true) ?? [];

        echo $this->view->render("theme/site/car", [
            "title" => "Novos",
            "car" => $car,
            "carImages" => $carImages
        ]);
    }

    /**
     * @param $data
     */
    public function error($data): void
    {
        $error = filter_var($data["errcode"], FILTER_VALIDATE_INT);

        echo $this->view->render("theme/error", [
            "title" => "Erro {$error}",
            "error" => $error
        ]);
    }
}
