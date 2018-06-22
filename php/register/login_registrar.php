<!DOCTYPE html>

<?php require_once('../utils/init.php');?>

<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="/img/favicon.png">

        <title>Registre-se</title>

        <!-- Bootstrap CSS -->
        <link href="/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="/dist/css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="/dist/css/elegant-icons-style.css" rel="stylesheet" />
        <link href="/dist/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles -->
        <link href="/dist/css/signin.css" rel="stylesheet"/>

</head>

<body>

    <form class="form-register" method="POST" action="login-registrar-insert.php">
        
        <div class="form-group">
            <h1 class="h2 mb-3 font-weight-normal">Cadastro de Usuários</h1>
        </div>

        <!-- Imput do nome completo -->
        <div class="form-group">
            <label for="nome">Nome completo</label>
            <input type="text" name="nome" class="form-control" id="nome" placeholder="Insira o seu nome completo" required autofocus>
        </div>

        <!-- Imput do nome de usuário -->
        <div class="form-group">
            <label for="username">Nome de Usuário</label>
            <input type="text" name="login" class="form-control" id="login" placeholder="Insira o seu nome de usuário" required>
        </div>

        <!-- Imput do email de cadastro -->
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="nome@exemplo.com" required>
        </div>

        <!-- Imput da senha -->
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha" required>
        </div>

            <!-- Botão para registrar -->
            <input type="submit" class="btn btn-info btn-lg btn-block" value="Registrar" id="cadastrar" name="cadastrar">
    </form>
        
</body>
</html>