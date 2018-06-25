<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="/img/favicon.png">

    <title>GND | Cervejaria</title>

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


<body class="text-center">

    <form class="form-signin" action="login-entrar.php" method="post">
      <img class="mb-4" src="http://mysafetywill.com/SafetyWill4Survey/image/security2.png" alt="" width="100" height="100">
      <h1 class="h3 mb-3 font-weight-normal">Informações de login</h1>

      <!-- Inserindo o usuário -->
      <label for="inputUsuario" class="sr-only">Usuário</label>
      <input type="usuario" id="login" name="login" class="form-control" placeholder="Usuario" required autofocus>

      <!-- Inserindo a senha do usuário -->
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
      <div class="checkbox mb-3">

        <!-- Opções lembrar-me e esqueci a senha -->
        <label>
          <input type="checkbox" value="Lembrar-me"><span class="pull-left">Lembrar-me</span>
          <span class="pull-right"> <a href="#"> Esqueci minha senha</a></span>
        </label>
      </div>

        <div class="btn-group btn-group-justified">
            <input type="submit" class="btn btn-info btn-lg btn-block" value="Entrar" id="entrar" name="entrar"> 
        </div>
      
      <label><p><p class="mt-5 mb-3 text-muted">&copy; GND Systems 2018</p></label></p>

    </form>

</body>
</html>