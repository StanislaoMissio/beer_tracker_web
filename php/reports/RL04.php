<!doctype html>
<?php require_once('../utils/init.php');?>
<html lang="en">
  <body>
    <div class="row">
      <?php  
          $PDO = db_connect(); 

          $sql = 
                "SELECT p.nome_produto, p.preco_produto, r.nome_receita, r.descricao_receita,
                r.tempo_fervura, r.tempo_fermentacao, r.tempo_brasagem, r.tempo_variacao, r.tempo_repouso, COUNT(r.cod_receita) as receitas_feitas
                FROM produto p 
                INNER JOIN receita r
                ON r.cod_receita = p.cod_receita
                GROUP BY r.cod_receita";
  
          $stmt = $PDO->prepare($sql);
          $stmt->execute();
          $info = $stmt->fetchAll();
      ?>
        <div class="col-md-8">
          <h2>Listagem de Produtos</h2>
        </div>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th class="align-middle">Produto</th>
                  <th class="align-middle">Preço</th>
                  <th class="align-middle">Receita</th>
                  <th class="align-middle">Descrição da receita</th>
                  <th class="align-middle">Fervura</th>
                  <th class="align-middle">Fermentação</th>
                  <th class="align-middle">Brasagem</th>
                  <th class="align-middle">Variação</th>
                  <th class="align-middle">Repouso</th>
                  <th class="align-middle">Quantidade de receitas feitas</th>
                </tr>
              </thead>
              <?php foreach($info as $row): ?>                     
                           
              <tbody>
                <tr>
                  <td class="align-middle"><?=$row["nome_produto"]?></td>
                  <td class="align-middle"><?=$row["preco_produto"]?></td>
                  <td class="align-middle"><?=$row["nome_receita"]?></td>
                  <td class="align-middle"><?=$row["descricao_receita"]?></td>
                  <td class="align-middle"><?=$row["tempo_fervura"]?></td>
                  <td class="align-middle"><?=$row["tempo_fermentacao"]?></td>
                  <td class="align-middle"><?=$row["tempo_brasagem"]?></td>
                  <td class="align-middle"><?=$row["tempo_variacao"]?></td>
                  <td class="align-middle"><?=$row["tempo_repouso"]?></td>
                  <td class="align-middle"><?=$row["receitas_feitas"]?></td>
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
