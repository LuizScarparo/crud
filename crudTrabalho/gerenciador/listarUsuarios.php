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

<h1>Lista de usuarios cadastrados</h1>
<a href="adicionarUsuarios.php">Adicionar um novo usuário</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo do usuário</th>
            <th>Nome do usuário</th>
            <th>Endereço do usuário</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Comissão</th>
            <th>Criado em</th>
            <th>Atualizado em</th>
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
                echo "<td><a href='editarUsuarios.php?id=" . $row["id"] . "'>Editar</a> | <a href='deletarUsuarios.php?id=" . $row["id"] . "'>Deletar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Sem usuários listados</td></tr>";
        }
        ?>
</table>

<?php
$conexao->close();
?>