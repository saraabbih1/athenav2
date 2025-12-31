<?php
require_once __DIR__.'/../core/Database.php';
require_once __DIR__.'/../entities/User.php';

class UserRepository{
    private  $db;
    public function __construct()
    {
        $this->db = Database :: connect();
    }
    public function findByEmail(string $email): ?User{
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$data){
            return null;
        }
        return new  User ( $data['id'] , $data['name'] , $data['email'] , $data['password'] , $data['role'],$data['active'] );
        
    } 
    public function create (user $user){
        $sql="INSERT INTO users ( name , email , password , role)VALUES(?,?,?,?)";
        $stmt=$this->db->prepare($sql);
        $stmt-> execute ([$user->getname(),$user->getemail(),$user->getpassword(),$user->getrole()]);
    }
}