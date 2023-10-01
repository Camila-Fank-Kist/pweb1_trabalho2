<?php
include_once '../controller/AvaliacaoController.php';
include "base/header.php";
//session_start();
Util::verificarLogin();

$avaliacao = new AvaliacaoController();

if (!empty($_POST)) {

  if (empty($_POST['id'])) {

    $avaliacao->salvar($_POST);
  } else {
    $avaliacao->atualizar($_POST);
  }

  header("location: " . $_SESSION['url']);
}
//var_dump($_SESSION);
//exit;
if (!empty($_GET['id'])) {
  $data = $avaliacao->buscar($_GET['id']);
  //var_dump($data);
}
?>

<main class="container">
  <form action="AvaliacaoForm.php" method="post">
    <h3 id="redColor">Formulário Avaliação</h3>

    <!--<p style="color:red;">
    <?php /*echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") */ ?>
    </p>-->

    <input type="hidden" name="usuario_id" value="<?php echo (!empty($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : "") ?>" />

    <input type="hidden" name="id" value="<?php echo (!empty($data->id) ? $data->id : "") ?>" />

    <div class="mb-3">
      <label for="" class="form-label">Sabores</label>
      <input type="text" class="form-control" id="redBorder" name="sabor" value="<?php echo (!empty($data->sabor) ? $data->sabor : "") ?>">
    </div>

    <div class="mb-3">
      <label for="">Nota</label>
      <input type="text" class="form-control" id="redBorder" name="nota" value="<?php echo (!empty($data->nota) ? $data->nota : "") ?>">
    </div>

    <div class="mb-3">
      <label for="">Descrição</label>
      <input type="text" class="form-control" id="redBorder" name="descricao" value="<?php echo (!empty($data->descricao) ? $data->descricao : "") ?>">
    </div><br>

    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-primary" id="redButton">
        <?php echo (empty($_GET['id']) ? "Salvar" : "Atualizar") ?>
      </button>
    </div><br>
    <div class="d-flex justify-content-center">
      <a href="AvaliacaoList.php" id="redColor">Voltar</a>
    </div><br>

  </form>
</main>
<?php
include "base/rodape.php";
