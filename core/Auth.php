<?php

class Auth
{
    public function __construct()
    {
        
    }

    public function login($user)
    {
        $_SESSION['user'] = $user;
    }

    public function logout()
    {
      
    }

    public function check()
    {
        return isset($_SESSION['user']);
    }
}
