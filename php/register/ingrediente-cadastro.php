<!doctype html>
<?php require_once('init.php');?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Cadastrar novo pedido</title>

    <!-- Bootstrap core CSS -->
    <link href="/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/dist/css/form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-secondary">
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">GND Systems</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sair</a>
        </li>
      </ul>
    </nav>

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2 class="text-light">Cadastro de Ingrediente</h2>
      </div>

      <div class="card">
        <div class="card-body">
          <form class="needs-validation" novalidate action="ingredientes-insert.php" method="post">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Nome do ingrediente</label>
                <input type="text" class="form-control" name="nome" id="nome" required>
                <div class="invalid-feedback">
                  Insira o Nome do ingrediente
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Descrição do ingrediente</label>
                <input type="text" class="form-control" name="descricao" id="descricao" required>
                <div class="invalid-feedback">
                  Insira a descrição.
                </div>
              </div>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Cadastrar</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1 text-light">&copy; 2017-2018 GND Systems</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a class="text-light" href="#">Privacy</a></li>
          <li class="list-inline-item"><a class="text-light" href="#">Terms</a></li>
          <li class="list-inline-item"><a class="text-light" href="#">Support</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/assets/js/vendor/popper.min.js"></script>
    <script src="/dist/js/bootstrap.min.js"></script>
    <script src="/assets/js/vendor/holder.min.js"></script>
    <script src="/js/dist/pedidos-cadastro.js"></script>
  </body>
</html>
