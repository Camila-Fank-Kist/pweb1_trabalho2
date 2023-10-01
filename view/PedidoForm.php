<?php
include_once '../controller/PedidoController.php';
include "base/header.php";
//session_start();
Util::verificarLogin();

$pedido = new PedidoController();

if (!empty($_POST)) {

  if (empty($_POST['id'])) {

    $pedido->salvar($_POST);
  } else {
    $pedido->atualizar($_POST);
  }

  header("location: " . $_SESSION['url']);
}
if (!empty($_GET['id'])) {
  $data = $pedido->buscar($_GET['id']);
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
  <form action="PedidoForm.php" method="post">
    <h3 id="redColor">Formulário de Pedido</h3>

    <!--<p style="color:red;">
    <?php /*echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") */ ?>
    </p>-->

    <input type="hidden" name="usuario_id" value="<?php echo (!empty($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : "") ?>" />

    <input type="hidden" name="id" value="<?php echo (!empty($data->id) ? $data->id : "") ?>" />

    <div class="mb-3">
      <label for="" class="form-label">Sabores</label>
      <input type="text" class="form-control" id="redBorder" name="sabores" value="<?php echo (!empty($data->sabores) ? $data->sabores : "") ?>">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Forma retirada</label>
      <input type="text" class="form-control" id="redBorder" name="forma_retirada" value="<?php echo (!empty($data->forma_retirada) ? $data->forma_retirada : "") ?>">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Forma pagamento</label>
      <input type="text" class="form-control" id="redBorder" name="forma_pagamento" value="<?php echo (!empty($data->forma_pagamento) ? $data->forma_pagamento : "") ?>">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Observação</label>
      <input type="text" class="form-control" id="redBorder" name="observacao" value="<?php echo (!empty($data->observacao) ? $data->observacao : "") ?>">
    </div><br>

    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-primary" id="redButton">
        <?php echo (empty($_GET['id']) ? "Salvar" : "Atualizar") ?>
      </button>
    </div><br>
    <div class="d-flex justify-content-center">
      <a href="PedidoList.php" id="redColor">Voltar</a>
    </div><br>


  </form>
</main>
<?php
include "base/rodape.php";
