<?php
require_once '../Models/LoginModel.php';

// namespace Models;
// namespace Controllers;

// use Models;


class LoginController extends LoginModel{
    private $model;
    private $nameC;
    private $phoneC;
    private $passwordC;
    private $emailC;
    private $entrarC;

    public function __construct()
    {
        $this->model = new LoginModel();
    }
    // Funçoes Executoras
    function logarC(){
        $email = $this->getEmailC();
        $senha = $this->getPassWordC();
        $resultC = $this->model->logar($email, $senha);
        return $resultC;
    }

// Getters e Setters 
function getEntrarC(){
    return $this->entrarC;
}

function getNameC(){
    return $this->nameC;
}
function getPhoneC(){
    return $this->phoneC;
}
function getPassWordC(){
    return $this->passwordC;
}
function getEmailC(){
    return $this->emailC;
}
function setNameC($nameC){
    $this->nameC = $nameC;
    $this->model->setName($this->nameC);
}
function setPhoneC($phoneC){
    $this->phoneC = $phoneC;
    $this->model->setPhone($this->phoneC);
}
function setPassWordC($passwordC){
    $this->passwordC = $passwordC;
    $this->model->setPassWord($this->passwordC);
}
function setEmailC($emailC){
    $this->emailC = $emailC;
    $this->model->setEmail($this->emailC);
}
function setEntrarC($entrarC){
    $this->entrarC = $entrarC;
    $this->model->setEntrar($this->entrarC);
}
}





?>