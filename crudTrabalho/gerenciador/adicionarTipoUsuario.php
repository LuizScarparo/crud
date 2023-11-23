<form method="post" action="adicionarTipoUsuario.php">
    Tipo do usuário: <input type="text" name="tipoUsuario"><br>
    <input type="submit" value="Adicionar">
</form>


<?php
    include '../conexao.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tipoUsuario = $_POST['tipoUsuario'];
        
        //aqui devo criar um insert para cada tabela, tenho que criar mais uma variavel
        $selectTipoUsuario = 
        "INSERT INTO 
            tipousuario (tipo) 
        VALUES 
            ('$tipoUsuario')";
        if ($conexao->query($selectTipoUsuario) === TRUE) {
            header("Location: listarTipoUsuario.php");
        } else {
            echo "Erro: " . $conexao->error;
        }
    }

    $conexao->close();
?>


