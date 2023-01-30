<?php
require_once '../Configuration/ConnectLog.php';
include_once '../Controllers/CadastrarController.php';

// namespace Configuration;
// namespace Controllers;

// use Connect;

class CadastrarModel extends ConnectLog{
    private $table;
    private $name;
    private $phone;
    private $password;
    private $email;
    private $entrar;
    
    function __construct()
    {
        parent::__construct();
        $this->table = 'users';
    }
    function cadastrar($nomeR, $telefoneR, $emailR, $senhaR){
        $nomeR = $this->getName();
        $telefoneR = $this->getPhone();
        $emailR = $this->getEmail();
        $senhaR = $this->getPassWord();
        $sql = $this->conectaLog->query("SELECT id FROM $this->table WHERE email ='{$emailR}'");
        //  return $sqlResult;
        if($sql->rowCount()>0){
            return false;
        }
        else{
            $sqlInsert = $this->conectaLog->query("INSERT INTO $this->table (nome, telefone, email, senha) VALUES('{$nomeR}','{$telefoneR}','{$emailR}',md5('{$senhaR}'))");
            $resultI = $sqlInsert;
            return $resultI;
            return true;
        }
        
    }
    // Está função realiza o login dos usuários que estão cadastrados no banco de dados

    // Getters e Setters
    function getName(){
        return $this->name;
    }
    function getPhone(){
        return $this->phone;
    }
    function getPassWord(){
        return $this->password;
    }
    function getEmail(){
        return $this->email;
    }
    function getEntrar(){
        return $this->entrar;
    }
    function setName($name){
        $this->name = $name;
    }
    function setPhone($phone){
        $this->phone = $phone;
    }
    function setPassWord($password){
        $this->password = $password;
    }
    function setEmail($email){
        $this->email = $email;
    }
    function setEntrar($entrar){
        $this->entrar = $entrar;
    }
}
?>