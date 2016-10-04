<?php include_once("assets/header.php");?>
<!--INICIO FORMULARIO DE CADASTRO DE CLIENTE-->

<?php


				@$nome = $_POST['nome'];
				@$datanasc = $_POST['dataNasc'];
				@$cep = $_POST['cep'];
				@$logradouro = $_POST['logradouro'];
				@$numero = $_POST['numero'];
				@$bairro = $_POST['bairro'];
				@$cidade = $_POST['cidade'];
				@$email = $_POST['email'];
				@$senha = $_POST['senha'];

				
				$dados = array($nome, $datanasc, $cep, $logradouro, $numero, $bairro, $cidade, $email, $senha);
				
				if ($usuarioCliente->CadastrarCliente($dados)) {
					echo' <script>alert("Cadastrado com Sucesso!");location.href="index.php";</script>';
				}


?>
	<div class="container content">
		<div class="panel panel-default">
					<div class="panel-heading">
							<h1>Cadastro do Cliente</h1>
					</div>
					<div class="panel-body">
						<form  class="group-form" id="form1" method="POST"  enctype="multipart/from-data">
							<div class="col-md-4">
								<label>Nome:</label>
								<input type ="text" name="nome" class="form-control" placeholder="  Digite o seu nome aqui" >
							</div>
							<div class="col-md-4">
								<label>Data de nascimento:</label>
								<input type ="date" name="dataNasc" class="form-control" placeholder="  Digite a data de nascimento" >
							</div>
							<div class="col-md-3">
								<label>CEP:</label>
								<input type ="text" name="cep" class="form-control" placeholder="  Digite o seu cep aqui" id="cep" >
							</div>
							<div class="col-md-3">
								<label>Logradouro:</label>
								<input type ="text" name="logradouro" class="form-control" placeholder="  Digite seu logradouro" id="logradouro">
							</div>
							<div class="col-md-3">
								<label>Numero:</label>
								<input type ="number" name="numero" class="form-control" placeholder="  Digite o numero aqui" >
							</div>
							<div class="col-md-3">
								<label>Bairro:</label>
								<input type ="text" name="bairro" class="form-control" placeholder="  Digite seu bairro" id="bairro">
							</div>
							<div class="col-md-2">
								<label>Cidade:</label>
										<select class="form-control" name="cidade" id="cidade">
											<?php
												foreach ($usuarioCliente->ListaEstados() as $dados_estado) {
													echo'
														<option>'.$dados_estado['estado'].'</option>
													';
												}
											?>
										</select>
							</div>
							<div class="col-md-4">
								<label>Email:</label>
								<input class="form-control" name="email" type ="email" placeholder="  exemplo@gmail.com" >
							</div>
							<div class="col-md-4">
								<label>Senha:</label>
								<input class="form-control" name="senha" type ="password" placeholder="***********">
							</div>
							<div class="col-md-4">
								<br>
								<input class="btn btn-success" name="Ca" type ="submit" value="Enviar">
								<input class="btn btn-danger" type="reset" value="Limpar"> 
							</div>
						</form>
					</div>	
					</div>
				</div>
	</div>
<!--FIM FORMULARIO DE CADASTRO DE CLIENTE-->
<?php include_once("assets/footer.php") ?>