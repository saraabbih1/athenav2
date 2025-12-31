<?php

class Task
{
    protected int $id;
    protected int $sprintId;
    protected int $assignedTo;   
    protected string $title;
    protected string $description;
    protected string $status;    
    protected string $priority;  
    protected string $createdAt;

    public function __construct( $id ,$sprintId ,$assignedTo,$title ,$description , $status , $priority , $createdAt ) {
        $this->id          = $id;
        $this->sprintId    = $sprintId;
        $this->assignedTo  = $assignedTo;
        $this->title       = $title;
        $this->description = $description;
        $this->status      = $status;
        $this->priority    = $priority;
        $this->createdAt   = $createdAt;
    }

    public function getId(){
        return $this->id;
    }

    public function getSprintId(){
        return $this->sprintId;
    }

    public function getAssignedTo(){
        return $this->assignedTo;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getStatus(){
        return $this->status;
    }

    public function getPriority(){
        return $this->priority;
    }

    public function getCreatedAt(){
        return $this->createdAt;
    }

  
    public function setTitle(string $title){
        $this->title = $title;
    }

    public function setDescription(string $description){
        $this->description = $description;
    }

    public function setStatus(string $status){
        $this->status = $status;
    }

    public function setPriority(string $priority){
        $this->priority = $priority;
    }

    public function setAssignedTo(int $userId){
        $this->assignedTo = $userId;
    }
}
