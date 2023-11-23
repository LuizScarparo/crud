<form method="post" action="">
    Nome: <input type="text" name="nome_produto"><br>
    Categoria: <input type="text" name="nome_categoria"><br>
    Preço: <input type="number" name="preco_unitario"><br>
    Quantidade: <input type="number" name="quantidade"><br>
    Descrição: <textarea name="descricao"></textarea><br>
    <input type="submit" value="Adicionar">
</form>

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