<?php

class Auth
{
    public function __construct()
    {
        session_start();
    }

    public function login($user)
    {
        $_SESSION['user'] = $user;
    }

    public function logout()
    {
        session_destroy();
    }

    public function check()
    {
        return isset($_SESSION['user']);
    }
}
