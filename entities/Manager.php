<?php
require_once "User.php";

class Manager extends User
{
    public function __construct()
    {
        parent::__construct(role: "manager");
    }
}
