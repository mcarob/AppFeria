<?php
class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        #$this->host     = 'feriadb.cwof09saidik.us-east-1.rds.amazonaws.com:3306';
        $this->host     = 'ferialaboral.crdrstm5rahm.us-east-2.rds.amazonaws.com';
        $this->db       = 'feria1_db';
        $this->user     = 'usuarioferiadb';
        $this->password = "3057900368";
        $this->charset  = 'utf8mb4';
    }

    function connect(){
        try{
            
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);
    
            return $pdo;

        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }   
    }
    }
?>