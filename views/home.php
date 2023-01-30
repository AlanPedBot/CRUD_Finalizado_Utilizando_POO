<?php
session_start();
ob_start();
if(!isset($_SESSION["id"]))
{
    header("Location: ../views/login");
}
include_once('../views/header.php');
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
    <title>CRUD - BIBLIOTECA</title>
</head>

<body>
    <div class="container-fluid col-8">
        <h1 style="right: 30px;">
            <p style="padding-top:50px;"> Seja Bem Vindo! <?php echo $_SESSION['nome'] ?></p>

        </h1>
    </div>
    <div class="container-fluid col-5">
        <p style=" text-align: justify;"> Aqui você conseguirá fazer operações dentro de um banco de dados
            utilizando a
            biblioteca PDO(PHP Data Object) que é uma extensão da linguagem PHP para acesso a banco de dados.
            Totalmente
            orientado a objetos ele possui diversos
            recursos importantes, além de suporte a diversos mecanismos de banco de dados.</p>
    </div>

    <div class="container-fluid" style="margin-bottom:10px;">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner" style="height: 30em;">
                <div class="carousel-item h-100 active"
                    style="background-image: url(https://m.media-amazon.com/images/I/51PHM1T3wuL.jpg); background-size: contain; background-repeat: no-repeat; background-position:center;">

                </div>
                <div class="carousel-item h-100"
                    style="background-image: url(https://m.media-amazon.com/images/I/51lRMYwP-4L.jpg); background-size: contain; background-repeat: no-repeat; background-position:center;">

                </div>
                <div class="carousel-item h-100"
                    style="background: url(https://m.media-amazon.com/images/I/515TcMeZStL.jpg) center/contain no-repeat;">

                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</body>

</html>