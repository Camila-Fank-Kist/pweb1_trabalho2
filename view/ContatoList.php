<?php
include '../controller/ContatoController.php';
include "base/header.php";

Util::verificarLogin();

$contato = new ContatoController();

if (!empty($_GET['id'])) {
    $contato->deletar($_GET['id']);
    header("location: ContatoList.php");
    $_SESSION["msg"] = "Registro Deletado com sucesso!";
}

if (!empty($_POST)) {
    $load = $contato->pesquisar($_POST);
} else {
    $load = $contato->carregar();
}
?>

<main class="container">
    <section>
        <div class="p-9 p-md-5 mb-5 text-white rounded" id="tituloContato">
            <div class="col-md-20 px-0">
                <h2 class="display-90 fst-italic">Usuários</h2>
                <p class="lead">Confira os usuários do site.</p>
            </div>
        </div>
    </section>

    <!--<p style="color:red;">
    <?php /*echo (!empty($_SESSION["msg"]) ? $_SESSION["msg"] : "") */ ?>
</p>-->

    <form action="ContatoList.php" method="post">
        <div class="d-flex grid gap-0 column-gap-3">
            <select name="campo" id="redBorder">
                <option value="nome">Nome</option>
                <option value="telefone">Telefone</option>
                <option value="email">Email</option>
            </select>
            <label id="redColor">Valor</label>
            <input type="text" id="redBorder" name="valor" placeholder="Pesquisar" />
            <button type="submit" class="btn btn-primary" id="redButton">Buscar</button>
            <a href="ContatoForm.php"><button type="button" class="btn btn-primary" id="redButton">Cadastrar</button></a>
        </div>
    </form><br>

    <table class="table table-hover" id="redBorder">
        <tr id="redBackground">
            <th id="whiteText">Nome</th>
            <th id="whiteText">Telefone</th>
            <th id="whiteText">Email</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        foreach ($load as $item) {
            echo "<tr>";
            echo "<td>" . $item->nome . "</td>";
            echo "<td>" . $item->telefone . "</td>";
            echo "<td>" . $item->email . "</td>";
            echo "<td><a href='ContatoForm.php?id=$item->id'>Editar</a></td>";
            echo "<td><a onclick='return confirm(\"Deseja Excluir? \")' href='ContatoList.php?id=$item->id'>Deletar</a></td>";
            echo "<tr>";
        }
        ?>
    </table>
</main>
<?php
include "base/rodape.php";
