<?php
require_once '../Models/UpdateModel.php';

class UpdateController extends UpdateModel{
    private $model;
    private $nameC;
    private $sessionC;
    private $idC;
    public $max_link = 5;


    public function __construct()
    {
        $this->model = new UpdateModel();
    }
    // Funções executoras;
    function editC(){
        $resultC = $this->model->edit();
        return $resultC;
    }
    function countC(){
        $countQPage = $this->model->count();
        return $countQPage;
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
        return $this->max_link;
    }
    function setMaxLC($max_link){
        $this->max_link = $max_link;
    }

}

?>