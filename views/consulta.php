<?php
session_start();
ob_start();
include_once '../Configuration/ConnectLog.php';
// Verifica se existe algum id relacionado com o login se não houver retorna para o login
if(!isset($_SESSION["id"]))
{
    header("Location: ../views/login");
}

// namespace Models;
// namespace views;
// namespace Controllers;

include_once('../views/header.php');
require_once('../Controllers/ConsultaController.php');
require_once '../Models/ConsultaModel.php';
require_once '../Configuration/ConnectLi.php';




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../views/css/style_Library.css">

    <title>BUSCA LIVRO</title>
</head>

<body>
    <?php
if(isset($_SESSION['msgco'])){
    echo $_SESSION['msgco'];
    unset($_SESSION['msgco']);
}


$num = $_POST['id'];
$controller = new ConsultaController();
$controller->setNumc($num);
$controller->getNumc();
$result = $controller->getAllBusca();
$count = count($result);

if(isset($_POST["consulta"])){
  if($count == 1){
    $_SESSION['msgco'] =  "<p style =' width: 350px;
    font-size: 20px;
    margin: 10px auto;
    padding: 10px;
    background-color: rgb(50, 205, 50, 0.3);
    border: 1px solid rgb(34, 139, 34);'>Busca realizada com sucesso!!!</p>";
    header('location: ./consulta');
    
}else{
    echo "<p style ='width: 350px;
    font-size: 20px;
    margin: 10px auto;
    padding: 10px;
    background-color: rgb(250, 128, 114, 0.3);
    border: 1px solid rgb(165, 42, 42); text-size:5pt'>Id Inválido!</p>";
  
}
}
?>
    <!-- formulario que pega as informações pelos inputs -->
    <form method="post" action="">
        <div class="mx-auto" style="margin-top:10px;">
            <h1>Buscando Livros</h1>
            <p class=" fs-2 bg-dark">ID_LIVRO</p>

            <input class="w-25 p-3" type="number" name="id" placeholder="Digite o id do livro" required>
        </div>
        <button type="submit" name="consulta" class="btn btn-light btn-lg" style="margin-top: 15px;">BUSCAR</button>
    </form>

    <div class="container" style="margin-top: 20px;">
        <table class=" table table-secondary table-hover" style="margin: 0 auto;">
            <tr>
                <th width="30%"><strong>ID </strong></th>
                <th width="30%"><strong> Nome_livro</strong></th>
                <th width="30%"><strong>Id_Emprestado</strong></th>
                <th width="30%"><strong>Id_Sessão</strong></th>
            </tr>
        </table>
    </div>
    <?php   
        //   Faz a busca de todos os registros do banco de dados 
             foreach ($result as $busca){              
?>
    <table class="table table-secondary table-hover" style="margin: 0 auto;">
        <tr>
            <td width="30%"><?php echo $busca['id']; ?></td>
            <td width="30%"><?php echo $busca['name']; ?></td>
            <td width="30%"><?php echo $busca['book_borrowed_id']; ?></td>
            <td width="30%"><?php echo $busca['session_id']; ?></td>
        </tr>
    </table>
    <?php
        }     
    ?>

</body>

</html>