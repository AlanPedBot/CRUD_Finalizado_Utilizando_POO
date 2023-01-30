<?php
require_once '../Configuration/ConnectLi.php';
include_once '../Controllers/AdicionaController.php';

// namespace Configuration;
// namespace Controllers;

// use Connect;

class AdicionaModel extends ConnectLi{
    private $table;
    private $name_l;
    private $id_session;
    public $limite_resultado = 10;
   
    
    function __construct()
    {
        parent::__construct();
        $this->table = 'books';
    }
    function getInsert(){

        $name_l = $this->getName();
        $id_session = $this->getSession();
        $sqlInsert = $this->conectaLib->query("INSERT INTO $this->table (name, session_id) VALUES ('{$name_l}', '{$id_session}')");
        $result = $sqlInsert;
        return $result;
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

    // Function Conta Resgistros no banco de dados
    function count(){
            $query_qnt_registros = "SELECT COUNT(id) AS num_result FROM $this->table";
            $result_qnt_registros = $this->conectaLib->prepare($query_qnt_registros);
            $result_qnt_registros->execute();
            $row_qnt_registros = $result_qnt_registros->fetch(PDO::FETCH_ASSOC);

            //Quantidade de página
            $qnt_pagina = ceil($row_qnt_registros['num_result'] / $this->limite_resultado);
            return $qnt_pagina;
            // Maximo de itens por pagina
    }

    // Getters e Setters 
    function getName(){
        return $this->name_l;
    }
    function setName($name_l){
       $this->name_l = $name_l;
    }
    function getSession(){
        return $this->id_session;
    }
    function setSession($id_session){
        $this->id_session = $id_session;
    }   
    
}

?>