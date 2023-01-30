<?php
require_once '../Models/CadastrarModel.php';

// namespace Models;
// namespace Controllers;

// use Models;


class CadastrarController extends CadastrarModel{
    private $model;
    private $nameC;
    private $phoneC;
    private $passwordC;
    private $emailC;

    public function __construct()
    {
        $this->model = new CadastrarModel();
    }
    // Funções Executoras
    function cadastrarC(){
        $nome = $this->getNameC();
        $telefone = $this->getPhoneC();
        $email = $this->getEmailC();
        $senha = $this->getPassWordC();
        $resultC = $this->model->cadastrar($nome, $telefone, $email, $senha);
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
}
?>