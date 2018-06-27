<!doctype html>

<?php require_once('../utils/init.php');?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastrar novo Fornecedor</title>

    <link href="/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/dist/css/form-validation.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  </head>

  <body class="bg-secondary">
  <?php  
    $PDO = db_connect(); 

    $sql = "SELECT * FROM ingrediente";

    $stmt = $PDO->prepare($sql);
    $stmt->execute();
    $info = $stmt->fetchAll();
  ?>
  <div class="container">
    <div class="py-5 text-center">
      <h2 class="text-light">Fornecedores</h2>
    </div>
      <div class="card">
        <div class="card-body">
          <form class="needs-validation" novalidate action="cadastro-fornecedor-function.php" method="POST">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Ingrediente</label>
                <select class="form-control" name="ingred">
                  <?php foreach($info as $ingred): ?>
                  <option value="<?=$ingred["cod_ingrediente"]?>"><?=$ingred["nome_ingrediente"]?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label>Razão Social</label>
                <input type="text" class="form-control" name="razao_social" placeholder="Razão social" value="" required>
                <div class="invalid-feedback">
                  Insira a Razão Social.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label>CNPJ</label>
                <input type="text" class="form-control" name="cnpj" placeholder="CNPJ" value="" required>
                <div class="invalid-feedback">
                  Insira CNPJ.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label>CEP</label>
                <input class="form-control" type="text" name="cep"  placeholder="Razão social" value="" required>  
                <div class="invalid-feedback">
                  Insira o CEP.
                </div>                                          
              </div>  
              <div class="col-md-6 mb-3">
                <label>Endereço</label>
                <input class="form-control" type="text" name="endereco">                                            
                <div class="col-sm-10">
                </div>                                        
              </div>
              <div class="col-md-6 mb-3">
                <label>Cidade</label>
                <input class="form-control" type="text" name="cidade">                                            
                <div class="col-sm-10">
                </div>                                        
              </div>
              <div class="col-md-6 mb-3">
                <label>Estado</label>
                <input class="form-control" type="text" name="estado">                                            
                <div class="col-sm-10">
                </div>                                        
              </div>
              <div class="col-md-6 mb-3">
                <label>Pais</label>
                <input class="form-control" type="text" name="pais">                                            
                <div class="col-sm-10">
                </div>                                        
              </div>
              <div class="col-md-6 mb-3">
                <label>Telefone</label>
                <input class="form-control" type="text" name="telefone">                                            
                <div class="col-sm-10">
                </div>                                        
              </div>
              <div class="col-md-6 mb-3">
                <label>E-mail</label>
                <input class="form-control" type="text" name="email">                                            
                <div class="col-sm-10">
                </div>                                        
              </div>                    
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Salvar Fornecedor</button> 
            </form>            
          </div>
        </main>
      </div>
      </div>
      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1 text-light">&copy; 2017-2018 GND Systems</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a class="text-light" href="#">Privacy</a></li>
          <li class="list-inline-item"><a class="text-light" href="#">Terms</a></li>
          <li class="list-inline-item"><a class="text-light" href="#">Support</a></li>
        </ul>
      </footer>
  </body>
</html>