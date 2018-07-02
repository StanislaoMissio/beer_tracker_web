<!doctype html>
<?php require_once('../utils/init.php');?>
<html lang="en">
  <body >             
    <?php  
      $PDO = db_connect(); 

      $sql = "SELECT * FROM lote l INNER JOIN produto p ON p.cod_produto = l.cod_produto";

      $stmt = $PDO->prepare($sql);
      $stmt->execute();
      $info = $stmt->fetchAll();
    ?>
    <div class="row">
      <div class="col-md-8">
        <h2>Listagem de Lotes</h2>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th class="text-center">Número do Lote</th>
            <th>Inicio</th>
            <th>Envase</th>
            <th>Fermentação</th>
            <th>Data final</th>
            <th>OG</th>
            <th>IBU</th>
            <th>FG</th>
            <th>Produto</th>
            <th>Mililitros</th>
          </tr>
        </thead>
        <?php foreach($info as $row): ?>                     
                      
        <tbody>
          <tr>
            <td class="text-center"><?=$row["cod_lote"]?></td>
            <td><?=$row["data_inicio"]?></td>
            <td><?=$row["data_envase"]?></td>
            <td><?=$row["data_fermentacao"]?></td>
            <td><?=$row["data_fim"]?></td>
            <td><?=$row["indice_og"]?></td>
            <td><?=$row["indice_ibu"]?></td>
            <td><?=$row["indice_fg"]?></td>
            <td><?=$row["nome_produto"]?></td>
            <td><?=$row["ml"]?></td>
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
