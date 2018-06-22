<?php require_once('../utils/init.php');

    $PDO = db_connect(); 

        $sql = "SELECT * FROM fornecedor";

        $stmt = $PDO->prepare($sql);
        $stmt->execute();
        $info = $stmt->fetchAll();

?>