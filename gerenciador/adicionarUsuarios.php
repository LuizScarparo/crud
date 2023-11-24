<form method="post" action="adicionarUsuarios.php">
    Tipo do usuário: <input type="number" name="tipoUsuario"><br>
    Nome do usuário: <input type="text" name="nomeUsuario"><br>
    Endereço do usuário: <input type="text" name="enderecoUsuario"><br>
    Telefone do usuário: <input type="number" name="telefoneUsuario"><br>
    Email do usuário: <input type="email" name="emailUsuario"><br>
    Comissão do usuário: <input type="number" name="comissao"><br>
    <input type="submit" value="Adicionar">
</form>


<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoUsuario = $_POST['tipoUsuario'];
    $nomeUsuario = $_POST['nomeUsuario'];
    $enderecoUsuario = $_POST['enderecoUsuario'];
    $telefoneUsuario = $_POST['telefoneUsuario'];
    $emailUsuario = $_POST['emailUsuario'];
    $comissao = $_POST['comissao'];        

    // Inserir na tabela tipo_usuario
    $insertTipoUsuario = "INSERT INTO tipo_usuario (tipo_de_usuario) VALUES ('$tipoUsuario')";
    $conexao->query($insertTipoUsuario);
    $tipo_usuario_id = $conexao->insert_id;

    // Inserir na tabela usuarios
    $insertUsuarios = "INSERT INTO usuarios (tipo, nome, endereco, telefone, email, comissao) VALUES ('$tipo_usuario_id', '$nomeUsuario', '$enderecoUsuario', '$telefoneUsuario', '$emailUsuario', '$comissao')";

    if ($conexao->query($insertUsuarios) === TRUE) {
        header("Location: listarUsuarios.php");
    } else {
        echo "Erro ao inserir na tabela usuarios: " . $conexao->error;
    }
}

$conexao->close();
?>



