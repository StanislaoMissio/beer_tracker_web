<!DOCTYPE html>
<html lang="en">
<?php require_once('init.php');?>
  <body>
    <main role="main">
      <h2>Todos os Pedidos</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Cliente</th>
              <th>Data Entrega</th>
              <th>Data Pedido</th>
              <th>Valor</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $PDO = db_connect();
            $pedidos = $PDO->query('SELECT p.cod_pedido, p.data_pedido, p.data_entrega, c.razao_social, p.valor_pedido From pedido p
                                    INNER JOIN cliente c on c.cod_cliente = p.cod_cliente');
            if (is_array($pedidos) || is_object($pedidos))
              {
                foreach($pedidos as $pedido) {
                  echo ('	<tr>
                        <td class="align-middle">'. $pedido["cod_pedido"] .'</td>
                        <td class="align-middle">'. $pedido["razao_social"] .'</td>
                        <td class="align-middle">'. $pedido["data_entrega"] .'</td>
                        <td class="align-middle">'. $pedido["data_pedido"] .'</td>
                        <td class="align-middle">'. $pedido["valor_pedido"] .'</td>
                        <td class="align-middle"> 
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModalPedido" 
                          data-cod="'.$pedido["cod_pedido"].'" 
                          data-nome="'.$pedido["razao_social"].'">           
                            <span class="fa fa-pencil-square-o" aria-hidden="true"></span>
                          </button>
                        </td>
                        <td class="align-middle"> 
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteModalPedido" 
                          data-cod="'.$pedido["cod_pedido"].'" 
                          data-nome="'.$pedido["razao_social"].'">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                          </button>
                        </td>                            
                      </tr>');
                }
              }
          ?>
          </tbody>
        </table>
      </div>
                
        <button type="button" class="btn" onclick="location.href='pedidos-cadastro.php'">
        Novo Pedido
      </button>
    </main>

    <div class="modal fade" id="editModalPedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
            <input type="hidden" id="pedidoCod">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nome</label>
                <input type="text" class="form-control" id="pedidoNome">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Descrição</label>
                <input type="text" class="form-control" id="">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary" onclick="editPedido()">Atualizar</button>
          </div>
        </div>
      </div>
    </div>

		<div class="modal" id="deleteModalPedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
          <input type="hidden" id="pedidoDeleteCod">					
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-primary"   onclick="deletePedido()">Deletar</button>
					</div>
				</div>
			</div>
		</div>
    <script src="/dist/js/pedidos.js"></script>
  </body>
</html>
