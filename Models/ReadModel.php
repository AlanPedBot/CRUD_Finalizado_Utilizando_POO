<?php
require_once '../Configuration/ConnectLi.php';
include_once '../Controllers/ReadController.php';

class ReadModel extends ConnectLi{
    private $table;
    private $num;
    
    function __construct()
    {
        parent::__construct();
        $this->table = 'books';
    }
    function read(){
        $num = $this->getNum();
        $sqlSelect = $this->conectLib->query("SELECT * FROM $this->table WHERE id = '{$num}'");
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