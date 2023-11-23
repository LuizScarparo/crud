<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    $sqlProdutos = "DELETE FROM produtos WHERE id=$id";
    if ($conexao->query($sqlProdutos) !== TRUE) {
        echo "Erro ao deletar produtos: " . $conexao->error;
        exit;
    }

    $sqlCategorias = "DELETE FROM categorias WHERE id=$id";
    if ($conexao->query($sqlCategorias) !== TRUE) {
        echo "Erro ao deletar categorias: " . $conexao->error;
        exit;
    }

    $sqlEstoque = "DELETE FROM estoque WHERE id=$id";
    if ($conexao->query($sqlEstoque) !== TRUE) {
        echo "Erro ao deletar estoque: " . $conexao->error;
        exit;
    }

    header("Location: listarProdutos.php");
}

$conexao->close();
?>
