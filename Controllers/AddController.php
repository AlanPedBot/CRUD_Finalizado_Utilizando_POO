<?php
require_once '../Models/AddModel.php';

class AddController extends AddModel{
    private $model;
    private $name;
    private $session;
    public $max_link = 5;


    public function __construct()
    {
        $this->model = new AddModel();
    }

    // Funções executoras;
    function insertC(){
        $result = $this->model->insert();
        return $result;
    }
    function paginationC(){
        $resultP = $this->model->pagination();
        return $resultP;
    }
    function countC(){
        $countQPage = $this->model->count();
        return $countQPage;
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
        return $this->max_link;
    }
    function setMaxLC($max_link){
        $this->max_link = $max_link;
    }
}

?>