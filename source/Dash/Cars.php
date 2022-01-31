<?php

namespace Source\Dash;

use CoffeeCode\Uploader\Image;
use Source\Models\Car\CarImage;
use Source\Models\Car\CarCidade;
use Source\Models\Car\CarModelo;
use Source\Controllers\Controller;
use Source\Models\Car\CarCombustivel;
use Source\Models\Car\CarUnidadeLoja;

class Cars extends Controller
{

    private $modelos;

    public function __construct($router)
    {
        parent::__construct($router);

        $this->modelos = (new CarModelo())->find()->order("nome ASC")->fetch(true) ?? [];
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
        ]);
    }

    public function register($data): void
    {
        $data['valor'] = moneyToDB($data['valor']);

        $car = new \Source\Models\Car;

        $data['slug'] = (new \Ausi\SlugGenerator\SlugGenerator())->generate($data['nome_titulo']);

        /** Imagem Principal */

        $uploadImg = new Image('storage/images', 'carros');

        if (!$_FILES['imageCar']['error'] && in_array($_FILES['imageCar']["type"], $uploadImg::isAllowed())) {
            $data['imagem'] = $uploadImg->upload($_FILES['imageCar'], md5(uniqid(time())));
            $data['imagem_thumb'] = $uploadImg->upload($_FILES['imageCar'], "thumb_" . md5(uniqid(time())), 600);
        }

        foreach ($data as $key => $value) $car->{$key} = $value;

        if (in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        if (!$car->save()) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $car->fail()->getMessage()
            ]);
            return;
        }

        $carId = $car->data()->id;

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

        $car = (new \Source\Models\Car())->findById($data['id']);

        $carImages = (new CarImage())->find("id_carro = :id_carro", "id_carro={$car->id}")->fetch(true) ?? [];

        echo $this->view->render("theme/admin/cars-create", [
            "title" => "Carros",
            "titleHeader" => "Edição",
            "car" => $car,
            "modelos" => $this->modelos,
            "cidades" => $cidades,
            "unidadesLojas" => $unidadesLojas,
            "combustiveis" => $combustiveis,
            "imagensCarro" => $carImages,
        ]);
    }

    public function update($data): void
    {

        $data['valor'] = moneyToDB($data['valor']);
        $data['slug'] = (new \Ausi\SlugGenerator\SlugGenerator())->generate($data['nome_titulo']);

        $car = (new \Source\Models\Car())->findById($data['id']);

        /** Substituição */
        $uploadImg = new \CoffeeCode\Uploader\Image('storage/images', 'banners');

        if (!$_FILES['imageCar']['error'] && in_array($_FILES['imageCar']["type"], $uploadImg::isAllowed())) {

            if (file_exists($car->imagem)) {
                unlink($car->imagem);
                unlink($car->imagem_thumb);
            }

            $data['imagem'] = $uploadImg->upload($_FILES['imageCar'], md5(uniqid(time())));
            $data['imagem_thumb'] = $uploadImg->upload($_FILES['imageCar'], "thumb_" . md5(uniqid(time())), 600);
        }

        unset($data['id']);

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

        foreach ($carImages as $image) {

            if (file_exists($image->imagem)) {
                unlink($image->imagem);
                unlink($image->imagem_thumb);
            }

            (new CarImage())->findById(($image->id))->destroy();
        }

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
