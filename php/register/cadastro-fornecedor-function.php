<?php

require_once('../utils/init.php');

$razao_social_fornecedor = isset($_POST['razao_social']) ? $_POST['razao_social'] : null;
$cnpj_fornecedor = isset($_POST['cnpj']) ? $_POST['cnpj'] : null;
$cep_fornecedor = isset($_POST['cep']) ? $_POST['cep'] : null;
$endereco_fornecedor = isset($_POST['endereco']) ? $_POST['endereco'] : null;
$cidade_fornecedor = isset($_POST['cidade']) ? $_POST['cidade'] : null;
$estado_fornecedor = isset($_POST['estado']) ? $_POST['estado'] : null;
$pais_fornecedor = isset($_POST['pais']) ? $_POST['pais'] : null;
$telefone_fornecedor = isset($_POST['telefone']) ? $_POST['telefone'] : null;
$email_fornecedor = isset($_POST['email']) ? $_POST['email'] : null;
$cod_ingrediente = isset($_POST['email']) ? $_POST['email'] : null;

    $PDO = db_connect();

    $sql = "INSERT INTO fornecedor (razao_social_fornecedor, cnpj_fornecedor, cep_fornecedor,
            endereco_fornecedor,cidade_fornecedor, estado_fornecedor, pais_fornecedor, telefone_fornecedor, email_fornecedor)
            VALUES (':razao', ':cnpj', ':cep', ':endereco', ':cidade', ':estado', ':pais',':telefone', ':email')";          

    $stmtFornecedor = $PDO->prepare($sql);
    $stmtFornecedor->bindParam(":razao", $razao_social_fornecedor, PDO::PARAM_STR);
    $stmtFornecedor->bindParam(":cnpj", $cnpj_fornecedor, PDO::PARAM_STR);
    $stmtFornecedor->bindParam(":cep", $cep_fornecedor, PDO::PARAM_STR);
    $stmtFornecedor->bindParam(":endereco", $endereco_fornecedor, PDO::PARAM_STR);
    $stmtFornecedor->bindParam(":cidade", $cidade_fornecedor, PDO::PARAM_STR);
    $stmtFornecedor->bindParam(":estado", $estado_fornecedor, PDO::PARAM_STR);
    $stmtFornecedor->bindParam(":pais", $pais_fornecedor, PDO::PARAM_STR);
    $stmtFornecedor->bindParam(":telefone", $telefone_fornecedor, PDO::PARAM_STR);
    $stmtFornecedor->bindParam(":email", $email_fornecedor, PDO::PARAM_STR);

    if($stmtFornecedor->execute()){
        $cod_fornecedor = $PDO->lastInsertId();
    } else {
        print_r($stmtFornecedor->errorInfo());
    }

    $sql = "INSERT INTO fornecedor_ingrediente
    (cod_ingrediente, cod_fornecedor)
    VALUES (':cod_ingrediente', ':cod_fornecedor')";

    $stmtIngrediente = $PDO->prepare($sql);
    $stmtIngrediente->bindParam(":cod_ingrediente", $cod_ingrediente, PDO::PARAM_INT);
    $stmtIngrediente->bindParam(":cod_fornecedor", $cod_fornecedor, PDO::PARAM_INT);
    if($stmtIngrediente->execute()){
        header("Refresh:0; url=fornecedor-cadastro.php");
    } else {
        print_r($stmtIngrediente->errorInfo());
    }
?>