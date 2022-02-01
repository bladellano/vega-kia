<?php

namespace Source\Controllers;

use Source\Models\Banner;
use Source\Models\Car;
use Source\Models\Car\CarImage;
use Source\Models\Product;

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
    public function home($data = []): void
    {
        // echo '<pre>$data<br />'; print_r($data); echo '</pre>';die;

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
     * Monta a tela de compra do produto
     * @param $data
     */
    public function buy($data)
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        $product = (new Product())->findById($data['id']);

        die($this->view->render("theme/buy", [
            "title" => "Compra",
            "product" => $product,
            "menu" => false
        ]));
    }

    /**
     * Dá baixa no estoque do produto
     * @param $data
     */
    public function purchased($data)
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        $product = (new Product())->findById($data['id']);

        $product->amount = --$product->amount;

        if (!$product->save()) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $product->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Compra efetuada com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => site() . "/compra/{$product->id}"
        ]);
        return;
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
