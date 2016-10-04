<?php include_once("assets/header_admin.php");?>
<!--INICIO CONTEUDO-->
<?php
		
		
		@$loginCliente = $_SESSION['nome'];
		@$imagem = $_FILES['foto'];

				@$nome = $_POST['nome'];
				@$datanasc = $_POST['dataNasc'];
				@$cep = $_POST['cep'];
				@$logradouro = $_POST['logradouro'];
				@$numero = $_POST['numero'];
				@$bairro = $_POST['bairro'];
				@$cidade = $_POST['cidade'];
				
				@$senha = $_POST['senha'];

				

				@$opcao = $parametro[2];

				switch ($opcao) {
					case 'Sair':
						$login->Sair();
							header('Location:'.PATH.'Home');
						break;
					
					default:
						# code...
						break;
				}

?>
	<div class="container content">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php echo"$loginCliente";?>
				</div>
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data">
								<?php
									if($usuarioCliente->Upload($imagem,$loginCliente)){

									}
									
										
								?>
						<input type="file" name="foto">	
				</div>
				<div class="panel-footer">
					<input class="btn btn-success"type="submit" value="Enviar">	
					<a href="<?php echo PATH;?>Dashboard/Cliente/Sair"" class="btn btn-danger">Sair</a>
				</div>
				</form>
			</div>
			<div class="col-md-6">
					<ul class="nav nav-side panel panel-default">
						<li class="panel-heading"><a href="#">Empresas</a></li>
						<li class="panel-heading"><a href="#">Meus Dados</a></li>
						<li class="panel-heading"><a href="#">Lista de Compras</a></li>
					</ul>
			</div>
		</div>
	
		<div class="col-md-6">
		
				
		</div>
		
	</div>
<!--FIM CONTEUDO-->