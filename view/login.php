<?php
include '../controller/LoginController.php';

session_start();
$login = new LoginController();

if (!empty($_POST)) {
    $login->logar($_POST);

    $dados = "";
    header("location: " . $_SESSION['url']);
} else if (!empty($_GET['sair'])) {
    session_destroy();
}
$dados = !empty($_SESSION['dados']) ? $_SESSION['dados'] : "";
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

    <main class="container">
        <br><br>
        <section>
            <div class="p-9 p-md-5 mb-5 text-white rounded" id="tituloContato">
                <div class="col-md-20 px-0">
                    <h2 class="display-90 fst-italic">Rafa's pizza!</h2>
                    <p class="lead">Faça o login para acessar:</p>
                </div>
            </div>
        </section>

        <form action="login.php" method="post">

            <!--<p style="color:red;">
    <?php /*echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") */ ?>
    </p>-->

            <div class="mb-3">
                <label class="form-label">Login</label>
                <input type="text" class="form-control" id="redBorder" name="login" value="<?php echo (!empty($dados['login']) ? $dados['login'] : "") ?>" />
            </div>

            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="password" class="form-control" id="redBorder" name="senha" />
            </div><br>

            <div class="row">
                <div class="col d-grid gap-2">
                    <button type="submit" class="btn btn-primary" id="redButton">Logar</button>
                </div>
                <div class="col">
                    <a href="RegistrarUsuarioForm.php" style="text-decoration: none;">
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-primary" id="redButton">Registrar-se</button>
                        </div>
                    </a>
                </div>
            </div>

        </form>
    </main>
    <?php /*include "./base/rodape.php" */ ?>