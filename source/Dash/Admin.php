<?php

namespace Source\Dash;

use Source\Controllers\Controller;
use Source\Authenticator\CheckUserLogged;

class Admin extends Controller
{
    use CheckUserLogged;

    public function __construct($router)
    {
        parent::__construct($router);

        if (!$this->check())
            return  header("Location: " . $this->router->route("auth.login"));
    }


    public function home(): void
    {

        echo $this->view->render("theme/admin/home", [
            "title" => "Dash",
            "products" =>  [],
            "menu" => false
        ]);
    }

    /**
     * @param $data
     */
    public function error($data): void
    {
        $error = "";
        echo $this->view->render("theme/admin/404", [
            "title" => "Erro {$error}",
            "error" => $error
        ]);
    }
}
