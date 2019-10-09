<?php


class Conexion{


    private $user;
    private $password;
    private $host;
    private $dbname;
    private $charset;

    public function __construct(){
        $this->user     = 'root';
        $this->password = '';
        $this->host     = 'localhost';
        $this->dbname   = 'api';
        $this->charset  = 'utf8mb4';
    }

    public function connect(){

        try{

            $conexion = "mysql:host=".$this->host.";dbname=".$this->dbname.";charset=".$this->charset;

            $options =[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                       PDO::ATTR_EMULATE_PREPARES => false];

            $pdo = new PDO($conexion,$this->user,$this->password,$options);

            return $pdo;

        }catch(PDOException $e){

            print_r("Error conexion...".$e->getMessage());

        }

    }

}


?>