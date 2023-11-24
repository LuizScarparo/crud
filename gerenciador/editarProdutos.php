<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nomeProduto = $_POST['nome_produto'];
    $preco = $_POST['preco_unitario'];
    $descricao = $_POST['descricao'];

    $sqlProduto = "UPDATE produtos 
        SET nome_produto='$nomeProduto', descricao='$descricao', preco_unitario = $preco
        WHERE id=$id";
    if ($conexao->query($sqlProduto) === TRUE) {
        header("Location: listarProdutos.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['id'];
    $sqlProduto = "SELECT id, nome_produto, preco_unitario, descricao FROM produtos WHERE id=$id";
    $result = $conexao->query($sqlProduto);
    if ($result->num_rows > 0) {
        $produto = $result->fetch_assoc();
    } else {
        echo "Produto não encontrado!";
        exit;
    }
}

$conexao->close();
?>

<form method="post" action="editarProdutos.php">
    <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
    Nome do produto: <input type="text" name="nome_produto" value="<?php echo $produto['nome_produto']; ?>"><br>
    Preço: <input type="number" name="preco_unitario" value="<?php echo $produto['preco_unitario']; ?>"><br>
    Descrição: <textarea name="descricao"><?php echo $produto['descricao']; ?></textarea><br>
    <input type="submit" value="Salvar">
</form>
