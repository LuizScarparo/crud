<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600;700&family=Poppins&display=swap"
        rel="stylesheet">
    <title>Crie seu evento</title>
    <link rel="stylesheet" href="./css/fk.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>

<body>
    <div id="page">
        <header>
            <h1>Crie e compartilhe seu evento.</h1>
            <p>O primeiro passo, é preencher esse formulário de inscrição.</p>
        </header>
        <form id="my-form">

            <fieldset>
                <div class="fieldset-wrapper">
                    <legend>Informações do evento</legend>
                    <div class="input-wrapper">
                        <label for="event-tittle">Título do evento <span>(mínimo 8 caracteres)</span></label>
                        <input type="text" id="event-tittle" minlength="8" />
                    </div>
                    <div class="input-wrapper">
                        <label for="event-link">Link do evento <span>(comece com https://)</span></label>
                        <input type="text" id="event-link" />
                    </div>
                    <div class="input-wrapper">
                        <label for="event-whatsapp">Whatsapp para contato <span>(somente números)</span></label>
                        <input type="number" id="event-whatsapp" />
                    </div>
                    <div class="input-wrapper">
                        <label for="event-link">Informações extras</label>
                        <textarea id="event-info"></textarea>
                    </div>
                    <div class="input-wrapper">
                        <label for="event-category">Categoria</label>
                        <select name="Categoria" id="event-category">
                            <option value="live">Ao vivo</option>
                            <option value="mentorship">Mentoria</option>
                            <option value="podcast">Podcast</option>
                        </select>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="fieldset-wrapper">
                    <legend>Privacidade</legend>

                    <div class="input-wrapper">
                        <label for="event-email">E-mail do administrador <span>(digite um email válido)</span></label>
                        <input type="email" id="event-email" />
                    </div>

                    <div class="input-wrapper">
                        <label for="event-password">Senha de acesso para os participantes <span>(mínimo 8
                                caracteres)</span></label>
                        <input type="password" id="event-password" minlength="8"/>
                    </div>
                    <div class="checkbox-wrapper">
                        <input type="checkbox" id="event-private" />
                        <label for="event-private">Evento privado </label>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="fieldset-wrapper">
                    <legend>Dia e hora</legend>
                    <div class="col-3">

                        <div class="input-wrapper">
                            <label for="event-date">Data </label>
                            <input type="date" id="event-date" />
                        </div>

                        <div class="input-wrapper">
                            <label for="event-begin">Das</label>
                            <input type="time" id="event-begin" />
                        </div>
                        <div class="input-wrapper">
                            <label for="event-end">Até</label>
                            <input type="time" id="event-end" />
                        </div>
                    </div>
                </div>
            </fieldset>

            
        </form>
        <footer>
            <input class="button" type="submit" value="Salvar evento" form="my-form">
        </footer>
    </div>
    <form method="post" action="adicionarUsuarios.php">
        Tipo do usuário: <input type="number" name="tipoUsuario"><br>
        Nome do usuário: <input type="text" name="nomeUsuario"><br>
        Endereço do usuário: <input type="text" name="enderecoUsuario"><br>
        Telefone do usuário: <input type="number" name="telefoneUsuario"><br>
        Email do usuário: <input type="email" name="emailUsuario"><br>
        Comissão do usuário: <input type="number" name="comissao"><br>
        <input type="submit" value="Adicionar">
    </form>
</body>

</html>



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



