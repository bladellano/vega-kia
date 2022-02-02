<?php

namespace Source\Authenticator;

use Source\Session\Session;

trait CheckUserLogged
{

    public function check()
    {
        if (Session::has('user'))
            return true;
        return false;
    }
}
