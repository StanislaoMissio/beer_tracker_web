<!doctype html>
<?php require_once('../utils/init.php');?>
<html lang="en">
  <body>
      <?php  
        $PDO = db_connect(); 

        $sql = "SELECT * FROM pedido p 
        INNER JOIN item_pedido ip 
        ON ip.cod_pedido = p.cod_pedido
        INNER JOIN produto pr
        ON ip.cod_produto = pr.cod_produto
        INNER JOIN lote l
        ON l.cod_produto = pr.cod_produto";

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
                <td><?=$row["cod_pedido"]?></td>
                <td><?=$row["data_pedido"]?></td>
                <td><?=$row["data_entrega"]?></td>
                <td><?=$row["razao_social"]?></td>
                <td><?=$row["valor_pedido"]?></td>
                <td><?=$row["nome_produto"]?></td>
                <td><?=$row["preco_item"]?></td>
                <td><?=$row["quantidade"]?></td>
                <td><?=$row["preco_produto"]?></td>
                <td><?=$row["cod_lote"]?></td>
                <td><?=$row["data_inicio"]?></td>
                <td><?=$row["data_envase"]?></td>
                <td><?=$row["data_fermentação"]?></td>
                <td><?=$row["data_fim"]?></td>
                <td><?=$row["indice_og"]?></td>
              </tr>                               
            </tbody>
              <?php endforeach; ?>
          </table>
        </div>
      </div>
  </body>
</html>
