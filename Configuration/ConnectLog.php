<?php
// Neste arquivo é feita toda a conexão com o banco de dados books utilizando o .env e o gitignore para privar as informações do banco
include_once '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

class ConnectLog{
    protected $conectaLog;

    function __construct(){
            $this->conectaLogin();
        }
    function conectaLogin(){
        $local_serve = $_ENV['LOCAL_SERVE'];
        $usuario_serve = $_ENV['USE_SERVE'];
        $senha_serve = $_ENV['SENHA_SERVE'];
        $banco_de_dados1 = $_ENV['BANCO_DADOS2'];
    
        try{
            $this->conectaLog = new PDO("mysql:host=$local_serve;dbname=$banco_de_dados1", $usuario_serve, $senha_serve);
           
        }catch(PDOException $ex){
            return $ex->getMessage();
            die();
    
        }
    }

}