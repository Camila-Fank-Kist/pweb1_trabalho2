<?php
include '../controller/PedidoController.php';
include "base/header.php";

Util::verificarLogin();

$pedido = new PedidoController();

if (!empty($_GET['id'])) {
    $pedido->deletar($_GET['id']);
    header("location: PedidoList.php");
    $_SESSION["msg"] = "Registro Deletado com sucesso!";
}

if (!empty($_POST)) {
    $load = $pedido->pesquisar($_POST);
} else {
    $load = $pedido->carregar();
}
/*
//passa o valor para a variavem mensagem e limpa da sessão:
if(!empty($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
} else {
    $msg = "";
}
*/
?>

<main class="container">
    <section>
        <div class="p-9 p-md-5 mb-5 text-white rounded" id="tituloContato">
            <div class="col-md-20 px-0">
                <h2 class="display-90 fst-italic">Pedidos</h2>
                <p class="lead">Pedidos dos nossos clientes!</p>
            </div>
        </div>
    </section>

    <!--<p style="color:red;">
    <?php /*echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") */ ?>
    </p>-->

    <form action="PedidoList.php" method="post">
        <div class="d-flex grid gap-0 column-gap-3">
            <select name="campo" id="redBorder">
                <option value="sabores">Sabores</option>
                <option value="forma_retirada">Forma retirada</option>
                <option value="forma_pagamento">Forma pagamento</option>
                <option value="observacao">Observação</option>
            </select>
            <label id="redColor">Valor</label>
            <input type="text" id="redBorder" name="valor" placeholder="Pesquisar" />
            <button type="submit" class="btn btn-primary" id="redButton">Buscar</button>
            <a href="PedidoForm.php"> <button type="button" class="btn btn-primary" id="redButton">Cadastrar</button></a>
        </div>
    </form><br>

    <table class="table table-hover" id="redBorder">
        <tr id="redBackground">
            <th id="whiteText">Usuario</th>
            <th id="whiteText">Sabores</th>
            <th id="whiteText">Forma retirada</th>
            <th id="whiteText">Forma pagamento</th>
            <th id="whiteText">Observação</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        foreach ($load as $item) {

            if (!empty($item->usuario_id)) {
                $obj  = $pedido->buscarContato($item->usuario_id);
                $contato = $obj->nome;
            } else {
                $contato = "";
            }

            echo "<tr>";
            echo "<td>" . $contato . "</td>";
            echo "<td>" . $item->sabores . "</td>";
            echo "<td>" . $item->forma_retirada . "</td>";
            echo "<td>" . $item->forma_pagamento . "</td>";
            echo "<td>" . $item->observacao . "</td>";
            echo "<td><a href='PedidoForm.php?id=$item->id'>Editar</a></td>";
            echo "<td><a onclick='return confirm(\"Deseja Excluir? \")' href='PedidoList.php?id=$item->id'>Deletar</a></td>";
            echo "<tr>";
        }
        ?>
    </table>
</main>
<?php
include "base/rodape.php";
