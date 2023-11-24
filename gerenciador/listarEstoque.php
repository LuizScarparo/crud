<?php
include '../conexao.php';

$sqlEstoque = "SELECT quantidade FROM estoque";
$result = $conexao->query($sqlEstoque);
?>

<h1>Estoque</h1>
<a href="adicionarQuantidade.php">Adicionar novo estoque</a>
<table border="1">
    <thead>
        <tr>
            <th>Quantidade</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result ->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["quantidade"] . "</td>";
                echo "<td>" . $row["criado_em"] . "</td>";
                echo "<td>" . $row["atualizado_em"] . "</td>";
                echo "<td><a href='editarQuantidade.php?id=" . $row["id"] . "'>Editar</a> | <a href='deletarQuantidade.php?id=" . $row["id"] . "'>Deletar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Sem categorias listadas</td></tr>";
        }
        ?>
    </table>

<?php
$conexao->close();
?>