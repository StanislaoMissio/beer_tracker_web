<?php 
 
// inclui o arquivo de inicialização
require_once('../utils/init.php');
 
// resgata variáveis do formulário
$login = isset($_POST['login']) ? $_POST['login'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
 
if (empty($login) || empty($senha))
{
    echo "Informe usuário e senha";
    exit;
}
 
$PDO = db_connect();
 
$sql = "SELECT * FROM usuario WHERE login_usuario = :login AND senha_usuario= :password";
$stmt = $PDO->prepare($sql);
 
$stmt->bindParam(':login', $login);
$stmt->bindParam(':password', $senha);
 
if ($stmt->execute()){
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($users) <= 0)
    {
        echo "Email ou senha incorretos";
        exit;
    }
    header ('Location: index.php');
}

else {
    print_r($stmt->errorInfo());
} 

// pega o primeiro usuário
$user = $users[0];
 
session_start();
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['cod_usuario'];
$_SESSION['user_name'] = $user['nome_usuario'];

?>