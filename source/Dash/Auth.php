<?php

namespace Source\Dash;

use Source\Controllers\Controller;
use Source\Authenticator\Authenticator;

class Auth extends Controller
{

    public function home(): void
    {
        echo $this->view->render("theme/admin/login", [
            "title" => SITE['name'],
            "titleHeader" => "Login",
        ]);
    }
    public function login($data)
    {
        $user = new \Source\Models\User();
        $authenticator = new Authenticator($user);

        if (!$authenticator->login($data)) {
            flash("error", "Usuário ou senha não conferem!");
            header("Location: " . $this->router->route("auth.login"));
            exit;
        }

        flash("success", "Logado com sucesso!");

        header("Location: " . $this->router->route("admin.home"));
        exit;
    }

    public function logout()
    {
        (new Authenticator())->logout();
        flash("success", "Deslogado com sucesso!");
        header("Location: " . $this->router->route("auth.login"));
        exit;
    }
}
