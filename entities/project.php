<?php

class Project
{
    protected  $id;
    protected  $name;
    protected $description;
    protected  $managerId;  
    protected  $active;
    protected $createdAt;

    public function __construct($id,$name,$description,$managerId,$active,$createdAt)
    {
        $this->id          = $id;
        $this->name        = $name;
        $this->description = $description;
        $this->managerId   = $managerId;
        $this->active      = $active;
        $this->createdAt   = $createdAt;
    }

  
    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getManagerId(){
        return $this->managerId;
    }

    public function isActive(){
        return $this->active;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    
    public function setName( $name){
        $this->name = $name;
    }

    public function setDescription( $description){
        $this->description = $description;
    }

    public function setManagerId($managerId){
        $this->managerId = $managerId;
    }

    public function setActive( $active) {
        $this->active = $active;
    }
}
