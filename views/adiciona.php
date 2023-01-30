<?php

session_start();
ob_start();
include_once '../Configuration/ConnectLog.php';
// Verifica se existe algum id relacionado com o login se não houver retorna para o login
if(!isset($_SESSION["id"]))
{
    header("Location: ../views/login");
}

include_once('../views/header.php');
require_once('../Controllers/AdicionaController.php');
require_once '../Models/AdicionaModel.php';
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
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../views/css/style_Library.css">

    <title>ADICIONA LIVROS</title>
</head>

<body>
    <?php

     if(isset($_SESSION['msgc'])){
        echo $_SESSION['msgc'];
        unset($_SESSION['msgc']);
    }
           
       // pega o valor enviado pelos inputs
           $name = $_POST["nome"];
           $id_s = $_POST["id_s"];

           $controller = new AdicionaController();
           $controller->setNamec($name);
           $controller->setSessionC($id_s);
           $resultI = $controller->insertC();
           print_r($bot);

    if(isset($_POST["adiciona"])){
       if($resultI){
        $_SESSION['msgc'] =  "<p style =' width: 350px;
           font-size: 20px;
           margin: 10px auto;
           padding: 10px;
           background-color: rgb(50, 205, 50, 0.3);
           border: 1px solid rgb(34, 139, 34);'>Livro adicionado com sucesso!!!!</p>";
           header('location: ./adiciona');
           
       }else{
        echo "<p style ='width: 350px;
           font-size: 20px;
           margin: 10px auto;
           padding: 10px;
           background-color: rgb(250, 128, 114, 0.3);
           border: 1px solid rgb(165, 42, 42); text-size:5pt'>Erro, Id inválido!</p>";
         
       }
    }
    ?>
    <!-- formulario que pega as informações pelos inputs  -->
    <form method="POST" action="">
        <div class="mx-auto" style="margin-top: 10px;">
            <h1>Inserindo Livro</h1>
            <p class="fs-2 bg-dark">NOME </p>
            <input class="w-25 p-3" type="text" name="nome" placeholder="Digite o nome do livro" required>


            <p class="fs-2 bg-dark" style="margin-top: 15px;">ID_SESSÃO</p>

            <input class="w-25 p-3" type="number" name="id_s" placeholder="Digite a sessão do livro" required>
        </div>
        <button type="submit" name="adiciona" class="btn btn-primary btn-lg"
            style="margin-top: 15px;">ADICIONAR</button>
    </form>
    <div>
        <div class="position-relative" style="margin-top: 20px;">
            <h3 style="font-weight:bold;">Você deve escolher um ID de sessão que exista no banco de dados</h3>
            <h5>SEGUE AS 10 SESSÕES EXISTENTES NO BANCO DE DADOS:</h5>
            <div class="list-group" style="margin-top: 20px; align-items: center;">
                <ol class="list-group list-group-numbered" style="height:400px; width:400px;">
                    <li class="list-group-item">Drama</li>
                    <li class="list-group-item">Ficção Cientifica</li>
                    <li class="list-group-item">Romance</li>
                    <li class="list-group-item">Conto</li>
                    <li class="list-group-item">Fantasia</li>
                    <li class="list-group-item">Terror</li>
                    <li class="list-group-item">Chick Lit</li>
                    <li class="list-group-item">Distopia</li>
                    <li class="list-group-item">Aventura</li>
                    <li class="list-group-item">Suspense</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 20px; margin-top: 80px;">
        <h3 style="margin-bottom: 20px;font-weight:bold;">Na tabela abaixo é possível verificar se o livro foi inserido
        </h3>
        <table class="table table-secondary table-hover" style=" margin: 0 auto;">
            <tr>
                <th width=" 30%"><strong>ID </strong></th>
                <th width="30%"><strong> Nome_livro</strong></th>
                <th width="30%"><strong>Id_Emprestado</strong></th>
                <th width="30%"><strong>Id_Sessão</strong></th>
            </tr>
        </table>
    </div>
    <?php
        $result_usuarios = $controller->paginationC();
        

        if (($result_usuarios) AND ($result_usuarios->rowCount() != 0)) {
            while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
                extract($row_usuario);
                ?>
    <div class="container" style="margin-top: 20px; align-items: center; margin-bottom:10px;">
        <table class="table table-secondary table-hover" style="margin: 0 auto;">
            <tr>
                <td width="30%"><?php echo $row_usuario['id']; ?></td>
                <td width="30%"><?php echo $row_usuario['name']; ?></td>
                <td width="30%"><?php echo $row_usuario['book_borrowed_id']; ?></td>
                <td width="30%"><?php echo $row_usuario['session_id']; ?></td>
            </tr>
        </table>
    </div>
    <?php   } ?>
    <?php
            $qnt_pagina = $controller->countC();
            $maximo_link = $controller->getMaxLC();

            echo "<button type='button' class='btn btn-light'style='margin-bottom: 15px; margin-right: 3px;color:black;'><a href='adiciona?page=1'style='color:black;'>Primeira</a></li> </button>";

            for ($pagina_anterior = $pagina - $maximo_link; $pagina_anterior <= $pagina - 1; $pagina_anterior++) {
                if ($pagina_anterior >= 1) {
                    echo "<button type='button' class='btn btn-light'style='margin-bottom: 15px; margin-right: 3px;color:black;'><a href='adiciona?page=$pagina_anterior'style='color:black;'>$pagina_anterior</a></li> </button>";
                }
            }

            echo "<a style='color:black;'href=''>$pagina</a> ";

            for ($proxima_pagina = $pagina + 1; $proxima_pagina <= $pagina + $maximo_link; $proxima_pagina++) {
                if ($proxima_pagina <= $qnt_pagina) {
                    echo "<button type='button' class='btn btn-light'style='margin-bottom: 15px; margin-right: 3px;color:black;'><a href='adiciona?page=$proxima_pagina'style='color:black;'>$proxima_pagina</a></li> </button>";
                }
            }

            echo "<button type='button' class='btn btn-light'style='margin-bottom: 15px; margin-right: 3px;color:black;'><a href='adiciona?page=$qnt_pagina' style='color:black;'>Última</a> </li> </button>";
        } else {
            echo "<p style='color: #f00;'>Erro: Nenhum usuário encontrado!</p>";
        }
        ?>
</body>

</html>