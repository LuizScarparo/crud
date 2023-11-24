<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $tipoUsuario = $_POST['tipo_de_usuario'];

    $sqlTipoUsuario = "UPDATE tipo_usuario 
        SET tipo_de_usuario='$tipoUsuario'
        WHERE id=$id";
    if ($conexao->query($sqlTipoUsuario) === TRUE) {    
        header("Location: listarUsuarios.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['id'];
    $sqlTipoUsuario = "SELECT id, tipo_de_usuario FROM tipo_usuario WHERE id=$id";
    $result = $conexao->query($sqlTipoUsuario);
    if ($result->num_rows > 0) {
        $tipoUsuario = $result->fetch_assoc();
    } else {
        echo "Tipo de usuário não encontrado!";
        exit;
    }
}

$conexao->close();
?>

<form method="post" action="editarTipoUsuario.php">
    <input type="hidden" name="id" value="<?php echo $tipoUsuario['id']; ?>">
    Tipo de usuário: <input type="number" name="tipo_de_usuario" value="<?php echo $tipoUsuario['tipo_de_usuario']; ?>"><br>
    <input type="submit" value="Salvar">
</form>
