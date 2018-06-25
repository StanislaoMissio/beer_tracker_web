<!doctype html>

<?php require_once('../utils/init.php');?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GND | Systems</title>

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

        $sql = "SELECT * FROM receita";

        $stmt = $PDO->prepare($sql);
        $stmt->execute();
        $info = $stmt->fetchAll();
      ?>

      <div class="row">
        <div class="col-md-8">
          <h2>Receitas</h2>
        </div>

        <div class="col-md-4">
          <a class="btn btn-primary" href="../register/cadastro-receita.php" role="button">+ Adicionar Receita</a>            
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

  </body>
</html>
