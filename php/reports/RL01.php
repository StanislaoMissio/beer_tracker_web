<!doctype html>
<?php require_once('../utils/init.php');?>
<html lang="en">
  <body>
      <?php  
        $PDO = db_connect(); 

        $sql = 
            "SELECT p.cod_pedido, c.razao_social, p.data_pedido, p.data_entrega, p.valor_pedido, ip.total, ip.quantidade,
                pr.nome_produto, l.cod_lote, l.data_inicio, l.data_fermentacao, l.data_fim
            FROM pedido p 
            INNER JOIN item_pedido ip 
            ON ip.cod_pedido = p.cod_pedido
            INNER JOIN produto pr
            ON ip.cod_produto = pr.cod_produto
            INNER JOIN lote l
            ON l.cod_produto = pr.cod_produto
            INNER JOIN cliente c
            ON c.cod_cliente = p.cod_cliente";

        $stmt = $PDO->prepare($sql);
        $stmt->execute();
        $info = $stmt->fetchAll();
      ?>
      <h2 class="ml-4">Listagem Pedidos</h2>

          
      </div>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th class="align-middle">Número</th>
                <th class="align-middle">Cliente</th>
                <th class="align-middle">Data do pedido</th>
                <th class="align-middle">Data da entrega</th>
                <th class="align-middle">Valor do pedido</th>
                <th class="align-middle">Produto</th>
                <th class="align-middle">Total do pedido</th>
                <th class="align-middle">Quantidade</th>
                <th class="align-middle">Numero Lote</th>
                <th class="align-middle">Inicio da receita</th>
                <th class="align-middle">Fermentação da receita</th>
                <th class="align-middle">Fim da receita</th>
              </tr>
            </thead>
            <?php foreach($info as $row): ?>                     
                          
            <tbody>
              <tr>
                <td class="align-middle"><?=$row["cod_pedido"]?></td>
                <td class="align-middle"><?=$row["razao_social"]?></td>
                <td class="align-middle"><?=$row["data_pedido"]?></td>
                <td class="align-middle"><?=$row["data_entrega"]?></td>
                <td class="align-middle"><?=$row["valor_pedido"]?></td>
                <td class="align-middle"><?=$row["nome_produto"]?></td>
                <td class="align-middle"><?=$row["total"]?></td>
                <td class="align-middle"><?=$row["quantidade"]?></td>
                <td class="align-middle"><?=$row["cod_lote"]?></td>
                <td class="align-middle"><?=$row["data_inicio"]?></td>
                <td class="align-middle"><?=$row["data_fermentacao"]?></td>
                <td class="align-middle"><?=$row["data_fim"]?></td>
              </tr>                               
            </tbody>
              <?php endforeach; ?>
          </table>
        </div>
      </div>
  </body>
</html>
