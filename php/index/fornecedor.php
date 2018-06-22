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
      function deletar_saporra(cod_fornecedor) {
        if (confirm('Confirma deleção do fornecedor?')) {
          window.location.href = 'delete-fornecedor.php?cod_fornecedor=' + cod_fornecedor;
        }
        return false;
      }
    </script>

  </head>

  <body>
        <main role="main">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
           
          </div>
        
        <!--Consulta MySQL para popular tabela com fornecedores cadastrados-->             
              
        <?php  
              $PDO = db_connect(); 

              $sql = "SELECT * FROM fornecedor";
      
              $stmt = $PDO->prepare($sql);
              $stmt->execute();
              $info = $stmt->fetchAll();
        ?>
        <!--Fim consulta MySQL que popula tabela-->          

        <div class="row">
          <div class="col-md-8">
            <h2>Fornecedores</h2>
          </div>

          <div class="col-md-4">
            <button class="btn btn-primary" onclick="location.href='../register/fornecedor-cadastro.php'">
            + Adicionar Fornecedor
            </button>            
          </div>
        </div>

          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                <th>ID</th>
                <th>Nome Fornecedor</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Ingrediente</th>
                <th class="actions">Ações</th>
                </tr>
              </thead>
            <?php foreach($info as $row): ?>              
                <tbody>
                <tr>
                  <td><?=$row["cod_fornecedor"]?></td>
                  <td><?=$row["razao_social_fornecedor"]?></td>
                  <td><?=$row["telefone_fornecedor"]?></td>
                  <td><?=$row["email_fornecedor"]?></td>
                  <td><?=$row["cidade_fornecedor"]?></td>
                  <td class="actions">
                  <button class="btn btn-large btn-success" onclick="RemoveTableRow(this)" type="button">Visualizar</button>

                  <a class="btn btn-large btn-primary"
                  href="Editar-fornecedor.php?cod_fornecedor=<?=$row['cod_fornecedor']?>">Editar</a>

                  
                  <button class="btn btn-large btn-danger" onclick='deletar_saporra(<?=$row["cod_fornecedor"]?>)'>Remover</button>
                  </td>
                </tr>                               
                </tbody>
            <?php endforeach; ?>
            </table>
          </div>
        </main>

  </body>
</html>
