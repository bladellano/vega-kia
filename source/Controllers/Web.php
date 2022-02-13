<?php

namespace Source\Controllers;

use Source\Mailer;
use Source\Models\Banner;
use Source\Models\Car;
use Source\Models\Car\CarImage;
use Source\Models\Car\CarVersao;

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
        $cars = (new Car)->find()->order("id DESC")->fetch(true) ?? [];

        echo $this->view->render("theme/site/home", [
            "title" => "Home",
            "banners" => $banners,
            "cars" => $cars
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

    /**
     * Form de contato principal do site
     * @param [type] $data
     * @return void
     */
    public function sendFormContact($data)
    {
        $data['ciencia'] = (isset($data['ciencia'])) ? "SIM" : "NÃO";

        if (in_array("", $data) || $data['ciencia'] == "NÃO") {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        $message = $this->view->render("theme/site/email-sent", ["data" => $data]);

        $mailer = new Mailer($data['email'], $data['nome'], "Formulário de Contato", utf8_decode($message));

        if (!$mailer->send()) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $mailer->ErrorInfo,
            ]);
            return;
        }

        flash("success", "Enviado com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => $this->router->route("web.home")
        ]);
        return;
    }

    public function getCarHome($data)
    {
        $car = (new Car())->findById($data['id']);

        echo json_encode([
            "id" => $car->id,
            "nome_titulo" => $car->nome_titulo,
            "slug" => $car->slug,
            "imagem_thumb" => $car->imagem_thumb,
            "descricao" => $car->descricao
        ]);

        exit;
    }

    public function getCar($data): void
    {
        $car = (new Car())->find("slug = :slug", "slug={$data['slug']}")->fetch();

        $carImages = (new CarImage())->find("id_carro = :id_carro", "id_carro={$car->id}")->fetch(true) ?? [];
        shuffle($carImages);

        $versions = (new CarVersao())->find("id_carro = :id_carro", "id_carro={$car->id}")->fetch(true) ?? [];

        $buildImagesFront = array_map(function ($item) {
            return [
                "tipo" => $item->tipo,
                "titulo" => $item->titulo,
                "descricao" => $item->descricao,
                "imagem" => $item->imagem
            ];
        }, $carImages);

        $buildImagesFront = groupByColumn($buildImagesFront, "tipo", 0);

        echo $this->view->render("theme/site/car", [
            "title" => "Novos",
            "car" => $car,
            "carImages" => $carImages,
            "buildImagesFront" => $buildImagesFront,
            "versions" => $versions
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
