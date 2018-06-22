<?php 
require_once('../utils/init.php');

$codUsuario = $_POST["cod"];
$nomeUsuario = $_POST["nome"];
$loginUsuario = $_POST["login"];
$emailUsuario = $_POST["email"];

        $PDO = db_connect();
        $stmt = $PDO->prepare("UPDATE usuario 
        SET nome_usuario=:nome, login_usuario=:login_user, email_usuario=:email
        where cod_usuario = :cod");    
 
            $stmt->bindParam(':cod', $codUsuario, PDO::PARAM_INT);
            $stmt->bindValue(':nome', $nomeUsuario, PDO::PARAM_STR);
            $stmt->bindValue(':login_user', $loginUsuario, PDO::PARAM_STR);
			$stmt->bindValue(':email', $emailUsuario, PDO::PARAM_STR);

            if ($stmt->execute()){
                echo ('true');
            }
            else{
                echo ($stmt->erroInfo());
            }
?>