<?php
require_once '../Configuration/ConnectLog.php';
include_once '../Controllers/RegisterController.php';

// namespace Configuration;
// namespace Controllers;

// use Connect;

class RegisterModel extends ConnectLog{
    private $table;
    private $name;
    private $phone;
    private $password;
    private $email;
    private $confirmPassword;
    
    function __construct()
    {
        parent::__construct();
        $this->table = 'users';
    }
    function register($nameR, $phoneR, $emailR, $passwordR){
        $nameR = $this->getName();
        $phoneR = $this->getPhone();
        $emailR = $this->getEmail();
        $passwordR = $this->getPassWord();
        $confirmPasswordR = $this->getConfirmPassword();
  
        $sql = $this->conectLog->query("SELECT id FROM $this->table WHERE email ='{$emailR}'");
        //  return $sqlResult;
        if($sql->rowCount()>0){
            return false;
        }
        elseif($passwordR == $confirmPasswordR){
            $sqlInsert = $this->conectLog->query("INSERT INTO $this->table (nome, telefone, email, senha) VALUES('{$nameR}','{$phoneR}','{$emailR}',md5('{$passwordR}'))");
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
    function getConfirmPassword(){
        return $this->confirmPassword;
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
    function setConfirmPassword($confirmPassword){
        $this->confirmPassword = $confirmPassword;
    }
}
?>