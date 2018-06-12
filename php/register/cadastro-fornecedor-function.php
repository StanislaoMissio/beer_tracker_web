<?php

require_once('init.php');


if (isset($_POST["submit"]))

{
    // Cadastro de um novo fornecedor

    $razao_social_fornecedor = $_POST ["razao_social"];
    $cnpj_fornecedor = $_POST ["cnpj"];
    $cep_fornecedor = $_POST ["cep"];
    $endereco_fornecedor = $_POST ["endereco"];
    $cidade_fornecedor = $_POST ["cidade"];
    $estado_fornecedor = $_POST ["estado"];
    $pais_fornecedor = $_POST ["pais"];
    $telefone_fornecedor = $_POST ["telefone"];
    $email_fornecedor = $_POST ["email"];

        $PDO = db_connect();

        $sql = "INSERT INTO fornecedor
        (razao_social_fornecedor,
        cnpj_fornecedor,
        cep_fornecedor,
        endereco_fornecedor,
        cidade_fornecedor,
        estado_fornecedor,
        pais_fornecedor,
        telefone_fornecedor,
        email_fornecedor) VALUES ('$razao_social_fornecedor', '$cnpj_fornecedor', '$cep_fornecedor', '$endereco_fornecedor', '$cidade_fornecedor', '$estado_fornecedor', '$pais_fornecedor','$telefone_fornecedor', '$email_fornecedor')";          


        $stmt = $PDO->prepare($sql);

        $stmt->execute();

        $cod_fornecedor = $PDO->lastInsertId();


        //Insert em fornecedor_ingrediente

        $cod_ingrediente = $_POST ["ingred"];

        $sql = "INSERT INTO fornecedor_ingrediente
        (cod_ingrediente, cod_fornecedor)
        VALUES ($cod_ingrediente, $cod_fornecedor)";

        $stmt = $PDO->prepare($sql);
        $stmt->execute();

        header('Location: fornecedor.php');
    
}

?>