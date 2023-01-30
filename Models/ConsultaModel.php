<?php
require_once '../Configuration/ConnectLi.php';
include_once '../Controllers/ConsultaController.php';

// namespace Configuration;
// namespace Controllers;

// use Connect;

class ConsultaModel extends ConnectLi{
    private $table;
    private $num;
    
    function __construct()
    {
        parent::__construct();
        $this->table = 'books';
    }
    function getBusca(){
        $num = $this->getNum();
        $sqlSelect = $this->conectaLib->query("SELECT * FROM $this->table WHERE id = '{$num}'");
        $result = $sqlSelect->fetchAll();
        return $result;

    }
    function getNum(){
        return $this->num;
    }
    function setNum($num){
       $this->num = $num;
    }

}



?>