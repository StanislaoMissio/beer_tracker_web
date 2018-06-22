<!doctype html>
<html lang="en">
<?php require_once('../utils/init.php');?>
  <body>
    <main role="main">
      <h2>Administração de acessos</h2></br>
      <div class="table-responsive" id="table">
        <table class="table table-striped table-sm" id="">
          <thead>
            <tr>
              <th>#</th>
              <th>Nome do Usuário</th>
              <th>Login</th>
              <th>Email</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <?php  
          $PDO = db_connect(); 
          $view_users_query="select * from usuario"; //Seleciona a query com todos os usuarios.  
          $run=$PDO->query($view_users_query);
          if (is_array($run) || is_object($run))
			{
				foreach($run as $usuario) {
                echo ('	<tr id="tr-click">
                <td class="align-middle" id="codUsuario">'. $usuario["cod_usuario"] .'</td>
                <td class="align-middle">'. $usuario["nome_usuario"] .'</td>
                <td class="align-middle">'. $usuario["login_usuario"] .'</td>
                <td class="align-middle">'. $usuario["email_usuario"] .'</td>
                <td class="align-middle">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal"
                        data-cod="'.$usuario["cod_usuario"].'" 
                        data-nome="'.$usuario["nome_usuario"].'">
                        <span class="fa fa-pencil-square-o" aria-hidden="true"></span>
                    </button>
                </td>
                <td class="align-middle">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal"
                        data-cod="'.$usuario["cod_usuario"].'" 
                        data-nome="'.$usuario["nome_usuario"].'">
                        <span class="fa fa-trash" aria-hidden="true"></span>
					</button>
                </td>
                ');
                }
            }
          ?>
          </tbody>
        </table>
      </div>
                
        <button type="button" class="btn" onclick="location.href='../register/login_registrar.php'">
        Novo Usuário
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
            <input type="hidden" id="usuarioCod">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nome</label>
                <input type="text" class="form-control" id="usuarioNome">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Login</label>
                <input type="text" class="form-control" id="usuarioLogin">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Email</label>
                <input type="text" class="form-control" id="usuarioEmail">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary" onclick="editUsuario()">Atualizar</button>
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
					<div class="modal-body">
						<input type="text" id="usuarioDeleteCod">					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-primary"   onclick="deleteUsuario()">Deletar</button>
					</div>
				</div>
			</div>
		</div>

    <script src="/dist/js/acessos.js"></script>
  </body>
</html>