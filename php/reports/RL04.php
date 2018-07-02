<!doctype html>
<?php require_once('../utils/init.php');?>
<html lang="en">
  <body>
    <div class="row">
      <?php  
          $PDO = db_connect(); 

          $sql = "SELECT * FROM cervejaria.fornecedor f
          LEFT JOIN fornecedor_ingrediente fi ON fi.cod_fornecedor = f.cod_fornecedor
          LEFT JOIN ingrediente i ON i.cod_ingrediente = fi.cod_ingrediente;";
  
          $stmt = $PDO->prepare($sql);
          $stmt->execute();
          $info = $stmt->fetchAll();
      ?>
        <div class="col-md-8">
          <h2>Listagem Fornecedores</h2>
        </div>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Fornecedor</th>
                  <th>Endereço</th>
                  <th>Cidade</th>
                  <th>Telefone</th>
                  <th>E-mail</th>
                  <th>Produto</th>
                  <th>Descrição</th>
                </tr>
              </thead>
              <?php foreach($info as $row): ?>                     
                           
              <tbody>
                <tr>
                  <td><?=$row["cod_fornecedor"]?></td>
                  <td><?=$row["razao_social_fornecedor"]?></td>
                  <td><?=$row["endereco_fornecedor"]?></td>
                  <td><?=$row["cidade_fornecedor"]?></td>
                  <td><?=$row["telefone_fornecedor"]?></td>
                  <td><?=$row["email_fornecedor"]?></td>
                  <td><?=$row["nome_ingrediente"]?></td>
                  <td><?=$row["descricao_ingrediente"]?></td>
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
