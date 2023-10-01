<?php
include_once '../controller/ContatoController.php';
include "base/header.php";
//session_start();
Util::verificarLogin();

$contato = new ContatoController();

if (!empty($_POST)) {

  if (empty($_POST['id'])) {

    $contato->salvar($_POST);
  } else {
    $contato->atualizar($_POST);
  }

  header("location: " . $_SESSION['url']);
}
if (!empty($_GET['id'])) {
  $data = $contato->buscar($_GET['id']);
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
  <form action="ContatoForm.php" method="post">
    <h3 id="redColor">Formulário Usuários</h3>

    <!--<p style="color:red;">
    <?php /*echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "")*/ ?>
    </p>-->

    <input type="hidden" name="id" value="<?php echo (!empty($data->id) ? $data->id : "") ?>" />

    <div class="mb-3">
      <label for="" class="form-label">Nome</label>
      <input type="text" class="form-control" id="redBorder" name="nome" value="<?php echo (!empty($data->nome) ? $data->nome : "") ?>">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Email</label>
      <input type="text" class="form-control" id="redBorder" name="email" value="<?php echo (!empty($data->email) ? $data->email : "") ?>">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Telefone</label>
      <input type="text" class="form-control" id="redBorder" name="telefone" value="<?php echo (!empty($data->telefone) ? $data->telefone : "") ?>">
    </div>

    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-primary" id="redButton">
        <?php echo (empty($_GET['id']) ? "Salvar" : "Atualizar") ?>
      </button>
    </div><br>
    <div class="d-flex justify-content-center">
      <a href="ContatoList.php" id="redColor">Voltar</a>
    </div><br>

  </form>
</main>
<?php
include "base/rodape.php";
