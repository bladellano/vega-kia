<?php

namespace Source\Authenticator;

use Source\Models\User;
use Source\Session\Session;
use Source\Security\PasswordHash;

class Authenticator
{

    private $user;

    public function __construct(User $user = NULL)
    {
        $this->user = $user;
    }

    public function login(array $credentials)
    {
        $user = (new \Source\Models\User())->find("email = :email", "email={$credentials['email']}")->fetch();

        if (!$user)
            return false;

        if (!PasswordHash::check($credentials['password'], $user->password))
            return false;

        unset($user->password);
        Session::add('user', $user);
        return true;
    }

    public function logout()
    {
        if (Session::has('user')) {
            Session::remove('user');
        }
        Session::clear();
    }
}
