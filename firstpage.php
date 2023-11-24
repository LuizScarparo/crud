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
    </div>
    <main>
        <img id="pc" src="./assets/img1.png" alt="Computador indicando segurança">
        <div id="text">
            <h1>Faça <span>login</span></h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="fieldset-wrapper">

                    <div class="input-wrapper">
                        <label for="username">Usuário</label><br>
                        <input type="text" id="username" name="user" required><br>
                    </div>

                    <div class="input-wrapper">
                        <label for="password">Senha de acesso</label><br>
                        <input type="password" id="password" name="pass" required><br>
                    </div>
                    <div class="button-wrapper">
                        <button>
                            Login
                        </button>
                    </div>
                </div>
            </form>
            <?php
            session_start();
            include "./conexao.php";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $user = $_POST["user"];
                $pass = $_POST["pass"];

                $sql = "SELECT * FROM users WHERE user = '$user'";
                $result = $conexao->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if (password_verify($pass, $row["pass"])) {
                        $_SESSION["user_id"] = $row["id"];
                        header("Location: adm.php");
                        exit();
                    } else {
                        echo "Senha inválida. Por favor, tente novamente.";
                        var_dump($user, $pass);
                    }
                } else {
                    echo "Nome de usuário não encontrado. Por favor, tente novamente.";
                }
            }
            ?>
        </div>
    </main>
    <footer>
        <p>Desenvolvido por <a id="instagram" href="wwww.instagram.com/luizgscarparo"> @luizgscarparo</a></p>
    </footer>

</body>

</html>