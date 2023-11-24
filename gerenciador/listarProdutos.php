<?php
include '../conexao.php';

$sql = "SELECT 
    p.id,
    p.nome_produto,
    c.nome_categoria,
    p.preco_unitario,
    p.descricao,
    e.quantidade,
    p.criado_em,
    p.atualizado_em
    from produtos as p
    left join estoque as e on e.id = p.id
    left join categorias as c on c.id = p.id;";

$result = $conexao->query($sql);

?>

<h1>Produtos</h1>
<a href="adicionarProdutos.php">Adicionar Novo Produto</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome do produto</th>
            <th>Categoria</th>
            <th>Preço do produto (Un.)</th>
            <th>Descrição</th>
            <th>Estoque</th>
            <th>Data de Criação</th>
            <th>Ultima atualização</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nome_produto"] . "</td>";
                echo "<td>" . $row["nome_categoria"] . "</td>";
                echo "<td>" . $row["preco_unitario"] . "</td>";
                echo "<td>" . $row["descricao"] . "</td>";
                echo "<td>" . $row["quantidade"] . "</td>";
                echo "<td>" . $row["criado_em"] . "</td>";
                echo "<td>" . $row["atualizado_em"] . "</td>";
                echo "<td><a href='editarProdutos.php?id=" . $row["id"] . "'>Editar</a> | <a href='deletarProdutos.php?id=" . $row["id"] . "'>Deletar</a></td>";
                echo "<td><a href='editarQuantidade.php?id=" . $row["id"] . "'>Editar estoque</a>";
                echo "<td><a href='editarCategorias.php?id=" . $row["id"] . "'>Editar categoria</a>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Sem produtos listados</td></tr>";
        }
        ?>
</table>

<?php
$conexao->close();
?>