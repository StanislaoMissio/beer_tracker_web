<?php require_once('../utils/init.php');
    
  $PDO = db_connect(); 

  $cod = $_GET["cod_receita"];

  $sql = "DELETE FROM receita WHERE cod_receita = :cod";

  $statement = $PDO->prepare($sql);
  $statement->bindParam(":cod", $cod);

  if ($statement->execute()) {
    header("Location: receitas-ca.php");
  }

?>

