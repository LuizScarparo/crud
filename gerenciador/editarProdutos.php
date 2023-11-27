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
<?php
include '../base/header.php';
?>

<head>
    <link rel="stylesheet" href="../css/fk.css">
</head>

<div id="page">
    <form method="post" action="editarProdutos.php">
        <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
        <fieldset>
            <div class="fieldset-wrapper">
                <legend>Adicionar produtos</legend>
                <div class="input-wrapper">
                    <label for="event-tittle">Nome</label>
                    <input type="text" name="nome_produto" value="<?php echo $produto['nome_produto']; ?>">
                </div>
                <div class="input-wrapper">
                    <label for="event-link">Preço</label>
                    <input type="number" name="preco_unitario" value="<?php echo $produto['preco_unitario']; ?>">
                    <div class="input-wrapper">
                        <label for="event-link">Descrição</label>
                        <textarea name="descricao"><?php echo $produto['descricao']; ?></textarea>
                    </div>
        </fieldset>
        <footer>
            <input class="button" type="submit" value="Salvar">
        </footer>
</div>
</form>

<?php
include "../base/footer.php";
?>