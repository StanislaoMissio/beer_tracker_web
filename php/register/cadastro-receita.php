<!doctype html>

<?php require_once('../utils/init.php');?>

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
    <?php  
      $PDO = db_connect(); 

      $sql = "SELECT * FROM ingrediente";

      $stmt = $PDO->prepare($sql);
      $stmt->execute();
      $info = $stmt->fetchAll();
    ?>                     
          
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
        <h2 class="text-light">Cadastro de Receita</h2>
      </div>
      <div class="card">
        <div class="card-body">
          <form class="needs-validation" novalidate action="ingredientes-insert.php" method="post">
            <div class="row">
              <div class="form-group col-md-4">
                <label>Ingrediente</label>
                <select class="form-control" name="ingred1">
                  <?php foreach($info as $ingred): ?>
                  <option value="<?=$ingred["cod_ingrediente"]?>"><?=$ingred["nome_ingrediente"]?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label>Ingrediente</label>
                <select class="form-control" name="ingred2">
                  <?php foreach($info as $ingred): ?>
                  <option value="<?=$ingred["cod_ingrediente"]?>"><?=$ingred["nome_ingrediente"]?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label>Ingrediente</label>
                <select class="form-control" name="ingred3">
                  <?php foreach($info as $ingred): ?>
                    <option value="<?=$ingred["cod_ingrediente"]?>"><?=$ingred["nome_ingrediente"]?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-4">
                <label>Quantidade</label>
                  <input class="form-control input-number" type="number" value="0" name="qtd1">
              </div>
              <div class="form-group col-md-4">
                <label>Quantidade</label>
                  <input class="form-control input-number" type="number" value="0" name="qtd2">
              </div>
              <div class="form-group col-md-4">
                <label>Quantidade</label>
                  <input class="form-control input-number" type="number" value="0" name="qtd3"> 
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-3">
                <label>Original Gravity</label>
                  <input class="form-control input-number" type="number" value="0" name="OG">                
              </div>

              <div class="form-group col-md-3">
                <label>Final Gravity</label>
                <input class="form-control input-number" type="number" value="0" name="FG">
              </div>

              <div class="form-group col-md-3">
                <label>International Bitter Units</label>
                <input class="form-control input-number" type="number" value="0" name="IBU">
              </div>

              <div class="form-group col-md-3">
                <label>Alcohol by Volume</label>
                <input class="form-control input-number" type="number" value="0" name="ABV">
              </div>              
            </div>

            <div class="row">
              <div class="form-group col-md-2">
                <label>Brassagem</label>
                  <input class="form-control input-number" type="number" value="0" name="brassagem">                
              </div>

              <div class="form-group col-md-2">
                <label>Fervura</label>
                <input class="form-control input-number" type="number" value="0" name="fervura">
              </div>

              <div class="form-group col-md-2">
                <label>Fermentação</label>
                <input class="form-control input-number" type="number" value="0" name="fermentacao">
              </div>

              <div class="form-group col-md-2">
                <label>Rampa Ativa</label>
                <input class="form-control input-number" type="number" value="0" name="rampa">
              </div>   

              <div class="form-group col-md-2">
                <label>Variação</label>
                <input class="form-control input-number" type="number" value="0" name="variacao">
              </div>

              <div class="form-group col-md-2">
                <label>Temperatura</label>
                <input class="form-control input-number" type="number" value="0" name="temperatura">
              </div>

            </div>    

            </section>
          </div>

          <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-primary" type="submit" name="submit">Salvar Receita</button> <button class="btn btn-default" type="button">Cancelar</button>
              </div>
          </div>
            
        </section><!--main content end-->
        </form>
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
  </body>
</html>