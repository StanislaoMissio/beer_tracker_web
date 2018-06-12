<?php 
require_once('init.php');

$codPedido = $_POST['cod'];

    $PDO = db_connect();
    $stmt = $PDO->prepare("DELETE FROM pedido where cod_pedido = :cod");
    $stmt->bindParam(':cod', $codPedido, PDO::PARAM_INT);

    if ($stmt->execute()){
        echo ('true');
    }
    else{
        echo ($stmt->errorInfo());   
    }