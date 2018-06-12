<?php
require_once('init.php');

//Verificar se o usuário clicou no botão, clicou no botão acessa o IF e tenta cadastrar, caso contrario acessa o ELSE
$edit = filter_input(INPUT_POST, 'edit', FILTER_SANITIZE_STRING);
if($edit){
    //Receber os dados do formulário
    $cod_fornecedor = filter_input(INPUT_POST, 'cod_fornecedor', FILTER_SANITIZE_NUMBER_INT);
    $razao_social_fornecedor = filter_input(INPUT_POST, 'razao_social_fornecedor', FILTER_SANITIZE_STRING);
    $cnpj_fornecedor = filter_input(INPUT_POST, 'cnpj_fornecedor', FILTER_SANITIZE_STRING);
    $cep_fornecedor = filter_input(INPUT_POST, 'cep_fornecedor', FILTER_SANITIZE_STRING);
    $endereco_fornecedor = filter_input(INPUT_POST, 'endereco_fornecedor', FILTER_SANITIZE_STRING);
    $cidade_fornecedor = filter_input(INPUT_POST, 'cidade_fornecedor', FILTER_SANITIZE_STRING);
    $estado_fornecedor = filter_input(INPUT_POST, 'estado_fornecedor', FILTER_SANITIZE_STRING);
    $pais_fornecedor = filter_input(INPUT_POST, 'pais_fornecedor', FILTER_SANITIZE_STRING);
    $telefone_fornecedor = filter_input(INPUT_POST, 'telefone_fornecedor', FILTER_SANITIZE_STRING);
    $email_fornecedor = filter_input(INPUT_POST, 'email_fornecedor', FILTER_SANITIZE_STRING);
    
    //Inserir no BD
    $sql_update = "UPDATE fornecedor
    SET
        razao_social_fornecedor=:razao_social_fornecedor,
        cnpj_fornecedor=:cnpj_fornecedor,
        cep_fornecedor=:cep_fornecedor,
        endereco_fornecedor=:endereco_fornecedor,
        cidade_fornecedor=:cidade_fornecedor,
        estado_fornecedor=:estado_fornecedor,
        pais_fornecedor=:pais_fornecedor,
        telefone_fornecedor=:telefone_fornecedor,
        email_fornecedor=:email_fornecedor
    WHERE cod_fornecedor=$cod_fornecedor";
    
    $update_fornecedor = $conn->prepare($sql_update);
    $update_fornecedor->bindParam(':razao_social_fornecedor', $razao_social_fornecedor);
    $update_fornecedor->bindParam(':cnpj_fornecedor', $cnpj_fornecedor);
    $update_fornecedor->bindParam(':cep_fornecedor', $cep_fornecedor);
    $update_fornecedor->bindParam(':endereco_fornecedor', $endereco_fornecedor);
    $update_fornecedor->bindParam(':cidade_fornecedor', $cidade_fornecedor);
    $update_fornecedor->bindParam(':estado_fornecedor', $estado_fornecedor);
    $update_fornecedor->bindParam(':pais_fornecedor', $pais_fornecedor);
    $update_fornecedor->bindParam(':telefone_fornecedor', $telefone_fornecedor);
    $update_fornecedor->bindParam(':email_fornecedor', $email_fornecedor);
    
    if($update_fornecedor->execute()){
        $_SESSION['msg'] = "<p style='color:green;'>Fornecedor editado com sucesso</p>";
        header("Location: fornecedor.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Fornecedor não foi editado com sucesso</p>";
        header("Location: fornecedor.php");
    }    
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Fornecedor não foi editado com sucesso</p>";
    header("Location: fornecedor.php");
}