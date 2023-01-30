<?php
require_once '../Configuration/ConnectLi.php';
include_once '../Controllers/DeleteController.php';

// namespace Configuration;
// namespace Controllers;

// use Connect;

class DeleteModel extends ConnectLi{
    private $table;
    private $id;
    public $limite_resultado = 10;
   
    function __construct()
    {
        parent::__construct();
        $this->table = 'books';
    }
    function delete(){
        $i = $this->getId();
        $sqlDelete = $this->conectaLib->query("DELETE FROM $this->table WHERE id = '{$i}'");
        $resultDelete = $sqlDelete;
        return $resultDelete;
    }
    function consult(){
        $i = $this->getId();
        $sqlConsul = $this->conectaLib->query("SELECT * FROM $this->table WHERE id = '{$i}'");
        $resultC = $sqlConsul->fetchAll();
        return $resultC;
    }
    function count(){
        $query_qnt_registros = "SELECT COUNT(id) AS num_result FROM $this->table";
        $result_qnt_registros = $this->conectaLib->prepare($query_qnt_registros);
        $result_qnt_registros->execute();
        $row_qnt_registros = $result_qnt_registros->fetch(PDO::FETCH_ASSOC);

    //Quantidade de página
        $qnt_pagina = ceil($row_qnt_registros['num_result'] / $this->limite_resultado);
        return $qnt_pagina;
}
 // Função da paginação
    function pagination(){
        $pagina_atual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
    
        //Calcula o inicio da visualização
        $inicio = ($this->limite_resultado * $pagina) - $this->limite_resultado;

        $query_usuarios = "SELECT * FROM books LIMIT $inicio, $this->limite_resultado";
        $result_usuarios = $this->conectaLib->prepare($query_usuarios);
        $result_usuarios->execute();
        return $result_usuarios;
    
}
    // Getters e Setters 
    function getId(){
        return $this->id;
    }
    function setId($id){
        $this->id = $id;
    }
}
?>