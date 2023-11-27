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

<?php
include '../base/header.php';
?>


<head>
    <link rel="stylesheet" href="../css/fk.css">
</head>

<div id="page">
    <form method="post" action="editarTipoUsuario.php">
        <input type="hidden" name="id" value="<?php echo $tipoUsuario['id']; ?>">
        <fieldset>
            <div class="fieldset-wrapper">
                <legend>Editar tipo de usuário</legend>
                <div class="input-wrapper">
                    <label for="event-tittle">Tipo de usuário</label>
                    <input type="number" name="tipo_de_usuario" value="<?php echo $tipoUsuario['tipo_de_usuario']; ?>">
        </fieldset>
        <footer>
            <input class="button" type="submit" value="Salvar">
        </footer>
</div>
</form>

<?php
include "../base/footer.php";
?>