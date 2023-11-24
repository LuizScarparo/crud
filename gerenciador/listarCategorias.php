<?php
include '../conexao.php';

$sqlTipoCategoria = "SELECT id, nome_categoria, criado_em, atualizado_em FROM categorias";
$result = $conexao->query($sqlTipoCategoria);
?>

<h1>Categoria</h1>
<a href="adicionarCategorias.php">Adicionar nova categoria</a>
<table border="1">
    <thead>
        <tr>
            <th>Tipo de categoria</th>
            <th>Data de Criação</th>
            <th>Ultima atualização</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result ->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nome_categoria"] . "</td>";
                echo "<td>" . $row["criado_em"] . "</td>";
                echo "<td>" . $row["atualizado_em"] . "</td>";
                echo "<td><a href='editarCategorias.php?id=" . $row["id"] . "'>Editar</a> | <a href='deletarCategorias.php?id=" . $row["id"] . "'>Deletar</a></td>";
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