<?php
include '../base/header.php';
?>

<head>
    <link rel="stylesheet" href="../css/table.css">
</head>

<?php

include '../conexao.php';

$sqlUsuarioInformacao = "SELECT
    u.id,
    u.nome,
    u.tipo,
    u.email,
    u.telefone,
    u.endereco,
    u.comissao,
    u.criado_em,
    u.atualizado_em,
    t.tipo_de_usuario
    FROM usuarios as u
    LEFT JOIN tipo_usuario as t ON t.id = u.tipo;";

$result = $conexao->query($sqlUsuarioInformacao);
?>
<div id="page">
    <div class="table-wrapper">
        <h1>Lista de usuarios cadastrados</h1>
        <hr>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th scope="col">Tipo do usuário</th>
                    <th scope="col">Nome do usuário</th>
                    <th scope="col">Endereço do usuário</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Comissão</th>
                    <th scope="col">Criado em</th>
                    <th scope="col">Atualizado em</th>
                    <th scope="col">Editar info</th>
                    <th scope="col">Deletar linha</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["tipo_de_usuario"] . "</td>";
                        echo "<td>" . $row["nome"] . "</td>";
                        echo "<td>" . $row["endereco"] . "</td>";
                        echo "<td>" . $row["telefone"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["comissao"] . "</td>";
                        echo "<td>" . $row["criado_em"] . "</td>";
                        echo "<td>" . $row["atualizado_em"] . "</td>";
                        echo "<td><a href='editarUsuarios.php?id=" . $row["id"] . "'>Info</a> | <a href='editarTipoUsuario.php?id=" . $row["id"] . "'>Tipo usuário</a>";
                        echo "<td><a href='deletarUsuarios.php?id=" . $row["id"] . "'>Deletar</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Sem usuários listados</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <?php
        $conexao->close();
        ?>


        <table border="1">
            <thead>
                <tr>

                </tr>
            </thead>
            <tbody>

        </table>


    </div>
    <footer>
        <input id="valor_busca" class="button" type="submit" value="Adicionar usuários" onclick="redireciona()">
    </footer>
</div>
<script>
    function redireciona() {
        var valor_busca = document.getElementById("valor_busca").value;
        location.href = "adicionarUsuarios.php/";
    }
</script>
</body>


</html>