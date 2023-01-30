<?php
require_once '../Models/AtualizaModel.php';

// namespace Models;
// namespace Controllers;

// use Models;


class AtualizaController extends AtualizaModel{
    private $model;
    private $nameC;
    private $sessionC;
    private $idC;
    public $maximo_link = 5;


    public function __construct()
    {
        $this->model = new AtualizaModel();
    }
    // Funções executoras;
    function editC(){
        $resultC = $this->model->edit();
        return $resultC;
    }
    function countC(){
        $countQPagina = $this->model->count();
        return $countQPagina;
    }
    function paginationC(){
        $resultP = $this->model->pagination();
        return $resultP;
    }
    //Getters e Setters
    function getNameC(){
        return $this->nameC;
    }
    function getSessionC(){
        return $this->sessionC;
    }
    function getIdC(){
        return $this->idC;
    }
    function setNameC($nameC){
        $this->nameC = $nameC;
        $this->model->setName($this->nameC);
    }
    function setSessionC($sessionC){
        $this->sessionC = $sessionC;
        $this->model->setSession($this->sessionC);
    }
    function setIdC($idC){
        $this->idC = $idC;
        $this->model->setId($this->idC);
    }
    function getMaxLC(){
        return $this->maximo_link;
    }
    function setMaxLC($maximo_link){
        $this->maximo_link = $maximo_link;
    }

}

?>