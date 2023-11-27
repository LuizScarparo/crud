<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $comissao = $_POST['comissao'];
    $email = $_POST['email'];

    $sqlUsuarios = "UPDATE usuarios 
        SET nome='$nome', endereco='$endereco', telefone=$telefone, email='$email', comissao=$comissao 
        WHERE id=$id";
    if ($conexao->query($sqlUsuarios) === TRUE) {
        header("Location: listarUsuarios.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['id'];
    $sqlUsuarios = "SELECT id, nome, telefone, endereco, email, comissao FROM usuarios WHERE id=$id";
    $result = $conexao->query($sqlUsuarios);
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        $nome = $usuario['nome'];
        $telefone = $usuario['telefone'];
        $endereco = $usuario['endereco'];
        $email = $usuario['email'];
        $comissao = $usuario['comissao'];
    } else {
        echo "Usuario não encontrado!";
        exit;
    }
}

$conexao->close();
?>


<head>
    <link rel="stylesheet" href="../css/fk.css">
</head>

<div id="page">
    <form method="post" action="editarUsuarios.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <fieldset>
            <div class="fieldset-wrapper">
                <legend>Adicionar usuários</legend>
                <div class="input-wrapper">
                    <label for="event-tittle">Nome de usuário</label>
                    <input type="text" name="nome" value="<?php echo $nome; ?>">
                </div>
                <div class="input-wrapper">
                    <label for="event-link">Endereço</label>
                    <input type="text" name="endereco" value="<?php echo $endereco; ?>">
                </div>
                <div class="input-wrapper">
                    <label for="event-link">Email</label>
                    <input type="email" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="input-wrapper">
                    <label for="event-link">Comissão</label>
                    <input type="number" name="comissao" value="<?php echo $comissao; ?>">
                </div>
        </fieldset>
        <footer>
            <input class="button" type="submit" value="Salvar">
        </footer>
</div>
</form>



