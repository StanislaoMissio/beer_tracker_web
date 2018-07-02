<!doctype html>
<?php require_once('../utils/init.php');?>
<html lang="en">
  <body>
      <?php  
        $PDO = db_connect(); 

        $sql = "SELECT *
        FROM cervejaria.receita r
          INNER JOIN ingrediente_receita ir ON r.cod_receita = ir.cod_receita
          INNER JOIN ingrediente i ON ir.cod_ingrediente = i.cod_ingrediente;";

        $stmt = $PDO->prepare($sql);
        $stmt->execute();
        $info = $stmt->fetchAll();
      ?>
      <h2 class="ml-4">Listagem Receitas</h2>

          
      </div>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome da receita</th>
                <th>Ingredientes</th>
                <th>OG</th>
                <th>FG</th>
                <th>IBU</th>
                <th>ABV</th>
                <th>Fermentação</th>
                <th>Fervura</th>
                <th>Brassagem</th>
                <th>Repouso</th>
                <th>Variações</th>
              </tr>
            </thead>
            <?php foreach($info as $row): ?>                     
                          
            <tbody>
              <tr>
                <td><?=$row["cod_receita"]?></td>
                <td><?=$row["nome_receita"]?></td>
                <td><?=$row["nome_ingrediente"]?></td>
                <td><?=$row["indice_og"]?></td>
                <td><?=$row["indice_fg"]?></td>
                <td><?=$row["indice_ibu"]?></td>
                <td><?=$row["indice_abv"]?></td>
                <td><?=$row["tempo_fermentacao"]?></td>
                <td><?=$row["tempo_fervura"]?></td>
                <td><?=$row["tempo_brasagem"]?></td>
                <td><?=$row["tempo_repouso"]?></td>
                <td><?=$row["tempo_variacao"]?></td>
              </tr>                               
            </tbody>
              <?php endforeach; ?>
          </table>
        </div>
      </div>
  </body>
</html>
