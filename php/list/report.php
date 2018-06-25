<?php
    require_once('../utils/init.php');

    // pega os dados do formuário
    $cod = isset($_POST['cod']) ? $_POST['cod'] : null;

    $PDO = db_connect();
    $sql = "SELECT COUNT(cod_pedido) FROM pedido";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
    $produto= $stmt->fetchColumn();

    if(!empty($produto)){
        print_r($produto);
    } else {
        print_r($stmt->errorInfo());
    }
?>