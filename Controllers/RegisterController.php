<?php
require_once '../Models/RegisterModel.php';

// namespace Models;
// namespace Controllers;

// use Models;


class RegisterController extends RegisterModel{
    private $model;
    private $nameC;
    private $phoneC;
    private $passwordC;
    private $emailC;
    private $confirm_PasswordC;

    public function __construct()
    {
        $this->model = new RegisterModel();
    }
    // Funções Executoras
    function registerC(){
        $name = $this->getNameC();
        $phone = $this->getPhoneC();
        $email = $this->getEmailC();
        $password = $this->getPassWordC();
        $resultC = $this->model->register($name, $phone, $email, $password);
        return $resultC;
    }
    // Getters e Setters 
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
    function getConfirmPasswordC(){
        return $this->confirm_PasswordC;
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
    function setConfirmPasswordC($confirm_PasswordC){
        $this->confirm_PasswordC = $confirm_PasswordC;
        $this->model->setConfirmPassword($this->confirm_PasswordC);

    }
}
?>