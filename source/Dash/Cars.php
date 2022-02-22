<?php

namespace Source\Dash;

use CoffeeCode\Uploader\Image;
use Source\Models\Car\CarImage;
use Source\Models\Car\CarCidade;
use Source\Models\Car\CarModelo;
use Source\Dash\Controller as DashController;
use Source\Models\Car\CarCategoria;
use Source\Models\Car\CarCombustivel;
use Source\Models\Car\CarUnidadeLoja;
use Source\Models\Car\CarVersao;

class Cars extends DashController
{

    private $modelos;

    public function __construct($router)
    {
        parent::__construct($router);

        $this->modelos = (new CarModelo())->find()->order("nome ASC")->fetch(true) ?? [];
        $this->categorias = (new CarCategoria())->find()->order("nome ASC")->fetch(true) ?? [];
    }

    public function deleteImage($data)
    {
        $image = (new CarImage())->findById($data['id']);
        $idCar = $image->id_carro;

        if (file_exists($image->imagem)) {
            unlink($image->imagem);
            unlink($image->imagem_thumb);
        }

        $image->destroy();

        header("Location: " .  SITE['root'] . "/admin/cars/edit/{$idCar}");
        exit;
    }

    /**
     * Seta o tipo de imagem para exibir 
     * em detalhes do carro no front.
     * @param [type] $data
     * @return string
     */
    public function setTypeImage($data)
    {
        $image = (new CarImage())->findById($data['id']);
        if ($image) {

            $image->tipo = $data['type'];
            $image->titulo = $data['title'];
            $image->descricao = $data['description'];
        }

        echo json_encode(["success" => (int) $image->save()]);
    }

    public function home(): void
    {
        $cars = (new \Source\Models\Car)->find()->order('id DESC')->fetch(true) ?? [];

        echo $this->view->render("theme/admin/cars", [
            "title" => "Carros",
            "titleHeader" => "Registros",
            "cars" =>  $cars
        ]);
    }

    public function create(): void
    {

        $cidades = (new CarCidade())->find()->fetch(true) ?? [];
        $unidadesLojas = (new CarUnidadeLoja())->find()->fetch(true) ?? [];
        $combustiveis = (new CarCombustivel())->find()->fetch(true) ?? [];

        echo $this->view->render("theme/admin/cars-create", [
            "title" => "Carros",
            "titleHeader" => "Cadastrar",
            "modelos" => $this->modelos,
            "cidades" => $cidades,
            "unidadesLojas" => $unidadesLojas,
            "combustiveis" => $combustiveis,
            "categorias" => $this->categorias,
        ]);
    }

    public function register($data): void
    {
        $data['valor'] = moneyToDB($data['valor']);
        $data['slug'] = (new \Ausi\SlugGenerator\SlugGenerator())->generate($data['nome_titulo']);

        $car = new \Source\Models\Car;

        if (in_array("", $data) || $_FILES['imageCar']['error']) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        $versoes = $data['dataVersao'];
        unset($data['dataVersao']);

        /** Imagem Principal */
        $uploadImg = new Image('storage/images', 'carros');

        if (!$_FILES['imageCar']['error'] && in_array($_FILES['imageCar']["type"], $uploadImg::isAllowed())) {
            $data['imagem'] = $uploadImg->upload($_FILES['imageCar'], md5(uniqid(time())));
            $data['imagem_thumb'] = $uploadImg->upload($_FILES['imageCar'], "thumb_" . md5(uniqid(time())), 600);
        }

        foreach ($data as $key => $value) $car->{$key} = $value;

        if (!$car->save()) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $car->fail()->getMessage()
            ]);
            return;
        }

        $carId = $car->data()->id;

        /** Adicionando Versões */
        if (!empty($versoes['nome'][0])) {

            $normalizedFields = normalizeFiles($versoes, 'nome');

            foreach ($normalizedFields as $fields) {

                $versao = new CarVersao();
                $versao->id_carro = $carId;
                foreach ($fields as $key => $value) $versao->{$key} = trim($value);
                $versao->save();
            }
        }

        /** Imagens do Carro */
        $files = normalizeFiles($_FILES['file']);

        if (!$files[0]['error'] && $carId > 0) {

            foreach ($files as $image) {

                $carImage = new CarImage();

                if (!in_array($image["type"], $uploadImg::isAllowed()))
                    continue;

                $carImage->imagem = $uploadImg->upload($image, md5(uniqid(time())));
                $carImage->imagem_thumb = $uploadImg->upload($image, "thumb_" . md5(uniqid(time())), 600);
                $carImage->id_carro = $carId;
                $carImage->save();
            }
        }

        flash("success", "Cadastrado com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => $this->router->route("cars.home")
        ]);
        return;
    }

    public function edit($data): void
    {
        $cidades = (new CarCidade())->find()->fetch(true) ?? [];
        $unidadesLojas = (new CarUnidadeLoja())->find()->fetch(true) ?? [];
        $combustiveis = (new CarCombustivel())->find()->fetch(true) ?? [];
        $versoes = (new CarVersao())->find("id_carro = :id_carro", "id_carro={$data['id']}")->fetch(true) ?? [];

        $tipos = [
            'FULL_BANNER_1',
            'BANNER_1_1',
            'BANNER_1_2',
            'BANNER_1_3',

            'FULL_BANNER_2',
            'BANNER_2_1',
            'BANNER_2_2',
            'BANNER_2_3',

            'FULL_BANNER_3',
            'BANNER_3_1',
            'BANNER_3_2',
            'BANNER_3_3',

            'FULL_BANNER_4',
            'BANNER_4_1',
            'BANNER_4_2',
            'BANNER_4_3',

            'BANNER_COLUMN_1',
            'BANNER_COLUMN_2',

            'FULL_BANNER_COLUMN'
        ];

        $car = (new \Source\Models\Car())->findById($data['id']);

        $carImages = (new CarImage())->find("id_carro = :id_carro", "id_carro={$car->id}")->fetch(true) ?? [];

        echo $this->view->render("theme/admin/cars-create", [
            "title" => "Carros",
            "titleHeader" => "Edição",
            "car" => $car,
            "modelos" => $this->modelos,
            "categorias" => $this->categorias,
            "cidades" => $cidades,
            "unidadesLojas" => $unidadesLojas,
            "combustiveis" => $combustiveis,
            "imagensCarro" => $carImages,
            "tipos" => $tipos,
            "versoes" => $versoes
        ]);
    }

    public function update($data): void
    {

        /** Criando versões */
        /** Apaga as versões que já existem. Adiciona novamente */
        $carVersions = (new CarVersao())->find("id_carro = :id_carro", "id_carro={$data['id']}")->fetch(true) ?? [];
        foreach ($carVersions as $ver)
            $ver->destroy();

        if (!empty($data['dataVersao']['nome'][0])) {

            $normalizedFields = normalizeFiles($data['dataVersao'], 'nome');

            foreach ($normalizedFields as $fields) {

                $versao = new CarVersao();
                $versao->id_carro = $data['id'];
                foreach ($fields as $key => $value) $versao->{$key} = trim($value);
                $versao->save();
            }
        }

        $data['valor'] = moneyToDB($data['valor']);
        $data['slug'] = (new \Ausi\SlugGenerator\SlugGenerator())->generate($data['nome_titulo']);

        $car = (new \Source\Models\Car())->findById($data['id']);

        /** Imagens do Carro */
        $uploadImg = new \CoffeeCode\Uploader\Image('storage/images', 'carros');

        $files = normalizeFiles($_FILES['file']);

        if (!$files[0]['error']) {

            foreach ($files as $image) {

                $carImage = new CarImage();

                if (!in_array($image["type"], $uploadImg::isAllowed()))
                    continue;

                $carImage->imagem = $uploadImg->upload($image, md5(uniqid(time())));
                $carImage->imagem_thumb = $uploadImg->upload($image, "thumb_" . md5(uniqid(time())), 600);
                $carImage->id_carro = $car->id;
                $carImage->save();
            }
        }

        /** Substituição da imagem principal */
        if (!$_FILES['imageCar']['error'] && in_array($_FILES['imageCar']["type"], $uploadImg::isAllowed())) {

            if (file_exists($car->imagem)) {
                unlink($car->imagem);
                unlink($car->imagem_thumb);
            }

            $data['imagem'] = $uploadImg->upload($_FILES['imageCar'], md5(uniqid(time())));
            $data['imagem_thumb'] = $uploadImg->upload($_FILES['imageCar'], "thumb_" . md5(uniqid(time())), 600);
        }

        unset($data['id']);
        unset($data['title']);
        unset($data['description']);
        unset($data['type_image']);
        unset($data['dataVersao']);

        foreach ($data as $key => $value) $car->{$key} = $value;

        if (!$car->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $car->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Alterado com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => SITE['root'] . "/admin/cars/edit/{$car->id}"
        ]);

        return;
    }

    public function delete($data): void
    {

        $car = (new \Source\Models\Car())->findById($data['id']);

        $carImages = (new CarImage())->find("id_carro = :id_carro", "id_carro={$car->id}")->fetch(true) ?? [];

        $carVersions = (new CarVersao())->find("id_carro = :id_carro", "id_carro={$car->id}")->fetch(true) ?? [];

        /* Apaga a imagem principal */

        if (file_exists($car->imagem)) {
            unlink($car->imagem);
            unlink($car->imagem_thumb);
        }

        /* Apaga as imagens */
        foreach ($carImages as $image) {

            if (file_exists($image->imagem)) {
                unlink($image->imagem);
                unlink($image->imagem_thumb);
            }

            (new CarImage())->findById(($image->id))->destroy();
        }

        /** Apaga as versões */
        foreach ($carVersions as $v)
            $v->destroy();

        if (!$car->destroy()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $car->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Registro excluído com sucesso!");

        $this->router->redirect("cars.home");

        return;
    }
}
