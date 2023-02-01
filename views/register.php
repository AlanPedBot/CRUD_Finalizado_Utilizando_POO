<?php
require_once('../Controllers/RegisterController.php');
require_once '../Models/RegisterModel.php';
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
    <title>CADASTRO</title>
</head>

<body style="background-image: url(../images/fundo1.jpg); background-position: 50% 60%;">
    <div style=" margin:80px auto 0px auto; width: 420px; text-align:center;">
        <h1>Cadastrar</h1>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Nome Completo" maxlength="30" required>
            <input type="text" name="phone" placeholder="Telefone" maxlength="30" required>
            <input type="email" name="email" placeholder="Email" maxlength="40" required>
            <input type="password" name="password" placeholder="Senha" maxlength="15" required>
            <input type="password" name="confirmPassword" placeholder="Confirme sua Senha" maxlength="15" required>
            <input type="submit" name="register" value="CADASTRAR">
            <div>
                <div>
                    <a href="login">Fazer login!<strong> Logar!</strong></a>
                </div>
            </div>
        </form>
    </div>
    <?php
        if(isset($_POST['name'])){

            $name = addslashes($_POST['name']);
            $phone = addslashes($_POST['phone']);
            $email = addslashes($_POST['email']);
            $password = addslashes($_POST['password']);
            $confirmPassword = addslashes($_POST['confirmPassword']);

            $controller = new registerController();
            $controller->setNameC($name);
            $controller->setPhoneC($phone);
            $controller->setEmailC($email);
            $controller->setPassWordC($password);
            $controller->setConfirmPasswordC($confirmPassword);
            $register = $controller->registerC();

        
            if($password == $confirmPassword){
                    
                if($register>0){
                    echo "<p style =' width: 350px;
                    margin: 10px auto;
                    padding: 10px;
                    background-color: rgb(50, 205, 50, 0.3);
                    border: 1px solid rgb(34, 139, 34);'>Cadastrado com sucesso! Acesse para entrar</p>";  
                }else{
                    echo "<p style ='width: 350px;
                    margin: 10px auto;
                    padding: 10px;
                    background-color: rgb(250, 128, 114, 0.3);
                    border: 1px solid rgb(165, 42, 42); text-size:5pt'>Email já cadastrado!</p>";
        
                }
            }
            else{
                echo "<p style ='width: 350px;
                margin: 10px auto;
                padding: 10px;
                background-color: rgb(250, 128, 114, 0.3);
                border: 1px solid rgb(165, 42, 42);'>Senha e confirmar senha não são iguais!</p>";    
            }
        }
?>
</body>

</html>