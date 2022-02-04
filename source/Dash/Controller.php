<?php


namespace Source\Dash;

use Source\Controllers\Controller as ControllersController;
use Source\Authenticator\CheckUserLogged;

class Controller extends ControllersController
{
    use CheckUserLogged;
    
    public function __construct($router)
    {
        parent::__construct($router);

        if (!$this->check())
            return  header("Location: " . $this->router->route("auth.login"));
    }
}
