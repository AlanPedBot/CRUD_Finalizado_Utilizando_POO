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
require_once('../Controllers/DeleteController.php');
require_once '../Models/DeleteModel.php';
require_once '../Configuration/ConnectLi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../views/css/style_Library.css">

    <title>DELETA LIVROS</title>
</head>

<body>
    <?php
     if(isset($_SESSION['msgd'])){
        echo $_SESSION['msgd'];
        unset($_SESSION['msgd']);
    }
    // Pega o id
    $id = $_POST['id'];
    $controller = new DeleteController();
    $controller->setIdC($id);
    $d = $controller->deleteC();

    if(isset($_POST["deleta"])){
    if($d->rowCount() == 1){
        $_SESSION['msgd'] =  "<p style =' width: 350px;
        font-size: 20px;
        margin: 10px auto;
        padding: 10px;
        background-color: rgb(50, 205, 50, 0.3);
        border: 1px solid rgb(34, 139, 34);'>Livro deletado com sucesso!!!</p>";
        header('location: ./delete');
        
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
        <div class="mx-auto" style="margin-top: 10px;">
            <h1>Deleta Livros</h1>
            <p class="fs-2 bg-dark">Id</p>

            <input class="w-25 p-3" type="number" name="id" placeholder="Digite o id do livro" required>
        </div>
        <button type="button" class="btn btn-danger btn-lg" style="margin-top: 15px;" data-bs-toggle="modal"
            data-bs-target="#staticBackdrop">DELETAR</button>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class=" modal-dialog">
                <div class=" modal-content" style="background-color:gray">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel" style="color: red; font-weight:bold;">
                            ALERTA</h1>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p style="color:black;font-weight:bold;">Tem certeza que deseja deletar este ID?
                            Você não voltará
                            a velo
                            novamente!!!
                        </p>
                        <div>
                            <img src="https://cdn-icons-png.flaticon.com/512/564/564619.png" alt=""
                                style="height: 80px; width: 80px">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="deleta" class="btn btn-danger">EXCLUIR</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">CANCELAR</button>
                    </div>
                </div>
            </div>
        </div>
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

    <div class="container" style="margin-top: 20px; margin-bottom:10px; margin-top: 80px;">
        <h3 style="margin-bottom: 20px; font-weight:bold;">Na tabela abaixo é possível escolher qual informação pode ser
            deletada no banco
            de dados</h3>
        <table class="table table-secondary table-hover" style=" margin: 0 auto;">
            <tr>
                <th width="30%"><strong>ID </strong></th>
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
                //var_dump($row_usuario);
                extract($row_usuario);
                ?>
    <table class="table table-secondary table-hover" style="margin: 0 auto; margin-bottom:10px;">
        <tr>
            <td width="30%"><?php echo $row_usuario['id']; ?></td>
            <td width="30%"><?php echo $row_usuario['name']; ?></td>
            <td width="30%"><?php echo $row_usuario['book_borrowed_id']; ?></td>
            <td width="30%"><?php echo $row_usuario['session_id']; ?></td>
        </tr>
    </table>
    <?php
            }
            $qnt_pagina = $controller->countC();
            $maximo_link = $controller->getMaxLC();
            echo "<button type='button' class='btn btn-light'style='margin-bottom: 15px; margin-right: 3px;color:black;'><a href='delete?page=1'style='color:black;'>Primeira</a></li> </button>";

            for ($pagina_anterior = $pagina - $maximo_link; $pagina_anterior <= $pagina - 1; $pagina_anterior++) {
                if ($pagina_anterior >= 1) {
                    echo "<button type='button' class='btn btn-light'style='margin-bottom: 15px; margin-right: 3px;color:black;'><a href='delete?page=$pagina_anterior'style='color:black;'>$pagina_anterior</a></li> </button>";
                }
            }

            echo "<a style='color:black;'href=''>$pagina</a> ";

            for ($proxima_pagina = $pagina + 1; $proxima_pagina <= $pagina + $maximo_link; $proxima_pagina++) {
                if ($proxima_pagina <= $qnt_pagina) {
                    echo "<button type='button' class='btn btn-light'style='margin-bottom: 15px; margin-right: 3px;color:black;'><a href='delete?page=$proxima_pagina'style='color:black;'>$proxima_pagina</a></li> </button>";
                }
            }

            echo "<button type='button' class='btn btn-light'style='margin-bottom: 15px; margin-right: 3px;color:black;'><a href='delete?page=$qnt_pagina' style='color:black;'>Última</a> </li> </button>";
        } else {
            echo "<p style='color: #f00;'>Erro!</p>";
        }
        ?>
    </div>
</body>

</html>