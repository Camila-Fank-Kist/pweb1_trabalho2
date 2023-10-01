<?php
include '../controller/SaborController.php';
include "base/header.php";

Util::verificarLogin();

$sabor = new SaborController();

if (!empty($_GET['id'])) {
    $sabor->deletar($_GET['id']);
    header("location: SaborList.php");
    $_SESSION["msg"] = "Registro Deletado com sucesso!";
}

if (!empty($_POST)) {
    $load = $sabor->pesquisar($_POST);
} else {
    $load = $sabor->carregar();
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
                <h2 class="display-90 fst-italic">Menu</h2>
                <p class="lead">Confira os nossos sabores de pizza!</p>
            </div>
        </div>
    </section>

    <!--<p style="color:red;">
    <?php /*echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") */ ?>
    </p>-->

    <form action="SaborList.php" method="post">
        <div class="d-flex grid gap-0 column-gap-3">
            <select name="campo" id="redBorder">
                <option value="nome">Nome</option>
                <option value="ingredientes">Ingredientes</option>
                <option value="preco">Preço</option>
            </select>
            <label id="redColor">Valor</label>
            <input type="text" id="redBorder" name="valor" placeholder="Pesquisar" />
            <button type="submit" class="btn btn-primary" id="redButton">Buscar</button>
            <a href="SaborForm.php"><button type="button" class="btn btn-primary" id="redButton">Cadastrar</button></a>
        </div>
    </form><br>


    <table class="table table-hover" id="redBorder">
        <tr id="redBackground">
            <th id="whiteText">Nome</th>
            <th id="whiteText">Ingredientes</th>
            <th id="whiteText">Preço R$</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        foreach ($load as $item) {
            echo "<tr>";
            echo "<td>" . $item->nome . "</td>";
            echo "<td>" . $item->ingredientes . "</td>";
            echo "<td>" . $item->preco . "</td>";
            echo "<td><a href='SaborForm.php?id=$item->id'>Editar</a></td>";
            echo "<td><a onclick='return confirm(\"Deseja Excluir? \")' href='SaborList.php?id=$item->id'>Deletar</a></td>";
            echo "<tr>";
        }
        ?>
    </table>
</main>

<?php
include "base/rodape.php";
