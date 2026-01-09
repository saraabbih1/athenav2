<?php

class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $role;
    private $status;
    private $created_at;

    public function __construct($name, $email, $password, $role = 'member')
    {
        $this->name     = $name;
        $this->email    = $email;
        $this->password = $password;
        $this->role     = $role;
        $this->status   = true; 
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function isActive()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}