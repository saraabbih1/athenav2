<?php

class Project
{
    protected ?int $id = null;
    protected  $title;
    protected $description;
    protected  $managerId; 
    protected $startDate;
    protected $endDate; 
    protected  $active;
   

    public function __construct($title,$description,$managerId,$endDate,$startDate,$active)
    {
        $this->title       = $title;
        $this->description = $description;
        $this->managerId   = $managerId;
        $this->startDate   = $startDate;
        $this->endDate     =$endDate;
        $this->active      = $active;

    }  
    

  
    public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
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

   public function getEndDate() {
     return $this->endDate;
     }


     public function getstartDate() { 
        return $this->startDate; 
    }
    
    public function setTitle( $title){
        $this->title = $title;
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
    public function setId($id) {
        $this->id = $id;
    }
}
