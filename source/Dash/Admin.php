<?php

namespace Source\Dash;

use Source\Models\Car;
use Source\Models\Post;
use Source\Models\User;
use Source\Models\Banner;
use Source\Dash\Controller as DashController;

class Admin extends DashController
{

    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function home(): void
    {

        $carsQtd = (new Car())->find()->count();
        $postsQtd = (new Post())->find()->count();
        $bannersQtd = (new Banner())->find()->count();
        $usersQtd = (new User())->find()->count();

        echo $this->view->render("theme/admin/home", [
            "title" => "Dash",
            "products" =>  [],
            "titleHeader" => "Home",
            "menu" => false,
            "carsQtd" => $carsQtd,
            "postsQtd" => $postsQtd,
            "bannersQtd" => $bannersQtd,
            "usersQtd" => $usersQtd,
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
