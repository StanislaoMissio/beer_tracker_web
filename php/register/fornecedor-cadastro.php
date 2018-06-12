<!doctype html>

<?php require_once('init.php');?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favicon.png">

    <title>GND | Systems</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../dist/css/dashboard.css" rel="stylesheet">
    <!-- font icon -->
    <link href="../dist/css/elegant-icons-style.css" rel="stylesheet">
    <link href="../dist/css/font-awesome.min.css" rel="stylesheet">
    
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Cervejaria Karavelle</a>
      
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sair</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="index.php">
                
                  Home 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="receitas-ca.php">
                  <span class="fa fa-beer"></span>
                  Receitas
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  Ingredientes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="fornecedor.php">
                  <span data-feather="users"></span>
                  Fornecedores
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Pedidos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Lotes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Relatórios
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Administração de acessos
                </a>
              </li>            
            </ul>
          </div>
      </div>
    </div>    
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
           
          </div>         

          <h2>Fornecedores</h2>

            <!-- Conteúdo do painel -->
            <form action="cadastro-fornecedor-function.php" method="POST">
                    <div class="panel-body">

                      <!--Consulta MySQL para popular dropdown-->
                      <?php  
                              $PDO = db_connect(); 

                              $sql = "SELECT * FROM ingrediente";
                      
                              $stmt = $PDO->prepare($sql);
                              $stmt->execute();
                              $info = $stmt->fetchAll();
                            ?>     

                        <div class="form-group col-md-10">
                          <label>Ingrediente</label>
                          <select class="form-control" name="ingred">
                            <!-- Lista ingrediente cadastrados - Banco -->
                            <?php foreach($info as $ingred): ?>
                            <option value="<?=$ingred["cod_ingrediente"]?>"><?=$ingred["nome_ingrediente"]?></option>
                            <?php endforeach; ?>
                            <!-- Lista ingrediente cadastrados - Banco -->
                          </select>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">Razão Social</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="razao_social">
                            </div>
                        </div>
                        <!--Campo CNPJ-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">CNPJ</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="cnpj">                                            
                            </div>                                        
                        </div>
                        <!--Campo CNPJ-->   
                    
                        <div class="form-group">
                            <label class="col-sm-2 control-label">CEP</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="cep">                                            
                            </div>                                        
                        </div>  

                        <!--Campo endereço-->      
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Endereço</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="endereco">                                            
                            </div>                                        
                        </div>

                        <!--Campo cidade-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Cidade</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="cidade">                                            
                            </div>                                        
                        </div>

                        <!--Campo Estado-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Estado</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="estado">                                            
                            </div>                                        
                        </div>

                        <!--Campo Pais-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">País</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="pais">                                            
                            </div>                                        
                        </div>
                        
                        <!--Campo Telefone-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Telefone</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="telefone">                                            
                            </div>                                        
                        </div>

                        <!--Campo E-mail-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">E-mail</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="email">                                            
                            </div>                                        
                        </div>

                        

                    </div>                          
                                               
                    </div>                    
                </div>                             
                <!--Botões-->
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="submit">Salvar Fornecedor</button> <button class="btn btn-default" type="button">Cancelar</button>
                    </div>
                </div> 
                <!--Fim botões-->            
            </form>            
          </div>
        </main>
      </div>
  </body>
</html>