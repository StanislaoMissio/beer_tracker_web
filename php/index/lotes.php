<!doctype html>

<?php require_once('../utils/init.php');?>

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
        <main role="main">
        <?php  
          $PDO = db_connect(); 

          $sql = "SELECT * FROM lote l
                    INNER JOIN produto p ON p.cod_produto = l.cod_produto;";
  
          $stmt = $PDO->prepare($sql);
          $stmt->execute();
          $info = $stmt->fetchAll();
        ?>

        <div class="row">
          <div class="col-md-8">
            <h2>Lotes</h2>
          </div>

          <div class="col-md-4">
            <a class="btn btn-large btn-success" href="cadastro-lote.php" role="button">+ Adicionar Lote</a>            
          </div>
        </div>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Produto</th>
                  <th>Início</th>
                  <th>Envase</th>
                  <th>Fermentação</th>
                  <th>Término</th>
                </tr>
              </thead>
              <?php foreach($info as $row): ?>                     
                           
              <tbody>
                <tr>
                  <td><?=$row["cod_lote"]?></td>
                  <td><?=$row["nome_produto"]?></td>
                  <td><?=$row["data_inicio"]?></td>
                  <td><?=$row["data_envase"]?></td>
                  <td><?=$row["data_fermentacao"]?></td>
                  <td><?=$row["data_fim"]?></td>
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
