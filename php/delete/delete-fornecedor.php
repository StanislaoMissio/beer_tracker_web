<?php require_once('../utils/init.php');
    
  $PDO = db_connect(); 

  $cod = $_GET["cod_fornecedor"];

  $sql = "DELETE FROM fornecedor WHERE cod_fornecedor = :cod";

  $statement = $PDO->prepare($sql);
  $statement->bindParam(':cod',$cod);

  if ($statement->execute()) {
    header("Location: fornecedor.php");
  }

?>