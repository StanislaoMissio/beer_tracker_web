<?php 
require_once('init.php');

$codIngrediente = $_POST['cod'];

    $PDO = db_connect();
    $stmt = $PDO->prepare("DELETE FROM ingrediente where cod_ingrediente = :cod");
    $stmt->bindParam(':cod', $codIngrediente, PDO::PARAM_INT);

    if ($stmt->execute()){
        echo ('true');
    }
    else{
        echo ($stmt->erroInfo());
    }
?>