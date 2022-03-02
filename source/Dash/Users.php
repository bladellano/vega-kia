<?php

namespace Source\Dash;

use Source\Dash\Controller as DashController;
use Source\Security\PasswordHash;

class Users extends DashController
{

    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function home(): void
    {
        $users = (new \Source\Models\User)->find()->order('id DESC')->fetch(true) ?? [];

        echo $this->view->render("theme/admin/users", [
            "title" => "Users",
            "titleHeader" => "Registros",
            "users" =>  $users
        ]);
    }

    public function create(): void
    {
        echo $this->view->render("theme/admin/users-create", [
            "title" => "Users",
            "titleHeader" => "Cadastrar",
        ]);
    }

    public function register($data): void
    {
        $user = new \Source\Models\User;

        foreach ($data as $key => $value) $user->{$key} = $value;

        if (in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        $user->password = PasswordHash::hash($data['password']);

        if (!$user->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $user->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Cadastrado com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => $this->router->route("users.home")
        ]);
        return;
    }

    public function edit($data): void
    {

        $user = (new \Source\Models\User())->findById($data['id']);

        echo $this->view->render("theme/admin/users-create", [
            "title" => "Users",
            "titleHeader" => "Edição",
            "user" => $user,
        ]);
    }

    public function update($data): void
    {

        $user = (new \Source\Models\User())->findById($data['id']);

        unset($data['id']);
        unset($data['password']);

        foreach ($data as $key => $value) $user->{$key} = $value;

        if (!$user->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $user->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Alterado com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => SITE['root'] . "/admin/users/edit/{$user->id}"
        ]);

        return;
    }

    public function delete($data): void
    {

        $user = (new \Source\Models\User())->findById($data['id']);

        if (!$user->destroy()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $user->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Registro excluído com sucesso!");

        $this->router->redirect("users.home");

        return;
    }
}
