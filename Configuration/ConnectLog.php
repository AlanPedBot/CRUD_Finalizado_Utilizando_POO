<?php
// Neste arquivo é feita toda a conexão com o banco de dados books utilizando o .env e o gitignore para privar as informações do banco
include_once '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

class ConnectLog{
    protected $conectLog;

    function __construct(){
            $this->conectaLogin();
        }
    function conectaLogin(){
        $local_serve = $_ENV['LOCAL_SERVE'];
        $user_serve = $_ENV['USE_SERVE'];
        $password_serve = $_ENV['SENHA_SERVE'];
        $database2 = $_ENV['BANCO_DADOS2'];
    
        try{
            $this->conectLog = new PDO("mysql:host=$local_serve;dbname=$database2", $user_serve, $password_serve);
           
        }catch(PDOException $ex){
            return $ex->getMessage();
            die();
    
        }
    }

}