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

<form method="post" action="editarUsuarios.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    Nome do usuário: <input type="text" name="nome" value="<?php echo $nome; ?>"><br>
    Telefone do usuário: <input type="number" name="telefone" value="<?php echo $telefone; ?>"><br>
    Endereço do usuário: <input type="text" name="endereco" value="<?php echo $endereco; ?>"><br>
    Email do usuário: <input type="email" name="email" value="<?php echo $email; ?>"><br>
    Comissão: <input type="number" name="comissao" value="<?php echo $comissao; ?>"><br>
    <input type="submit" value="Salvar">
</form>
