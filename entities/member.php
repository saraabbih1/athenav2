<?php
require_once "User.php";

class Member extends User
{
    public function __construct()
    {
        parent::__construct(role: "member");
    }
}
