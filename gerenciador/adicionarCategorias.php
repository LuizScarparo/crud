<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoria = $_POST['categorias'];
    
    $insertCategorias = "INSERT INTO categorias (nome_categoria) VALUES ('$categoria')";
    
    if ($conexao->query($insertCategorias) === TRUE) {
        header("Location: listarCategorias.php");
    } else {
        echo "Erro: " . $conexao->error;
    }
}

$conexao->close();
?>

<form method="post" action="adicionarCategorias.php">
    Categoria: <input type="text" name="categorias"><br>
    <input type="submit" value="Adicionar">
</form>
