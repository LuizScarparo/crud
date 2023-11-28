<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $categoria = $_POST['categorias'];

    $sqlCategoria = "UPDATE categorias 
        SET nome_categoria='$categoria' 
        WHERE id=$id";
    if ($conexao->query($sqlCategoria) === TRUE) {
        header("Location: listarProdutos.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['id'];
    $sqlCategoria = "SELECT id, nome_categoria FROM categorias WHERE id=$id";
    $result = $conexao->query($sqlCategoria);
    if ($result->num_rows > 0) {
        $categoria = $result->fetch_assoc();
    } else {
        echo "Categoria não encontrada!";
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
    <form method="post" action="editarCategorias.php">
        <input type="hidden" name="id" value="<?php echo $categoria['id']; ?>">
        <fieldset>
            <div class="fieldset-wrapper">
                <legend>Adicionar produtos</legend>
                <div class="input-wrapper">
                    <label for="event-tittle">Categoria</label>
                    <input type="text" name="categorias" value="<?php echo $categoria['nome_categoria']; ?>">
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