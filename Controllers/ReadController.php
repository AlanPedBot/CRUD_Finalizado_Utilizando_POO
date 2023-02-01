<?php
require_once '../Models/ReadModel.php';

class ReadController extends ReadModel{
    private $model;
    private $num;

    public function __construct()
    {
        $this->model = new ReadModel();
    }
    function getAllBusca(){
        $result = $this->model->read();
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