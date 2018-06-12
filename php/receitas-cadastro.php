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

    <script language="JavaScript" type="text/javascript">
      function deletar(cod_receita) {
        if (confirm('Confirma deleção desta receita?')) {
          window.location.href = 'delete-cerveja.php?cod_receita=' + cod_receita;
        }
        return false;
      }
    </script>

  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Cervejaria Karavelle</a>
      
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="login.php">Sign out</a>
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

          $sql = "SELECT * FROM receita";
  
          $stmt = $PDO->prepare($sql);
          $stmt->execute();
          $info = $stmt->fetchAll();
        ?>
        <!--Fim consulta MySQL-->          

        <div class="row">
          <div class="col-md-8">
            <h2>Receitas</h2>
          </div>

          <div class="col-md-4">
            <a class="btn btn-primary" href="cadastro-receita.php" role="button">+ Adicionar Receita</a>            
          </div>
        </div>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome da receita</th>
                  <th>OG</th>
                  <th>FG</th>
                  <th>IBU</th>
                  <th>ABV</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <?php foreach($info as $row): ?>                     
                           
              <tbody>
                <tr>
                  <td><?=$row["cod_receita"]?></td>
                  <td><?=$row["nome_receita"]?></td>
                  <td><?=$row["indice_og"]?></td>
                  <td><?=$row["indice_fg"]?></td>
                  <td><?=$row["indice_ibu"]?></td>
                  <td><?=$row["indice_abv"]?></td>
                  <td class="actions">
                    <button class="btn btn-large btn-success">Visualizar</button>
                    
                    <a class="btn btn-large btn-primary"
                      href="editar-receita.php?cod_receita=<?=$row['cod_receita']?>">Editar</a>

                    <button class="btn btn-large btn-danger" onclick='deletar(<?=$row["cod_receita"]?>)'>Remover</button>
                  </td>
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
