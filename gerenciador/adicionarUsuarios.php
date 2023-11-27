<?php
include '../base/header.php';
?>

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

<head>
    <link rel="stylesheet" href="../css/fk.css">
</head>

<div id="page">
    <form method="post" action="adicionarUsuarios.php">
        <fieldset>
            <div class="fieldset-wrapper">
                <legend>Adicionar usuário</legend>
                <div class="input-wrapper">
                    <label for="event-tittle">Tipo do usuário</label>
                    <input type="number" name="tipoUsuario">
                </div>
                <div class="input-wrapper">
                    <label for="event-link">Nome do usuário</label>
                    <input type="text" name="nomeUsuario">
                </div>
                <div class="input-wrapper">
                    <label for="event-whatsapp">Endereço do usuário</label>
                    <input type="text" name="enderecoUsuario">
                </div>
                <div class="input-wrapper">
                    <label for="event-link">Telefone do usuário</label>
                    <input type="number" name="telefoneUsuario">
                </div>
                <div class="input-wrapper">
                    <label for="event-link">Email do usuário</label>
                    <input type="email" name="emailUsuario">
                </div>
                <div class="input-wrapper">
                    <label for="event-link">Comissão do usuário</label>
                    <input type="number" name="comissao">
                </div>
        </fieldset>
        <footer>
            <input class="button" type="submit" value="Adicionar">
        </footer>
</div>
</form>
</div>



</html>