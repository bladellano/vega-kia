<?php

namespace Source\Controllers;

use CoffeeCode\DataLayer\Connect;
use Source\Seo;
use Source\Mailer;
use Source\Models\Car;
use Source\Models\Banner;
use Source\Models\Car\CarImage;
use Source\Models\Car\CarVersao;
use Source\Models\Lead;

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

    public function search(): void
    {
        extract($_REQUEST);

        if (!isset($search))
            header("Location: " . $this->router->route("web.home"));

        $connect = Connect::getInstance();

        $sql = "SELECT 
        b.id,
        b.slug, 
        b.title, 
        b.description, 
        b.content 
        FROM banners b WHERE TRUE AND 
        b.title LIKE '%{$search}%' OR b.description LIKE '%{$search}%' OR b.content LIKE '%{$search}%'
        -- 
        UNION 
        SELECT 
        p.id,
        p.slug,
        p.title, 
        p.description, 
        p.content 
        FROM posts p WHERE TRUE AND 
        p.title LIKE '%{$search}%' OR p.description LIKE '%{$search}%' OR p.content LIKE '%{$search}%'
        -- 
        UNION 
        SELECT 
        c.id,
        c.slug,
        c.nome_titulo, 
        c.nome_subtitulo, 
        c.descricao 
        FROM vc_carros c WHERE TRUE AND 
        c.nome_titulo LIKE '%{$search}%' OR c.nome_subtitulo LIKE '%{$search}%' OR c.descricao LIKE '%{$search}%'
        ";

        $result = $connect->query($sql);
        $result = $result->fetchAll();
        $qtd = count($result);

        echo $this->view->render("theme/site/search", [
            "title" => "Resultado da busca ({$qtd})",
            "result" => $result,
        ]);

        exit;
    }

    public function redirectResult()
    {
        $connect = Connect::getInstance();

        extract($_REQUEST);

        $sql = "SELECT
        'banners' as thisTable,
        b.id,
        b.slug, 
        b.title, 
        b.description, 
        b.content 
        FROM banners b WHERE TRUE AND 
        b.id = $id AND b.slug = '{$slug}'
        -- 
        UNION 
        SELECT 
        'posts' as thisTable,
        p.id,
        p.slug,
        p.title, 
        p.description, 
        p.content 
        FROM posts p WHERE TRUE AND 
        p.id = $id AND p.slug = '{$slug}'
        UNION 
        SELECT 
        'vc_carros' as thisTable,
        c.id,
        c.slug,
        c.nome_titulo, 
        c.nome_subtitulo, 
        c.descricao 
        FROM vc_carros c WHERE TRUE AND 
        c.id = $id AND c.slug = '{$slug}'
        ";

        $result = $connect->query($sql);
        $result = $result->fetch();

        switch ($result->thisTable) {
            case 'banners':
                echo json_encode(['url' => SITE['root'] . DS . "banner/{$result->slug}"]);
                break;
            case 'posts':
                echo json_encode(['url' => SITE['root'] . DS . "{$result->slug}"]);
                break;
            case 'vc_carros':
                echo json_encode(['url' => SITE['root'] . DS . "novos/{$result->slug}"]);
                break;
        }
        exit;
    }


    /**
     * Monta tela principal
     */
    public function home(): void
    {
        $banners = (new Banner)->find()->order("updated_at DESC")->fetch(true) ?? [];
        $cars = (new Car)->find()->order("id DESC")->fetch(true) ?? [];

        $head = (new Seo())->render(
            SITE['name'],
            SITE['desc'],
            SITE['root'],
            asset('images/image-default-vega-kia.jpeg', 'site', 0),
        );

        echo $this->view->render("theme/site/home", [
            "banners" => $banners,
            "cars" => $cars,
            "head" => $head
        ]);
    }

    public function page($data): void
    {

        $params = http_build_query([
            'slug' => $data['slug'],
            'type' =>  'page'
        ]);

        $page = (new \Source\Models\Post)->find("slug = :slug AND type = :type", $params)->fetch() ?? [];

        /** Página não encontrada */
        if (!$page) {
            header("Location: " . $this->router->route("web.home"));
            exit;
        }

        /** Seo */
        $head = (new Seo())->render(
            SITE['name'] . " | " . $page->title,
            SITE['desc'] . $page->description,
            DS . $page->slug,
            asset('images/image-default-vega-kia.jpeg', 'site', 0),
        );

        echo $this->view->render("theme/site/page", [
            "page" => $page,
            "head" => $head
        ]);
    }

    public function contactUs(): void
    {
        $params = http_build_query([
            'slug' => 'fale-conosco',
            'type' =>  'page'
        ]);

        $page = (new \Source\Models\Post)->find("slug = :slug AND type = :type", $params)->fetch() ?? [];

        /** Seo */
        $head = (new Seo())->render(
            SITE['name'] . " | " . $page->title,
            SITE['desc'] . $page->description,
            DS . $page->slug,
            asset('images/image-default-vega-kia.jpeg', 'site', 0),
        );

        echo $this->view->render("theme/site/page", [
            "head" =>  $head,
            "page" => $page,
            "showForm" => 'form-contact-us.php',
            "typeForm" => 'fluid'
        ]);
        exit;
    }

    public function testDrive(): void
    {

        $params = http_build_query([
            'slug' => 'test-drive',
            'type' =>  'page'
        ]);

        $page = (new \Source\Models\Post)->find("slug = :slug AND type = :type", $params)->fetch() ?? [];

        $head = (new Seo())->render(
            SITE['name'] . " | " . $page->title,
            SITE['desc'] . $page->description,
            DS . $page->slug,
            asset('images/image-default-vega-kia.jpeg', 'site', 0),
        );

        echo $this->view->render("theme/site/page", [
            "head" => $head,
            "page" => $page,
            "showForm" => 'form-scheduling.php',
            "typeForm" => 'container'
        ]);
        exit;
    }

    /** Métodos Car */
    public function semiNew(): void
    {
        $title = "Semi-novos";

        $head = (new Seo())->render(
            SITE['name'] . " | " . $title,
            SITE['desc'] . "Semi-novos de veículos",
            DS . "semi-novos",
            asset('images/image-default-vega-kia.jpeg', 'site', 0),
        );

        echo $this->view->render("theme/site/semi-novos", [
            "head" => $head
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

    public function showBanner($data): void
    {
        $banner = (new Banner())->find("slug = :slug", 'slug=' . $data['slug'])->fetch() ?? [];

        echo $this->view->render("theme/site/banner", [
            "title" => "Banner",
            "banner" => $banner,
        ]);
    }


    public function sendFormContactUs($data)
    {
        
        $data['aceita_receber_email'] = isset($data['aceita_receber_email']) ? 'SIM' : 'NÃO';
        $data['aceita_receber_sms'] = isset($data['aceita_receber_sms']) ? 'SIM' : 'NÃO';

        if (in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        $message = $this->view->render("theme/site/email-sent-default", ["data" => $data]);

        /** Captura lead */
        $this->leadCapture($data, $message);

        $mailer = new Mailer($data['email'], $data['nome'], "Formulário de Contato - {$data['typeForm']}", utf8_decode($message));

        if (!$mailer->send()) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Problema ao enviar e-mail!"
            ]);
            return;
        } else {

            echo $this->ajaxResponse("message", [
                "type" => "success",
                "message" => "Enviado com sucesso!"
            ]);
            return;
        }
    }

    public function sendFormScheduling($data)
    {

        if (in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        $message = $this->view->render("theme/site/email-sent-default", ["data" => $data]);

        /** Captura lead */
        $this->leadCapture($data, $message);

        $mailer = new Mailer($data['email'], $data['nome'], "Formulário de Contato - {$data['typeForm']}", utf8_decode($message));

        if (!$mailer->send()) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Problema ao enviar e-mail!"
            ]);
            return;
        } else {

            echo $this->ajaxResponse("message", [
                "type" => "success",
                "message" => "Enviado com sucesso!"
            ]);
            return;
        }
    }

    /**
     * Form de contato principal do site
     * @param [type] $data
     * @return void
     */
    public function sendFormContact($data)
    {
        $data['ciente'] = (isset($data['ciente'])) ? "SIM" : "NÃO";
        $data['usar_veiculo_usado'] = (isset($data['usar_veiculo_usado'])) ? "SIM" : "NÃO";
        $data['financiamento'] = (isset($data['financiamento'])) ? "SIM" : "NÃO";

        if (in_array("", $data) || $data['ciente'] == "NÃO") {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        $message = $this->view->render("theme/site/email-sent-default", ["data" => $data]);

        /** Captura lead */
        $this->leadCapture($data, $message);

        #print($message); die;

        $mailer = new Mailer($data['email'], $data['nome'], "Formulário de Contato - {$data['typeForm']}", utf8_decode($message));

        if (!$mailer->send()) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Problema ao enviar e-mail!"
            ]);
            return;
        } else {

            echo $this->ajaxResponse("message", [
                "type" => "success",
                "message" => "Enviado com sucesso!"
            ]);
            return;
        }
    }

    private function leadCapture($data, $message, $type = 'form'): bool
    {
        $lead = new Lead();

        $lead->name = $data['nome'];
        $lead->email = $data['email'];
        $lead->content = base64_encode($message);
        $lead->origin = $_SERVER['HTTP_REFERER'];
        $lead->type = $type;

        if ($lead->save())
            return true;
        return false;
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

        /** Seo */
        $head = (new Seo())->render(
            SITE['name'] . " | " . $car->nome_titulo,
            SITE['desc'] . $car->nome_subtitulo,
            DS . $car->slug,
            asset('images/image-default-vega-kia.jpeg', 'site', 0),
        );

        echo $this->view->render("theme/site/car", [
            "head" => $head,
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
