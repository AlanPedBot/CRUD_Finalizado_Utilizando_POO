<?php
require_once '../Models/AdicionaModel.php';

// namespace Models;
// namespace Controllers;

// use Models;


class AdicionaController extends AdicionaModel{
    private $model;
    private $name;
    private $session;
    public $maximo_link = 5;


    public function __construct()
    {
        $this->model = new AdicionaModel();
    }

    // Funções executoras;
    function insertC(){
        $result = $this->model->getInsert();
        return $result;
    }
    function paginationC(){
        $resultP = $this->model->pagination();
        return $resultP;
    }
    function countC(){
        $countQPagina = $this->model->count();
        return $countQPagina;
    }
     // Getters e Setters
    function getNameC(){
        return $this->name;
       

    }
    function setNamec($name){
        $this->name = $name;
        $this->model->setName($this->name);
        
    }
    function getSessionC(){
        return $this->session;
       

    }
    function setSessionC($session){
        $this->session = $session;
        $this->model->setSession($this->session);
        
    }
    function getMaxLC(){
        return $this->maximo_link;
    }
    function setMaxLC($maximo_link){
        $this->maximo_link = $maximo_link;
    }
}

?>