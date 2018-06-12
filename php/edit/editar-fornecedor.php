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
          <a class="nav-link" href=login.php>Sair</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span class="icon_house_alt"></span>
                  Home <span class="sr-only"></span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
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
                <a class="nav-link" href="#">
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

        <?php 
        
        $sql ="SELECT * FROM fornecedor WHERE cod_fornecedor=cod_fornecedor";

        //Seleciona os registros

        $PDO = db_connect();

        $resultado = $PDO->prepare($sql);
        $resultado->execute();
        $row_info = $resultado->fetch(PDO::FETCH_ASSOC); 
                
        ?>

          <h2>Editar Fornecedores</h2>

            <!-- Conteúdo do painel -->
            <form action="editar-fornecedor-function.php" method="POST">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Razão Social</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="razao_social"
                                value="<?=$row_info['razao_social_fornecedor']?>">
                            </div>
                        </div>
                        <!--Campo CNPJ-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">CNPJ</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="cnpj"
                                value="<?php if(isset($row_info['cnpj_fornecedor'])){ echo $row_info['cnpj_fornecedor']; } ?>">                                            
                            </div>                                        
                        </div>
                        <!--Campo CNPJ-->   
                    
                        <div class="form-group">
                            <label class="col-sm-2 control-label">CEP</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="cep"
                                value="<?php if(isset($row_info['cep_fornecedor'])){ echo $row_info['cep_fornecedor']; } ?>">                                            
                            </div>                                        
                        </div>  

                        <!--Campo endereço-->      
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Endereço</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="endereco"
                                value="<?=$row_info['endereco_fornecedor']?>">                                            
                            </div>                                        
                        </div>

                        <!--Campo cidade-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Cidade</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="cidade"
                                value="<?php if(isset($row_info['cidade_fornecedor'])){ echo $row_info['cidade_fornecedor']; } ?>">                                            
                            </div>                                        
                        </div>

                        <!--Campo Estado-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Estado</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="estado"
                                value="<?=$row_info['estado_fornecedor']?>">                                            
                            </div>                                        
                        </div>

                        <!--Campo Pais-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">País</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="pais"
                                value="<?=$row_info['pais_fornecedor']?>">                                            
                            </div>                                        
                        </div>
                        
                        <!--Campo Telefone-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Telefone</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="telefone"
                                value="<?=$row_info['telefone_fornecedor']?>">                                            
                            </div>                                        
                        </div>

                        <!--Campo E-mail-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">E-mail</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="email"
                                value="<?=$row_info['email_fornecedor']?>">                                            
                            </div>                                        
                        </div>
                    </div>                          
                                               
                    </div>                    
                </div>                             
                <!--Botões-->
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="edit">Salvar Alterações</button> <button class="btn btn-default" type="button">Cancelar</button>
                    </div>
                </div> 
                <!--Fim botões-->            
            </form>            
          </div>
        </main>
      </div>
  </body>
</html>