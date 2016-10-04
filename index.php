<?php

	

	$url = $_GET['url'];
	$parametro = explode("/", $url);
	$permissao = array('Home', 'CadastroEmpresa', 'CadastroCliente', 'Login', 'Produto');

	if ($url == '') {
		include 'pages/Home.php';
	}elseif($url == $parametro[0]){
		include 'pages/'.$parametro[0].'.php';
	}elseif ($parametro[0] == "Dashboard") {
		include_once('Admin/'.$parametro[1].'.php');
	}

?>
			


<!--INICIO JANELA MODAL LOGAR-->
	<div class="modal fade" id="janela-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<?php

					@$opcao = $_POST['opcao'];
					@$email = $_POST['email'];
					@$senha = $_POST['senha'];

					switch ($opcao) {
						case 'Empresa':
								if ($login->LogarUsuario($email, $senha)) {
									echo '<script>sweetAlert("Login efetuado com Sucesso");location.href="Dashboard/Empresa";</script>';
								}else{

								}
							case 'Cliente':
								if ($login->LogarUsuario($email, $senha)) {
									echo '<script>alert("Login efetuado com Sucesso");location.href="Dashboard/Cliente";</script>';
								}
								break;
							break;
						
						default:
							/*if ($login->ValidaCliente($email, $senha)) {
								echo '<script>alert("Login efetuado com Sucesso");location.href="Admin/painel_cliente.php";</script>';
							}*/
							break;
						}
				?>
				<div class="modal-header">
					<h2>Logar-se</h2>
				</div>
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data">
						<div class="group-form">
							<label>Email:</label>
							<input class="form-control" type="text" name="email">
							<label>Senha</label><br>
							<input class="form-control" type="password" name="senha"><br>
								<div class="col-md-6">
									<label>Empresa</label>
								<input class="form-control" type="radio" value="Empresa" name="opcao" checked>	
								</div>
								<div class="col-md-6">
									<label>Cliente</label>
								<input class="form-control" type="radio" value="Cliente" name="opcao">
								</div>
								<input type="submit" class="btn btn-primary">
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Fechar">
					</form>
					</div>
			</div>
		</div>
	</div>
<!--FIM JANELA MODAL LOGAR-->


<!--INICIO JANELA MODAL CADASTAR-->
	<div class="modal fade" id="janela-modal-cadastar" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Cadastrar-se como:</h2>
				</div>
				<div class="modal-body">
					<div class="col-md-6">
						<a href="cadastro_empresa.php" class="btn btn-primary">Cadastar Como Empresa</a>
					</div>
					<div class="col-md-6">
						<a href="cadastro_cliente.php" class="btn btn-primary">Cadastar Como Cliente</a>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Fechar">
				</div>
			</div>
		</div>
	</div>
<!--FIM JANELA MODAL CADASTAR-->

