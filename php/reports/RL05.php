<!doctype html>
<?php require_once('../utils/init.php');?>
<html lang="en">
  <body >             
    <?php  
      $PDO = db_connect(); 

      $sql = "SELECT * FROM ingrediente i
      LEFT JOIN ingrediente_receita ir ON ir.cod_ingrediente = i.cod_ingrediente
      LEFT JOIN receita r ON r.cod_receita = ir.cod_receita
      WHERE r.cod_receita IS NOT NULL;";

      $stmt = $PDO->prepare($sql);
      $stmt->execute();
      $info = $stmt->fetchAll();
    ?>
    <div class="row">
      <div class="col-md-8">
        <h2>Relatório de ingredientes</h2>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>ID Ingrediente</th>
            <th>Ingrediente</th>
            <th>Descrição ingrediente</th>
            <th>Receita</th>
          </tr>
        </thead>
        <?php foreach($info as $row): ?>                     
                      
        <tbody>
          <tr>
            <td><?=$row["cod_ingrediente"]?></td>
            <td><?=$row["nome_ingrediente"]?></td>
            <td><?=$row["descricao_ingrediente"]?></td>
            <td><?=$row["nome_receita"]?></td>
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
