<!doctype html>

<?php require_once('init.php');?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favicon.png">

    <title>GND | Systems</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../dist/css/dashboard.css" rel="stylesheet">
    <!-- font icon -->
    <link href="../dist/css/elegant-icons-style.css" rel="stylesheet">
    <link href="../dist/css/font-awesome.min.css" rel="stylesheet">
    
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Cervejaria Karavelle</a>
      
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sair</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="index.php">
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="receitas-ca.php">
                  <span class="fa fa-beer"></span>
                  Receitas
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  Ingredientes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="fornecedor.php">
                  <span data-feather="users"></span>
                  Fornecedores
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Pedidos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Lotes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Relatórios
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Administração de acessos
                </a>
              </li>            
            </ul>
          </div>
      </div>
    </div>    
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
           
          </div>         

          <h2>Novo Lote</h2>

           <!-- Conteúdo do painel -->

            <!--Consulta MySQL para popular nome do produto-->
               

           <form action="cadastro-lote-function.php" method="POST"> 

           <!--Consulta MySQL para popular dropdown-->
            <?php  
                $PDO = db_connect(); 

                $sql = "SELECT * FROM produto";
        
                $stmt = $PDO->prepare($sql);
                $stmt->execute();
                $info = $stmt->fetchAll();
              ?>    

            <div class="form-group">
              <label>Produto</label>
              <select class="form-control" name="nome_produto">
                  <!-- Lista receitas cadastrados - Banco -->
                  <?php foreach($info as $ingred): ?>
                  <option value="<?=$ingred["cod_produto"]?>"><?=$ingred["nome_produto"]?></option>
                  <?php endforeach; ?>
                  <!-- Lista produtos cadastrados - Banco -->
                </select>
            </div>  

              
            <div class="row">
              <div class="form-group col-md-3">
                <label>Início</label>
                    <input type="date" id="date" name="inicio">
              </div>


              <div class="form-group col-md-3">
                <label>Envase</label>
                    <input type="date" id="date" name="envase">
              </div>

              <div class="form-group col-md-3">
                <label>Fermentação</label>
                    <input type="date" id="date" name="fermentacao">
              </div>

              <div class="form-group col-md-3">
                <label>Término</label>
                    <input type="date" id="date" name="termino">
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

         
 
                        </section>
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="submit">Salvar Lote</button> <button class="btn btn-default" type="button">Cancelar</button>
                    </div>
                </div>
                
            </section><!--main content end-->
            
            <div class="text-center">
                <div class="credits">
                    <a href="http://fatecid.com.br/v2014/index.php">GND Systems</a> by <a href="http://fatecid.com.br/v2014/index.php">GND</a>
                </div>
            </div>
            </form>
          </div>
        </main>
      </div>
  </body>
</html>