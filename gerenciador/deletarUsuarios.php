<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    $sql = "DELETE FROM usuarios WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        header("Location: listarUsuarios.php");
    } else {
        echo "Erro ao deletar: " . $conexao->error;
    }
    
    $sql = "DELETE FROM tipo_usuario WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        header("Location: listarTipoUsuario.php");
    } else {
        echo "Erro ao deletar: " . $conexao->error;
    }
}

$conexao->close();
?>
