<?php
include '../base/header.php';
?>

<head>
    <link rel="stylesheet" href="../css/table.css">
</head>

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


<div id="page">
    <div class="table-wrapper">
        <h1>Lista de produtos cadastrados</h1>
        <hr>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Preço(R$)</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Criado em</th>
                    <th scope="col">Atualizado em</th>
                    <th scope="col">Editar info</th>
                    <th scope="col">Editar Estoque</th>
                    <th scope="col">Editar Categoria</th>
                    <th scope="col">Deletar linha</th>
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
                        echo "<td><a href='editarProdutos.php?id=" . $row["id"] . "'>Editar</a>";
                        echo "<td><a href='editarQuantidade.php?id=" . $row["id"] . "'>Editar estoque</a>";
                        echo "<td><a href='editarCategorias.php?id=" . $row["id"] . "'>Editar categoria</a>";
                        echo "<td><a href='deletarProdutos.php?id=" . $row["id"] . "'>Deletar</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Sem produtos listados</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <?php
        $conexao->close();
        ?>


    </div>
    <footer>
        <input id="valor_busca" class="button" type="submit" value="Adicionar produtos" onclick="redireciona()">
    </footer>
</div>
<script>
    function redireciona() {
        var valor_busca = document.getElementById("valor_busca").value;
        location.href = "adicionarProdutos.php";
    }
</script>
</body>

</table>
