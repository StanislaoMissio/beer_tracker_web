<!DOCTYPE html>
<html lang="en">
<?php require_once("../utils/init.php"); ?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GND | Systems</title>

    <link href="/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/dist/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">GND Systems</a>
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
                <span class="fas fa-home"></span>
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="chamarTela('pedidos')">
                <span class="fas fa-list-alt"></span>
                  Pedidos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="chamarTela('receitas')">
                <span class="fas fa-paste"></span>
                  Receitas
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="chamarTela('ingredientes')">
                <span class="fas fa-utensils"></span>
                  Ingredientes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="chamarTela('fornecedor')">
                <span class="fas fa-dolly"></span>
                  Fornecedores
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="chamarTela('lotes')">
                <span class="fas fa-box"></span>
                  Lotes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                <span class="fas fa-pen"></span>
                  Relatorios
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="chamarTela('login_adm')">
                <span class="fas fa-user"></span>
                  Administração de acessos
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" id="main">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>

          <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

          <h2>Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $PDO = db_connect();
                  $pedidos = $PDO->query("SELECT * FROM pedido WHERE data_pedido > CURRENT_DATE()-7");
                  if (is_array($pedidos) || is_object($pedidos))
                    {
                      foreach($pedidos as $pedido) {
                        echo ('	<tr>
                              <td class="align-middle">'. $pedido["cod_pedido"] .'</td>
                              <td class="align-middle">'. $pedido["data_pedido"] .'</td>
                              <td class="align-middle">'. $pedido["data_entrega"] .'</td>
                              <td class="align-middle">'. $pedido["cod_cliente"] .'</td>
                              <td class="align-middle">'. $pedido["valor_pedido"] .'</td>
                            </tr>');
                      }
                    }
                ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>    
    <script src="/dist/js/bootstrap.min.js"></script>
    <script src="/dist/js/index.js"></script>
  </body>
</html>
