<?php
include_once dirname(__FILE__, 3) . "/Util.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camila Fank Kist</title>
    <meta charset="utf-8">
    <link href="<?php echo "http://".$_SERVER['HTTP_HOST'];?>/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <?php
    session_start();
    $login = !empty($_SESSION['nome']) ? $_SESSION['login'] : "";
    //$url_projeto = "http://" . $_SERVER['HTTP_HOST'] . dirname(dirname($_SERVER['SCRIPT_NAME'])) . DIRECTORY_SEPARATOR; //pega o host com o diretorio do projeto
    $url_projeto = "http://" . $_SERVER['HTTP_HOST'] . DIRECTORY_SEPARATOR; //pega o host do projeto
    ?>

    <div class="container text-center">
        <div class="row">
            <div class="col-3">
                <header>
                    <img src="../../image/logo.jpg" class="img-fluid rounded">
                </header>
            </div>
            <div class="col-9" id="navlist">
                <nav class="navbar-expand-lg container-fluid"> <!-- bg-body-tertiary -->
                    <ul class="navbar-nav nav nav-underline flex justify-content-between"> <!--  -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_projeto ?>view/base/main.php"> Início </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_projeto ?>view/SaborList.php"> Sabores </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_projeto ?>view/PedidoList.php"> Pedidos </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_projeto ?>view/AvaliacaoList.php"> Avaliações </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div><br>


    <div class="container d-flex justify-content-between">
        <p>Olá, <b id="redColor"> <?php echo $login  ?> </b>, boas vindas para você!</p>
        <a id="redColor" style="padding-right: 2%;" href="<?php echo $url_projeto ?>view/login.php?sair=0"> Sair </a>
    </div>