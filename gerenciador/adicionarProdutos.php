<?php
include '../base/header.php';
?>

<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome_produto'];
    $categoria = $_POST['nome_categoria'];
    $preco = $_POST['preco_unitario'];
    $quantidade = $_POST['quantidade'];
    $descricao = $_POST['descricao'];

    $insertCategorias = "INSERT INTO categorias (nome_categoria) VALUES ('$categoria')";


    if ($conexao->query($insertCategorias) === TRUE) {
        $id_categoria = $conexao->insert_id;

        $insertEstoque = "INSERT INTO estoque (quantidade) VALUES ('$quantidade')";
        $conexao->query($insertEstoque);
        $estoque_id = $conexao->insert_id;

        $insertProdutos = "INSERT INTO produtos (nome_produto, preco_unitario, descricao, quantidade, categoria) 
        VALUES ('$nome', '$preco', '$descricao', '$estoque_id', '$id_categoria')";

        if ($conexao->query($insertProdutos) === TRUE) {
            header("Location: listarProdutos.php");
        } else {
            echo "Erro ao inserir na tabela produtos: " . $conexao->error;
        }
    } else {
        echo "Erro ao inserir na tabela estoque: " . $conexao->error;
    }
}

$conexao->close();
?>

<head>
    <link rel="stylesheet" href="../css/fk.css">
</head>

<div id="page">
    <form method="post" action="adicionarProdutos.php">
        <fieldset>
            <div class="fieldset-wrapper">
                <legend>Adicionar produtos</legend>
                <div class="input-wrapper">
                    <label for="event-tittle">Nome</label>
                    <input type="text" name="nome_produto">
                </div>
                <div class="input-wrapper">
                    <label for="event-link">Preço</label>
                    <input type="number" name="preco_unitario">
                </div>
                <div class="input-wrapper">
                    <label for="event-whatsapp">Categoria</label>
                    <input type="text" name="nome_categoria">
                </div>
                <div class="input-wrapper">
                    <label for="event-link">Quantidade</label>
                    <input type="number" name="quantidade">
                </div>
                <div class="input-wrapper">
                    <label for="event-link">Descrição</label>
                    <textarea name="descricao"></textarea>
                </div>
        </fieldset>
        <footer>
            <input class="button" type="submit" value="Adicionar">
        </footer>
</div>
</form>

</html>