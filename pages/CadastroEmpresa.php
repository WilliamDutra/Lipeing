<?php include("assets/header.php");?>
<!--INICIO FORMULARIO DE CADASTRO DE EMPRESA-->
<?php

			@$nome_fantasia = $_POST['nome_fantasia'];
			@$razao_social = $_POST['razao_social'];
			@$cep = $_POST['cep'];
			@$logradouro = $_POST['logradouro'];
			@$numero = $_POST['numero'];
			@$bairro = $_POST['bairro'];
			@$cidade = $_POST['cidade'];
			@$uf = $_POST['uf'];
			@$email = $_POST['email']; 
			@$ramo = $_POST['ramo'];
			@$senha = $_POST['senha'];

			$dadosEmpresa = array($nome_fantasia, $razao_social, $cep, $logradouro, $numero, $bairro, $cidade, $uf ,$email, $ramo ,$senha);

			if ($usuarioEmpresa->CadastrarEmpresa($dadosEmpresa)) {
						
					unset($dadosEmpresa);
			}else{
						
			}

?>
	<div class="container content">
		<div class="panel panel-default">
					<div class="panel-heading">
							<h1>Cadastro da Empresa</h1>
							</div>
							<div class="panel-body">
								<form class="group-form"  method="POST" id="form1"  enctype="multipart/from-data">	
							<div class="col-md-6">
								<label>Nome Fantasia:</label>
								<input type ="text" name ="nome_fantasia" class="form-control" placeholder="  Digite o seu nome aqui" >
							</div>
							<div class="col-md-6">
								<label>Razão Social:</label>
								<input type ="text" name ="razao_social" class="form-control" placeholder="  Digite a data de nascimento" >
							</div>
							<div class="col-md-3">
								<label>CEP:</label>
								<input type ="text" name ="cep" class="form-control" placeholder="  Digite o seu cep aqui" id="cep">
							</div>
							<div class="col-md-3">
								<label>Logradouro:</label>
								<input type ="text" name ="logradouro" class="form-control" placeholder="  Digite seu logradouro" id="logradouro">
							</div>
							<div class="col-md-3">
								<label>Bairro:</label>
								<input type ="text" name ="bairro" class="form-control" placeholder="  Digite seu bairro" id="bairro">
							</div>
							<div class="col-md-3">
								<label>Número:</label>
								<input type ="number" name ="numero" class="form-control" placeholder="  Digite o numero aqui" >
							</div>
							<div class="col-md-4">
								<label>UF:</label>
									<select class="form-control" name ="uf">
										<?php
											foreach ($usuarioEmpresa->ListaEstados() as $dados_estado) {
												echo '
												<option value="'.$dados_estado['uf'].'">'.$dados_estado['uf'].'</option>
												';
											}
										?>
								</select>
							</div>
							<div class="col-md-4">
								<label>Cidade:</label>
									<select class="form-control" name ="cidade">
										<?php 
											foreach ($usuarioEmpresa->ListaEstados() as $dados_estado) {
												echo '<option value="'.$dados_estado['estado'].'">'.$dados_estado['estado'].'</option >
							 		 
							 				';
											}; 
										?>
									</select>
							</div>
							<div class="col-md-4">
								<label>Ramo da Empresa:</label>
								<select class="form-control" name="ramo">
							 		<option value="Alimenticio"> Alimenticio </option >
							 		<option value="Industrial"> Industrial </option >
							 		<option value="Textil"> Textil </option >
							 		<option value="Eletronico"> Eletronico </option >
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
						</div>		
					</form>
				</div>
			</div>
	</div>
<!--FIM FORMULARIO DE CADASTRO DE EMPRESA-->
<?php include_once("assets/footer.php") ?>