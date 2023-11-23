<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $quantidade = $_POST['quantidade'];

    $sqlQuantidade = "UPDATE estoque 
        SET quantidade='$quantidade' 
        WHERE id=$id";
    if ($conexao->query($sqlQuantidade) === TRUE) {
        header("Location: listarQuantidade.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['id'];
    $sqlQuantidade = "SELECT id, quantidade FROM estoque WHERE id=$id";
    $result = $conexao->query($sqlQuantidade);
    if ($result->num_rows > 0) {
        $quantidade = $result->fetch_assoc();
    } else {
        echo "Estoque não encontrado!";
        exit;
    }
}

$conexao->close();
?>

<form method="post" action="editarQuantidade.php">
    <input type="hidden" name="id" value="<?php echo $quantidade['id']; ?>">
    Quantidade: <input type="number" name="quantidade" value="<?php echo $quantidade['quantidade']; ?>"><br>
    Descrição: <textarea name="descricao"><?php echo $quantidade['descricao']; ?></textarea><br>
    <input type="submit" value="Salvar">
</form>
