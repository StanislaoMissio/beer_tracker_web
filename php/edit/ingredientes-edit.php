<?php
    require_once("init.php");

    $codIngrediente = $_POST["cod"];
    $nomeIngrediente = $_POST["nome"];
    $descricaoIngrediente = $_POST["descricao"];

    $PDO = db_connect();
    $stmt = $PDO->prepare("UPDATE ingrediente 
    SET nome_ingrediente = :nome, descricao_ingrediente = :descricao 
    where cod_ingrediente = :cod");
    $stmt->bindParam(':cod', $codIngrediente, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nomeIngrediente, PDO::PARAM_STR);
    $stmt->bindParam(':descricao', $descricaoIngrediente, PDO::PARAM_STR);

    if ($stmt->execute()){
        echo ('true');
    }
    else{
        echo ($stmt->erroInfo());
    }
    
?>