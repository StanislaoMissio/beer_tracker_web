<!doctype html>

<?php require_once('init.php');?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favicon.ico">

    <title>GND | Systems</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../dist/css/dashboard.css" rel="stylesheet">
    <!-- font icon -->
    <link href="../dist/css/elegant-icons-style.css" rel="stylesheet">

  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Cervejaria Karavelle</a>
      
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="login.php">Sair</a>
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
        
        <!--Consulta MySQL para popular tabela com receitas cadastradas-->             
              
        <?php  
          $PDO = db_connect(); 

          $sql = "SELECT * FROM cervejaria.fornecedor f
          LEFT JOIN fornecedor_ingrediente fi ON fi.cod_fornecedor = f.cod_fornecedor
          LEFT JOIN ingrediente i ON i.cod_ingrediente = fi.cod_ingrediente;";
  
          $stmt = $PDO->prepare($sql);
          $stmt->execute();
          $info = $stmt->fetchAll();
        ?>
        <!--Fim consulta MySQL-->          

        <div class="row">
          <div class="col-md-8">
            <h2>Listagem Fornecedores</h2>
          </div>

          <div class="col-md-4">
            <a class="btn btn-success" style="float: right" href="" role="button">Exportar</a>            
          </div>
          
        </div>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Fornecedor</th>
                  <th>Endereço</th>
                  <th>Cidade</th>
                  <th>Telefone</th>
                  <th>E-mail</th>
                  <th>Produto</th>
                  <th>Descrição</th>
                </tr>
              </thead>
              <?php foreach($info as $row): ?>                     
                           
              <tbody>
                <tr>
                  <td><?=$row["cod_fornecedor"]?></td>
                  <td><?=$row["razao_social_fornecedor"]?></td>
                  <td><?=$row["endereco_fornecedor"]?></td>
                  <td><?=$row["cidade_fornecedor"]?></td>
                  <td><?=$row["telefone_fornecedor"]?></td>
                  <td><?=$row["email_fornecedor"]?></td>
                  <td><?=$row["nome_ingrediente"]?></td>
                  <td><?=$row["descricao_ingrediente"]?></td>
                </tr>                               
              </tbody>
                <?php endforeach; ?>
            </table>
          </div>
        </main>
      </div>
    </div>

  </body>
</html>
