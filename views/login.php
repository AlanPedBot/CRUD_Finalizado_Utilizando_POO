<?php
// // É iniciado uma sessão 
session_start();
include_once '../Configuration/ConnectLog.php';
require_once('../Controllers/LoginController.php');
require_once '../Models/LoginModel.php';
require_once '../Configuration/ConnectLog.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../views/css/style_Login.css">
    <title>LOGIN</title>
</head>

<body style="background-image: url(../images/fundo1.jpg); background-position: 50% 60%;">
    <div style=" margin:150px auto 0px auto; width: 420px; text-align:center;">
        <h1>Entrar</h1>
        <form method="POST" action="">
            <input type="text" name="email" placeholder="Email" maxlength="40" required>
            <input type="password" name="senha" placeholder="Senha" maxlength="15" required>
            <input type="submit" value="ACESSAR" name="entrar">
            <div>
                <div>
                    <a href="cadastrar">Ainda não está
                        cadastrado?<strong> Cadastre-se!</strong></a>
                </div>
            </div>
        </form>
    </div>
    <?php
$email = $_POST['email'];
$senha = $_POST['senha'];
$entrar = $_POST['entrar'];
    $controller = new LoginController();
    $controller->setEmailC($email);
    $controller->setPassWordC($senha);
    $controller->setEntrarC($entrar);
    $controller->logarC();
    
  if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
    ?>
</body>

</html>