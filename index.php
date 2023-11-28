<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <title>Proteção de dados</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div id="header">
        <h1>Sistema de gestão de produtos e usuários</h1>
    </div>
    <main>
        <img id="pc" src="./assets/img1.png" alt="Computador indicando segurança">
        <div id="text">
            <h2>Faça <span>login</span></h2>
            <form action="" method="post">
                <div class="fieldset-wrapper">

                    <div class="input-wrapper">
                        <label for="username">Usuário</label><br>
                        <input type="text" id="username" name="usuario" required><br>
                    </div>

                    <div class="input-wrapper">
                        <label for="password">Senha de acesso</label><br>
                        <input type="password" id="password" name="senha" required><br>
                    </div>
                    <div class="button-wrapper">
                        <button>
                            Login
                        </button>
                    </div>
                </div>
            </form>
            <?php
            include "./conexao.php";

            if (isset($_POST['usuario']) || isset($_POST['senha'])) {

                if (strlen($_POST['usuario']) == 0) {
                    echo "Preencha seu usuario";
                } else if (strlen($_POST['senha']) == 0) {
                    echo "Preencha sua senha";
                } else {

                    $usuario = $conexao->real_escape_string($_POST['usuario']);
                    $senha = $conexao->real_escape_string($_POST['senha']);

                    $sql_code = "SELECT * FROM users WHERE usuario = '$usuario' AND senha = '$senha'";
                    $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

                    $quantidade = $sql_query->num_rows;

                    if ($quantidade == 1) {

                        $usuarioFinal = $sql_query->fetch_assoc();

                        if (!isset($_SESSION)) {
                            session_start();
                        }

                        $_SESSION['id'] = $usuarioFinal['id'];

                        header("Location: adm.php");
                    } else {
                        echo "Falha ao logar! Usuario ou senha incorretos";
                    }
                }
            }
            ?>
        </div>
    </main>
    <div class="footer">
        <p>Desenvolvido por <a id="instagram" href="wwww.instagram.com/luizgscarparo"> @luizgscarparo</a></p>
    </div>
</body>

</html>