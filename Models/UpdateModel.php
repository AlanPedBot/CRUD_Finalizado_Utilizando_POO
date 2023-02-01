<?php
require_once '../Configuration/ConnectLi.php';
include_once '../Controllers/UpdateController.php';



class UpdateModel extends ConnectLi{
    private $table;
    private $table2;
    private $name;
    private $session;
    private $id;
    public $limited_result = 10;
   
    
    function __construct()
    {
        parent::__construct();
        $this->table = 'books';
        $this->table2 = 'sessions';
    }
    
    function edit(){
        $n = $this->getName();
        $s = $this->getSession();
        $i = $this->getId();
        $sqlUpdate = $this->conectLib->query("UPDATE $this->table SET name = '{$n}', session_id = '{$s}' WHERE id = '{$i}'");
        $result = $sqlUpdate;
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
        return $this->name;
    }
    function getSession(){
        return $this->session;
    }
    function getId(){
        return $this->id;
    }
    function setName($name){
        $this->name = $name;
    }
    function setSession($session){
        $this->session = $session;
    }
    function setId($id){
        $this->id = $id;
    }
}

?>