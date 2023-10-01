<?php
include '../controller/LoginController.php';

session_start();
$login = new LoginController();


if (!empty($_POST)) {

    $login->salvar($_POST);
    $_SESSION['dados'] = "";
    header("location: " . $_SESSION['url']);
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
    <link href="../../css/style.css" rel="stylesheet">
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
                    <p class="lead">Preencha o formulário para se registrar:</p>
                </div>
            </div>
        </section>

        <form action="RegistrarUsuarioForm.php" method="post">

            <!--<p style="color:red;">
    <?php /*echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") */ ?>
    </p>-->

            <div class="mb-3">
                <label for="" class="form-label">Nome</label>
                <input type="text" class="form-control" id="redBorder" name="nome" value="<?php echo (!empty($dados['nome']) ? $dados['nome'] : "") ?>">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" class="form-control" id="redBorder" name="email" value="<?php echo (!empty($dados['email']) ? $dados['email'] : "") ?>">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="redBorder" name="telefone" value="<?php echo (!empty($dados['telefone']) ? $dados['telefone'] : "") ?>">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Login</label>
                <input type="text" class="form-control" id="redBorder" name="login" value="<?php echo (!empty($dados['login']) ? $dados['login'] : "") ?>">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Senha</label>
                <input type="password" class="form-control" id="redBorder" name="senha">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Confirmar Senha</label>
                <input type="password" class="form-control" id="redBorder" name="c_senha">
            </div><br>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" id="redButton"> Cadastrar</button>
            </div><br>
            <div class="d-flex justify-content-center">
                <a href="login.php" id="redColor">Voltar</a><br>
            </div><br>
        </form>
    </main>

    <?php /*include "./base/rodape.php" */?>