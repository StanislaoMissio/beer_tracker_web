<?php

require_once('../utils/init.php');

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$login = isset($_POST['login']) ? $_POST['login'] : null;   
$email = isset($_POST['email']) ? $_POST['email'] : null;
$senha = md5 ($_POST['senha']) ? $_POST['senha'] : null;
 
    if (empty($nome) || empty($login) || empty($email) || empty($senha))
    {
        echo "Volte e preencha todos os campos";
        exit;
    }

$PDO = db_connect();
$sql = "INSERT INTO usuario(nome_usuario, login_usuario, email_usuario,senha_usuario) VALUES(:nome, :login, :email, :senha)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':login', $login);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senha);

if ($stmt->execute()){
    header("Refresh:0; url=login_adm.php");
}
else{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());

    if($sql){
        echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='/php/login.php'</script>";
      }else{
        echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='/php/login_registrar.php'</script>";
      }
}

?>