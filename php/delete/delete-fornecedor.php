<?php require_once('init.php');
    
$PDO = db_connect(); 

$cod1 = $_GET["cod_fornecedor"];

$sql = "DELETE FROM fornecedor WHERE cod_fornecedor=$cod1";

$statement = $PDO->prepare($sql);

if ($statement->execute(['cod_fornecedor' => $cod_fornecedor])) {

  header("Location: fornecedor.php");
}

?>