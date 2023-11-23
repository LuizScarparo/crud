<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $tipoUsuario = $_POST['tipo'];

    $sqlTipoUsuario = "UPDATE tipousuario 
        SET tipo='$tipoUsuario'
        WHERE id=$id";
    if ($conexao->query($sqlTipoUsuario) === TRUE) {    
        header("Location: listarTipoUsuario.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['id'];
    $sqlTipoUsuario = "SELECT id, tipo FROM tipousuario WHERE id=$id";
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
    Tipo de usuário: <input type="number" name="tipo" value="<?php echo $tipoUsuario['tipo']; ?>"><br>
    <input type="submit" value="Salvar">
</form>
