<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $categoria = $_POST['categorias'];

    $sqlCategoria = "UPDATE categorias 
        SET nome_categoria='$categoria' 
        WHERE id=$id";
    if ($conexao->query($sqlCategoria) === TRUE) {
        header("Location: listarCategorias.php");
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

<form method="post" action="editarCategorias.php">
    <input type="hidden" name="id" value="<?php echo $categoria['id']; ?>">
    Categoria: <input type="text" name="categorias" value="<?php echo $categoria['nome_categoria']; ?>"><br>
    <input type="submit" value="Salvar">
</form>
