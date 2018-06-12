<!doctype html>
<?php require_once('init.php');?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastrar novo pedido</title>

    <link href="/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/dist/css/form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-secondary">

    <div class="container">
      <div class="py-5 text-center">
        <h2 class="text-light">Cadastro de Pedido</h2>
      </div>

      <div class="card">
        <div class="card-body">
          <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" placeholder="CNPJ" value="" required>
                <div class="invalid-feedback">
                  Insira CNPJ.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Entrega</label>
                <input type="date" class="form-control" id="entrega" placeholder="Data da entrega" value="" required>
                <div class="invalid-feedback">
                  Insira a entrega.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Cliente</label>
              <div class="input-group">
              <select class="form-control" id="cliente">
                  <?php 
                    $PDO = db_connect();
                    $clientes = $PDO->query('SELECT cod_cliente, razao_social From cliente');
                      if (is_array($clientes) || is_object($clientes))
                      {
                        foreach($clientes as $cliente) {
                          echo ('<option value="'.$cliente["cod_cliente"].'">'. $cliente["razao_social"] .'</option>');
                        }
                      }
                  ?>
                  </select>
                <div class="invalid-feedback" style="width: 100%;">
                  Selecione o cliente.
                </div>
              </div>
            </div>
            <h4 class="mb-3">Produtos</h4>

            <div class="table-responsive">
              <table class="table table-striped table-sm" id="tableProdutos">
                <thead>
                  <tr>
                    <th class="w-7 text-center">#</th>
                    <th class="w-25 text-center">Produto</th>
                    <th class="w-25 text-center">Preço Unitario</th>
                    <th class="w-25 text-center">Quantidade</th>
                    <th class="w-25 text-center">Total</th>
                    <th class="w-25 text-center"></th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
                </table>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Adicionar</button>
            <button class="btn btn-primary btn-lg btn-block" type="submit" onclick="cadastrarPedido()">Cadastrar</button>
          </form>
        </div>
      </div>

      <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Adicionar novo Produto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Produtos</label>
                  <select class="form-control" id="selectProduto">
                  <?php 
                    $PDO = db_connect();
                    $produtos = $PDO->query('SELECT cod_produto, nome_produto From produto');
                      if (is_array($produtos) || is_object($produtos))
                      {
                        foreach($produtos as $produto) {
                          echo ('<option value="'.$produto["cod_produto"].'">'. $produto["nome_produto"] .'</option>');
                        }
                      }
                  ?>
                  </select>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-primary" onclick="addProduto()">Adicionar</button>
            </div>
          </div>
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
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="/dist/js/bootstrap.min.js"></script>
    <script src="/dist/js/pedidos-cadastro.js"></script>
    <script src="/dist/js/jquery.tabletojson.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
