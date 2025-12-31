<?php
class user {
    protected $id;
    protected $name;
    protected $email;
    protected $password;
    protected $role;
    protected $active;
     

    public function __construct($id,$name,$email,$password,$role,$active)

    {
      $this-> id =$id;
      $this-> name =$name;
      $this-> email=$email;
      $this-> password=$password;
      $this-> role=$role;
      $this->active=$active;
    }
     public function getId() {
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getRole(){
        return $this->role;
    }

    public function isActive(){
        return $this->active;
    }



     public function setName( $name){
        $this->name = $name;
    }

    public function setEmail( $email){
        $this->email = $email;
    }

    public function setPassword( $password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setRole( $role){
        $this->role = $role;
    }

    public function setActive( $active){
        $this->active = $active;
    }

}