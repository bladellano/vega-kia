<?php

namespace Source\Dash;

use Source\Dash\Controller as DashController;

class Admin extends DashController
{

    public function __construct($router)
    {
        parent::__construct($router);
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
