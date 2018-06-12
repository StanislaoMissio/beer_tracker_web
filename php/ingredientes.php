<!DOCTYPE html>
<html lang="en">
<?php require_once('init.php');?>
  <body>
    <main role="main">
      <h2>Todos os Ingredientes</h2>
      <div class="table-responsive" id="table">
        <table class="table table-striped table-sm" id="">
          <thead>
            <tr>
              <th>#</th>
              <th>Nome do Ingrediente</th>
              <th>Descrição</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $PDO = db_connect();
            $ingredientes = $PDO->query('SELECT cod_ingrediente, nome_ingrediente, descricao_ingrediente From ingrediente');
            if (is_array($ingredientes) || is_object($ingredientes))
              {
                foreach($ingredientes as $ingrediente) {
                  echo ('	<tr>
                        <td class="align-middle">'. $ingrediente["cod_ingrediente"] .'</td>
                        <td class="align-middle">'. $ingrediente["nome_ingrediente"] .'</td>
                        <td class="align-middle">'. $ingrediente["descricao_ingrediente"] .'</td>
                        <td class="align-middle"> 
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" 
													data-cod="'.$ingrediente["cod_ingrediente"].'" 
													data-nome="'.$ingrediente["nome_ingrediente"].'">
														<span class="fa fa-pencil-square-o" aria-hidden="true"></span>
                        	</button>
                        </td>
                        <td class="align-middle"> 
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal" 
													data-cod="'.$ingrediente["cod_ingrediente"].'" 
													data-nome="'.$ingrediente["nome_ingrediente"].'">
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
                
        <button type="button" class="btn" onclick="location.href='ingrediente-cadastro.php'">
        Novo Ingrediente
      </button>
    </main>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <input type="hidden" id="ingredienteCod">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nome</label>
                <input type="text" class="form-control" id="ingredienteNome">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Descrição</label>
                <input type="text" class="form-control" id="ingredienteDescricao">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary" onclick="editIngrediente()">Atualizar</button>
          </div>
        </div>
      </div>
    </div>

		<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
						<input type="hidden" id="ingredienteDeleteCod">					
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-primary"   onclick="deleteIngrediente()">Deletar</button>
					</div>
				</div>
			</div>
		</div>

    <script src="/dist/js/ingredientes.js"></script>
  </body>
</html>
