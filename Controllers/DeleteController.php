<?php
require_once '../Models/DeleteModel.php';

class DeleteController extends DeleteModel{
    private $model;
    private $id;
    public $max_link = 5;


    public function __construct()
    {
        $this->model = new DeleteModel();
    }
     // Funções executoras;
     function deleteC(){
        $resultD = $this->model->delete();
        return $resultD;
    }
    function consultC(){
        $resultC = $this->model->consult();
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
    // Getters e Setters
    function getIdC(){
        return $this->id;
    }
    function setIdC($id){
        $this->id = $id;
        $this->model->setId($this->id);
    }
    function getMaxLC(){
        return $this->max_link;
    }
    function setMaxLC($max_link){
        $this->max_link = $max_link;
    }
}
?>