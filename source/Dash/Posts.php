<?php

namespace Source\Dash;

use Source\Dash\Controller as DashController;

class Posts extends DashController
{

    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function home(): void
    {

        $posts = (new \Source\Models\Post)->find()->order('id DESC')->fetch(true) ?? [];

        echo $this->view->render("theme/admin/posts", [
            "title" => "Posts",
            "titleHeader" => "Registros",
            "posts" =>  $posts
        ]);
    }

    public function create(): void
    {
        echo $this->view->render("theme/admin/posts-create", [
            "title" => "Posts",
            "titleHeader" => "Cadastrar",
        ]);
    }

    public function register($data): void
    {

        $post = new \Source\Models\Post;

        $data['slug'] = (new \Ausi\SlugGenerator\SlugGenerator())->generate($data['title']);

        /** FILE */
        $file = $_FILES['file'] ?? NULL;
        $uploadImg = new \CoffeeCode\Uploader\Image('storage/images', 'posts');

        if (!$file['error'] && in_array($file["type"], $uploadImg::isAllowed())) {

            $data['cover'] = $uploadImg->upload($file, md5(uniqid(time())));
            $data['cover_thumb'] = $uploadImg->upload($file, "thumb_" . md5(uniqid(time())), 600);
        }

        foreach ($data as $key => $value) $post->{$key} = $value;

        if (in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        if (!$post->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $post->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Cadastrado com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => $this->router->route("posts.home")
        ]);
        return;
    }

    public function edit($data): void
    {

        $post = (new \Source\Models\Post())->findById($data['id']);

        echo $this->view->render("theme/admin/posts-create", [
            "title" => "Posts",
            "titleHeader" => "Edição",
            "post" => $post,
        ]);
    }

    public function update($data): void
    {
        $data['slug'] = (new \Ausi\SlugGenerator\SlugGenerator())->generate($data['title']);

        $post = (new \Source\Models\Post())->findById($data['id']);

        /** FILE */
        $file = $_FILES['file'] ?? NULL;
        $uploadImg = new \CoffeeCode\Uploader\Image('storage/images', 'posts');

        if (!$file['error'] && in_array($file["type"], $uploadImg::isAllowed())) {

            if (file_exists($post->cover)) {
                unlink($post->cover);
                unlink($post->cover_thumb);
            }

            $data['cover'] = $uploadImg->upload($file, md5(uniqid(time())));
            $data['cover_thumb'] = $uploadImg->upload($file, "thumb_" . md5(uniqid(time())), 600);
        }

        unset($data['id']);

        foreach ($data as $key => $value) $post->{$key} = $value;

        if (!$post->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $post->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Alterado com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => SITE['root'] . "/admin/posts/edit/{$post->id}"
        ]);

        return;
    }

    public function delete($data): void
    {
        $post = (new \Source\Models\Post())->findById($data['id']);

        /* Apaga a imagem principal */

        if (file_exists($post->cover)) {
            unlink($post->cover);
            unlink($post->cover_thumb);
        }

        if (!$post->destroy()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $post->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Registro excluído com sucesso!");

        $this->router->redirect("posts.home");

        return;
    }

    public function removeCover($data)
    {
        $post = (new \Source\Models\Post())->findById($data['id']);
        $post->cover = NULL;
        $post->cover_thumb = NULL;

        if ($post->save())
            flash("success", "Capa excluída com sucesso!");

        header("Location: " . SITE['root'] . "/admin/posts/edit/{$post->id}");
        exit;
    }
}
