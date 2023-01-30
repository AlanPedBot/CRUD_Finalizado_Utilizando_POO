<?php
require_once '../Models/DeleteModel.php';

// namespace Models;
// namespace Controllers;

// use Models;

class DeleteController extends DeleteModel{
    private $model;
    private $id;
    public $maximo_link = 5;


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
        $countQPagina = $this->model->count();
        return $countQPagina;
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
        return $this->maximo_link;
    }
    function setMaxLC($maximo_link){
        $this->maximo_link = $maximo_link;
    }
}
?>