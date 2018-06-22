<?php 
require_once('../utils/init.php');

$codUsuario = $_POST['cod'];

    $PDO = db_connect();      
    $stmt = $PDO->prepare("DELETE FROM usuario where cod_usuario = :cod_usuario");
    $stmt->bindParam(':cod_usuario', $codUsuario, PDO::PARAM_INT);

    if ($stmt->execute()){
        echo ('true');
    }
    else{
        echo ($stmt->erroInfo());
    }
?>