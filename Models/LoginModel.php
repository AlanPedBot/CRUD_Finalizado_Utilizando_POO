<?php
require_once '../Configuration/ConnectLog.php';
include_once '../Controllers/LoginController.php';

// namespace Configuration;
// namespace Controllers;

// use Connect;

class LoginModel extends ConnectLog{
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
// Funções Executoras

function logar($emailR, $senhaR){
    $emailR = $this->getEmail();
    $entrarR = $this->getEntrar();
    $senhaR = md5($this->getPassWord());
  if (isset($entrarR)) {
    $sql = $this->conectLog->query("SELECT * FROM $this->table WHERE email = '{$emailR}'
    AND senha = '{$senhaR}'") or die("erro ao selecionar");
    if (($sql) && ($sql->rowCount()<=0)){
        echo "<p style ='width: 350px;
                    margin: 10px auto;
                    padding: 10px;
                    background-color: rgb(250, 128, 114, 0.3);
                    border: 1px solid rgb(165, 42, 42); text-size:5pt'>Login e/ou senha incorretos!</p>";
                    return $sql;
        die();
      }else{
        $dado = $sql->fetch();
        session_start();
        $_SESSION['id'] = $dado['id'];
        $_SESSION['nome'] = $dado['nome'];
        echo"<script language='javascript' type='text/javascript'>;window.location.
        href='../views/home'</script>";
        return $dado;
      }
     
  }
          }
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
function getEntrar(){
    return $this->entrar;
}
function setEntrar($entrar){
    $this->entrar = $entrar;

}
}
?>