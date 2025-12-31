<?php
class Database {
    private static $pdo = null;

    private static $host = "localhost";
    private static $db = "athena";
    private static $user = "root";
    private static $pass ="root";

    public static function connect(){
        if(self::$pdo===null){
            try{
                self::$pdo = new PDO(
                    "mysql:host=" . self::$host . ";dbname=" .self::$db . ";charset=utf8", self::$user,self::$pass);
                self :: $pdo->setAttribute(PDO :: ATTR_ERRMODE,PDO ::  ERRMODE_EXCEPTION ) ;
                 } catch (PDOException $e){
                    die("Erreur connexion DB : " . $e->getMessage());
                }
            
            return self ::$pdo;
        }

    }

}