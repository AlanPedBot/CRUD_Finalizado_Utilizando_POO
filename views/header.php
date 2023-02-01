<!-- Aqui fica o cabeçalho -->
<?php
session_start();
ob_start();
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
</head>

<body>
    <nav id="mainNavbar" class="navbar navbar-expand-lg navbar sticky-top bg-dark" bg-light>
        <div class="container-fluid">
            <a class="navbar-brand" href="#book">
                <img src="https://cdn-icons-png.flaticon.com/512/8132/8132134.png" alt="Book" width="120" height="120">
            </a>
            <h4 style="color: grey;">CRUD - BIBLIOTECA</h4>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation" style="color: white;">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" color="white" fill="currentColor"
                    class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="color:white;">
                    <li class="nav-item">
                        <a href="/views/home" style="margin-left: 30px;" class="nav-link">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a href="/views/add" style="margin-left: 30px;" class="nav-link">ADICIONAR</a>
                    </li>
                    <li class="nav-item">
                        <a href="/views/read" style="margin-left: 30px;" class="nav-link">BUSCAR</a>
                    </li>
                    <li class="nav-item">
                        <a href="/views/update" style="margin-left: 30px;" class="nav-link">ATUALIZAR</a>
                    </li>
                    <li class="nav-item">
                        <a href="/views/delete" style="margin-left: 30px;" class="nav-link">DELETAR</a>
                    </li>
                    <li class="nav-item">
                        <a style="margin-left: 30px;" href="/views/sair" class="nav-link">LOGOUT <svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" color="red"
                                fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                <path fill-rule="evenodd"
                                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>