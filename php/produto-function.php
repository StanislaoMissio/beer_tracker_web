<?php

require_once('../utils/init.php');


if (isset($_POST["submit"]))

{
    // Banco produto

    $nome_produto = $_POST ["nome_produto"];
    $ml = $_POST ["ml"];
    $preco = $_POST ["preco"];
    $cod_receita = $_POST ["receita"];
    
    
        $PDO = db_connect();

        $sql = "INSERT INTO produto
        (nome_produto,
        preco, ml, cod_receita) VALUES ('$nome_produto', '$preco', $ml, $cod_receita)";          

        $stmt = $PDO->prepare($sql);
        $stmt->execute();


  

}

?>