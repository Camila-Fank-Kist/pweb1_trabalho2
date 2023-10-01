<?php
include '../controller/AvaliacaoController.php';
include "base/header.php";

Util::verificarLogin();

$avaliacao = new AvaliacaoController();

if (!empty($_GET['id'])) {
    $avaliacao->deletar($_GET['id']);
    header("location: AvaliacaoList.php");
    $_SESSION["msg"] = "Registro Deletado com sucesso!";
}

if (!empty($_POST)) {
    $load = $avaliacao->pesquisar($_POST);
} else {
    $load = $avaliacao->carregar();
}

?>

<main class="container">
    <section>
        <div class="p-9 p-md-5 mb-5 text-white rounded" id="tituloContato">
            <div class="col-md-20 px-0">
                <h2 class="display-90 fst-italic">Avaliações</h2>
                <p class="lead">Confira as avaliações dos nossos clientes!</p>
            </div>
        </div>
    </section>

    <!--<p style="color:red;">
        <?php /*echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") */ ?>
    </p>-->

    <form action="AvaliacaoList.php" method="post">
        <div class="d-flex grid gap-0 column-gap-3">
            <select name="campo" id="redBorder">
                <option value="sabor">Sabor</option>
                <option value="nota">Nota</option>
                <option value="descricao">Descrição</option>
            </select>
            <label id="redColor">Valor</label>
            <input type="text" id="redBorder" name="valor" placeholder="Pesquisar" />
            <button type="submit" class="btn btn-primary" id="redButton">Buscar</button>
            <a href="AvaliacaoForm.php"><button type="button" class="btn btn-primary" id="redButton">Cadastrar</button></a>
        </div>
    </form><br>

    <table class="table table-hover" id="redBorder">
        <tr id="redBackground">
            <th id="whiteText">Usuario</th>
            <th id="whiteText">Sabores</th>
            <th id="whiteText">Nota</th>
            <th id="whiteText">Descrição</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        foreach ($load as $item) {
            if (!empty($item->usuario_id)) {
                $obj = $avaliacao->buscarContato($item->usuario_id);
                $contato = $obj->nome;
            } else {
                $contato = "";
            }

            echo "<tr>";
            echo "<td>" . $contato . "</td>";
            echo "<td>" . $item->sabor . "</td>";
            echo "<td>" . $item->nota . "</td>";
            echo "<td>" . $item->descricao . "</td>";
            echo "<td><a href='AvaliacaoForm.php?id=$item->id'>Editar</a></td>";
            echo "<td><a onclick='return confirm(\"Deseja Excluir? \")' href='AvaliacaoList.php?id=$item->id'>Deletar</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</main>
<?php
include "base/rodape.php";
