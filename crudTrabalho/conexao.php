<!-- primeiramente iremos fazer a conexão para estabelecer uma ligação com o banco de dados, a variavel $host é o local host do xamp e o $db é o nome que dei ao banco de dados-->
<?php
    $host = 'localhost';
    $user = 'root';
    $pass ='';
    $db ='bbbb';

    $conexao = new mysqli($host, $user, $pass, $db);

    if ($conexao ->connect_error) {
        die("Erro na conexão: " . $conexao ->connect_error);
    }

?>