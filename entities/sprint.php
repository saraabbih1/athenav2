<?php

class Sprint
{
    protected ? int $id=NULL;
    protected int $projectId;
    protected string $name;
    protected string $startDate;
    protected string $endDate;

    public function __construct(
          $projectId , $name, $startDate , $endDate) {
        $this->projectId = $projectId;
        $this->name      = $name;
        $this->startDate = $startDate;
        $this->endDate   = $endDate;
    }

    public function getId(){
        return $this->id;
    }

    public function getProjectId(){
        return $this->projectId;
    }

    public function getName(){
        return $this->name;
    }

    public function getStartDate(){
        return $this->startDate;
    }

    public function getEndDate(){
        return $this->endDate;
    }

    
    public function setName( $name){
        $this->name = $name;
    }

    public function setStartDate( $startDate){
        $this->startDate = $startDate;
    }

    public function setEndDate( $endDate){
        $this->endDate = $endDate;
    }
    public function setId($id){
        $this->id=$id;
    }
}
