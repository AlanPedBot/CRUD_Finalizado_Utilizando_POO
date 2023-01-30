<?php
require_once '../Models/ConsultaModel.php';

// namespace Models;
// namespace Controllers;

// use Models;


class ConsultaController extends ConsultaModel{
    private $model;
    private $num;

    public function __construct()
    {
        $this->model = new ConsultaModel();
    }
    function getAllBusca(){
        $result = $this->model->getBusca();
        return $result;
    
    }
    function getNumc(){
        return $this->num;
       

    }
    function setNumc($num){
        $this->num = $num;
        $this->model->setNum($this->num);
        
    }
}

?>