<?php require_once('init.php');

    $PDO = db_connect(); 

        $sql = "SELECT * FROM receita";

        $stmt = $PDO->prepare($sql);
        $stmt->execute();
        $info = $stmt->fetchAll();

?>