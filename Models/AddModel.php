<?php
require_once '../Configuration/ConnectLi.php';
include_once '../Controllers/AddController.php';

class AddModel extends ConnectLi{
    private $table;
    private $name_l;
    private $id_session;
    public $limited_result = 10;
   
    
    function __construct()
    {
        parent::__construct();
        $this->table = 'books';
    }
    function insert(){

        $name_l = $this->getName();
        $id_session = $this->getSession();
        $sqlInsert = $this->conectLib->query("INSERT INTO $this->table (name, session_id) VALUES ('{$name_l}', '{$id_session}')");
        $result = $sqlInsert;
        return $result;
    }
    
    // Função da paginação
    function pagination(){
        $current_page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
        $page = (!empty($current_page)) ? $current_page : 1;
       
        //Calcula o inicio da visualização
        $init = ($this->limited_result * $page) - $this->limited_result;

        $query_users = "SELECT * FROM $this->table LIMIT $init, $this->limited_result";
        $result_users = $this->conectLib->prepare($query_users);
        $result_users->execute();
        return $result_users;
        
    }

    // Function Conta Resgistros no banco de dados
    function count(){
            $query_qnt_register = "SELECT COUNT(id) AS num_result FROM $this->table";
            $result_qnt_register = $this->conectLib->prepare($query_qnt_register);
            $result_qnt_register->execute();
            $row_qnt_register = $result_qnt_register->fetch(PDO::FETCH_ASSOC);

            //Quantidade de página
            $qnt_page = ceil($row_qnt_register['num_result'] / $this->limited_result);
            return $qnt_page;
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