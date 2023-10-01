<?php
include "header.php";
Util::verificarLogin();
//var_dump($_SESSION);
//exit;
?>
<main class="container">

    <div class="row">
        <div class="col-8">
            <section>
                <div class="p-9 p-md-5 mb-5 text-white rounded" id="tituloContato">
                    <div class="col-md-20 px-0">
                        <h1 class="display-90 fst-italic">Rafa's pizza!</h1>
                        <p class="lead">Uma pizzaria com a essência da culinária caseira!</p>
                    </div>
                </div>

                <a href="../ContatoList.php" style="text-decoration: none;">
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-primary" id="redButton">Lista de Usuários do Sistema</button>
                    </div>
                </a><br><br>

                <article class="blog-post">
                    <h2 class="blog-post-title" id="redColor">Quem somos?</h2>
                    <p style="text-align: justify;">Olá! Somos uma equipe apaixonada
                        por culiária, e juntos formamos uma pizzaria que
                        junta tudo o que há de melhor para criar pizzas saborosas.</p>
                    <p style="text-align: justify;">Nosso objetivo é proporcionar a melhor experiência aos nossos clientes,
                        através de pizzas que agradam não somente o estômago, mas agradam a alma!</p>
                </article>
            </section><br>
        </div>

        <div class="col-4">
            <aside>
                <div class="card" id="localizacao">
                    <div class="card-header" id="headerLocalizacao">
                        Localização
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Já foi à nossa pizzaria?</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Veja onde nossa sede principal se
                            localiza:</h6>
                        <div class="my-map text-center">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2498.0475618807186!2d-49.1625026489425!3d-28.278065625868944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x952110f50d82773f%3A0xeb9e81f399e794ba!2sR.%20Teodoro%20Bernardo%20Schlickmann%2C%20455%20-%20Centro%2C%20Bra%C3%A7o%20do%20Norte%20-%20SC%2C%2088750-000!5e0!3m2!1spt-BR!2sbr!4v1680772749116!5m2!1spt-BR!2sbr" width="" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </aside>
        </div>


</main>
<?php include "./rodape.php" ?>