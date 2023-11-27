<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $quantidade = $_POST['quantidade'];

    $sqlQuantidade = "UPDATE estoque 
        SET quantidade='$quantidade' 
        WHERE id=$id";
    if ($conexao->query($sqlQuantidade) === TRUE) {
        header("Location: listarProdutos.php");
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

<?php
include '../base/header.php';
?>


<head>
    <link rel="stylesheet" href="../css/fk.css">
</head>

<div id="page">
    <form method="post" action="editarQuantidade.php">
        <input type="hidden" name="id" value="<?php echo $quantidade['id']; ?>">
        <fieldset>
            <div class="fieldset-wrapper">
                <legend>Editar estoque</legend>
                <div class="input-wrapper">
                    <label for="event-tittle">Quantidade</label>
                    <input type="number" name="quantidade" value="<?php echo $quantidade['quantidade']; ?>">
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