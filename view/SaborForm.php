<?php
include_once '../controller/SaborController.php';
include "base/header.php";
//session_start();
Util::verificarLogin();

$sabor = new SaborController();

if (!empty($_POST)) {

  if (empty($_POST['id'])) {

    $sabor->salvar($_POST);
  } else {
    $sabor->atualizar($_POST);
  }

  header("location: " . $_SESSION['url']);
}
if (!empty($_GET['id'])) {
  $data = $sabor->buscar($_GET['id']);
  //var_dump($data);
}
//passa o valor para a variavem mensagem e limpa da sessão:
/*
if(!empty($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
    //var_dump($msg );
} else {
    $msg = "";
}
*/
?>

<main class="container">
  <form action="SaborForm.php" method="post">
    <h3 id="redColor">Formulário de Sabores</h3>

    <!--<p style="color:red;">
    <?php /*echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") */ ?>
    </p>-->

    <input type="hidden" name="id" value="<?php echo (!empty($data->id) ? $data->id : "") ?>" />

    <div class="mb-3">
      <label for="" class="form-label">Nome</label>
      <input type="text" class="form-control" id="redBorder" name="nome" value="<?php echo (!empty($data->nome) ? $data->nome : "") ?>">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Ingredientes</label>
      <input type="text" class="form-control" id="redBorder" name="ingredientes" value="<?php echo (!empty($data->ingredientes) ? $data->ingredientes : "") ?>">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Preço</label>
      <input type="text" class="form-control" id="redBorder" name="preco" value="<?php echo (!empty($data->preco) ? $data->preco : "") ?>">
    </div><br>

    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-primary" id="redButton">
        <?php echo (empty($_GET['id']) ? "Salvar" : "Atualizar") ?>
      </button>
    </div><br>
    <div class="d-flex justify-content-center">
      <a href="SaborList.php" id="redColor">Voltar</a>
    </div><br>
  </form>
</main>
<?php
include "base/rodape.php";
