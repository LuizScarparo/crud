<?php
include "./base/header.php";
?>
<link rel="stylesheet" href="./css/style.css">
<div class="card-group">

    <div class="card">
        <a href="./gerenciador/listarProdutos.php" class="text-decoration-none">
            <img class="card-img-top" src="./assets/produtos1.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Listar produtos</h5>
                <p class="card-text">Aqui você será capaz de ver e adicionar produtos conforme sua necessidade.</p>
            </div>
    </div>
    </a>
    <div class="card">
        <a href="./gerenciador/listarUsuarios.php" class="text-decoration-none">
            <img class="card-img-top" src="./assets/pessoas.jpg" alt="Card image cap">
            <div class="card-body text-decoration-none">
                <h5 class="card-title">Listar usuários</h5>
                <p class="card-text">Clique aqui para adicionar pessoas que fazem parte da sua organização.</p>
            </div>
    </div>
    </a>
</div>
<?php
include "./base/footer.php";
?>