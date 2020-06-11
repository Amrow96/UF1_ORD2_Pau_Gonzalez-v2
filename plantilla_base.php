<?php session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/DWES/UF1_ORD2_Pau_Gonzalez/resources/ti.php' ?>

<html>

<head>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/miCSS.css">
    <meta charset="UTF-8">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>
        <?php startblock('titulo') ?>
        <?php endblock() ?>
    </title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top">
        <a href="index.php">
            CURSOS
        </a>
        <div class="collapse dropdown navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Datos maestros
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="cursos.php">Cursos</a>
                    </div>
                </li>
            </ul>
        </div>

    </nav>
    <div id='principal'>
        <?php startblock('principal') ?>
        <?php endblock() ?>
    </div>
</body>

</html>