<?php
include('./conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <title>Proteção de dados</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div id="header">
        <nav>
            <img src="./assets/cadeado.svg" alt="">
            <ul>
                <a href="./adm.php" class="text-decoration-none"><li>Início</li></a>
                <li>Contato</li>
                <a href="./logout.php" class="text-decoration-none"><li>Sair</li></a>
            </ul>
        </nav>
    </div>
    <link rel="stylesheet" href="./css/style.css"> <!-- nao sei pq isso funciona aqui e nao no head-->
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