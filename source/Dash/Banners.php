<?php

namespace Source\Dash;

use Source\Controllers\Controller;

class Banners extends Controller
{

    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function home(): void
    {

        $banners = (new \Source\Models\Banner)->find()->order('id DESC')->fetch(true) ?? [];

        echo $this->view->render("theme/admin/banners", [
            "title" => "Banners",
            "titleHeader" => "Registros",
            "banners" =>  $banners
        ]);
    }

    public function create(): void
    {
        echo $this->view->render("theme/admin/banners-create", [
            "title" => "Banners",
            "titleHeader" => "Cadastrar",
        ]);
    }

    public function register($data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        $banner = new \Source\Models\Banner;

        $data['slug'] = (new \Ausi\SlugGenerator\SlugGenerator())->generate($data['title']);

        /** FILE */
        $file = $_FILES['file'] ?? NULL;
        $uploadImg = new \CoffeeCode\Uploader\Image('storage/images', 'banners');

        if (!$file['error'] && in_array($file["type"], $uploadImg::isAllowed())) {

            $data['image'] = $uploadImg->upload($file, md5(uniqid(time())));
            $data['image_thumb'] = $uploadImg->upload($file, "thumb_" . md5(uniqid(time())), 600);
        }

        foreach ($data as $key => $value) $banner->{$key} = $value;

        if (in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        if (!$banner->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $banner->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Cadastrado com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => $this->router->route("banners.home")
        ]);
        return;
    }

    public function edit($data): void
    {

        $banner = (new \Source\Models\Banner())->findById($data['id']);

        echo $this->view->render("theme/admin/banners-create", [
            "title" => "Banners",
            "titleHeader" => "Edição",
            "banner" => $banner,
        ]);
    }

    public function update($data): void
    {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        $data['slug'] = (new \Ausi\SlugGenerator\SlugGenerator())->generate($data['title']);

        $banner = (new \Source\Models\Banner())->findById($data['id']);

        /** FILE */
        $file = $_FILES['file'] ?? NULL;
        $uploadImg = new \CoffeeCode\Uploader\Image('storage/images', 'banners');

        if (!$file['error'] && in_array($file["type"], $uploadImg::isAllowed())) {

            if (file_exists($banner->image)) {
                unlink($banner->image);
                unlink($banner->image_thumb);
            }

            $data['image'] = $uploadImg->upload($file, md5(uniqid(time())));
            $data['image_thumb'] = $uploadImg->upload($file, "thumb_" . md5(uniqid(time())), 600);
        }


        unset($data['id']);

        foreach ($data as $key => $value) $banner->{$key} = $value;

        if (!$banner->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $banner->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Alterado com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => SITE['root'] . "/admin/banners/edit/{$banner->id}"
        ]);

        return;
    }

    public function delete($data): void
    {

        $banner = (new \Source\Models\Banner())->findById($data['id']);

        if (file_exists($banner->image)) {
            unlink($banner->image);
            unlink($banner->image_thumb);
        }

        if (!$banner->destroy()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $banner->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Registro excluído com sucesso!");

        $this->router->redirect("banners.home");

        return;
    }
}
