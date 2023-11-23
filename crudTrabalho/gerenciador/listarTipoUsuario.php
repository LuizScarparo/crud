<?php
include '../conexao.php';

$sqlTipoUsuario = "SELECT id, tipo_de_usuario, criado_em, atualizado_em FROM tipo_usuario";
$result = $conexao->query($sqlTipoUsuario);
?>

<h1>Tipos de usuarios</h1>
<a href="adicionarTipoUsuario.php">Adicionar novo tipo de usuario</a>
<table border="1">
    <thead>
        <tr>
            <th>Tipo de usuário</th>
            <th>Data de Criação</th>
            <th>Ultima atualização</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result ->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["tipo_de_usuario"] . "</td>";
                echo "<td>" . $row["criado_em"] . "</td>";
                echo "<td>" . $row["atualizado_em"] . "</td>";
                echo "<td><a href='editarTipoUsuario.php?id=" . $row["id"] . "'>Editar</a> | <a href='deletarTipoUsuario.php?id=" . $row["id"] . "'>Deletar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Sem tipos de usuário listadas</td></tr>";
        }
        ?>
    </table>

<?php
$conexao->close();
?>