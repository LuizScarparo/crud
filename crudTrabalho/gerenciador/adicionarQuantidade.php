<form method="post" action="adicionarQuantidade.php">
    Quantidade: <input type="number" name="quantidade"><br>
    <input type="submit" value="Adicionar">
</form>


<?php
    include '../conexao.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $quantidade = $_POST['quantidade'];
        
        //aqui devo criar um insert para cada tabela, tenho que criar mais uma variavel
        $selectQuantidade = 
        "INSERT INTO 
            estoque (quantidade) 
        VALUES 
            ('$quantidade')";
        if ($conexao->query($selectQuantidade) === TRUE) {
            header("Location: listarEstoque.php");
        } else {
            echo "Erro: " . $conexao->error;
        }
    }

    $conexao->close();
?>


