<!DOCTYPE html>
<?php
	
	session_start();

	include_once('config.php');
	require_once("classes/bd_classe.php");
	require("classes/produto_classes.php");
	require("classes/login_classe.php");
	require ("classes/usuario_classe.php");
	BD::Conectar();
	$produto = new Produto();
	$login = new Login();
	$usuarioCliente = new Usuario();
	$usuarioEmpresa = new Usuario();

	

?>
<html> 
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle/3.0.3/jquery.cycle.all.min.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo PATH;?>css/estilo.css">
		<link rel="stylesheet" type="text/css" href="<?php echo PATH;?>css/lipeing.css">
		<script type="text/javascript" src="../js/habilita_btn.js"></script>
		<script type="text/javascript" src="js/consulta_cep.js"></script>
		<script type="text/javascript" src="js/janela.js"></script>
		<script type="text/javascript" src="js/loader.js"></script>
		<title>TCC</title>
	</head>
<!--INICIO CABEÇALHO-->
	<div class="container">
		<div class="page-header">
			<div class="col-md-3">
				<p><img src="<?php echo PATH;?>css/logo.png" width="200"></p>
			</div>
			<div class="col-md-6 margintop">
			&nbsp&nbsp
				<form method="get" action="pesquisa.php">
					 <div class="input-group">
						 	<input type="text" name="s" class="form-control">
						 	<div class="input-group-btn">
						 		<input type="submit"  value="Pesquisar" class="btn btn-default">
						 	</div> 
					 </div>
				</form>
			</div>
		</div>
	</div>
<!--FIM CABEÇALHO-->

<!--INICIO MENU-->
	<nav class="navbar navbar-default menu">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu_resp"></button>
				<span class="icon-bar"></span>
			</div>
			<div class="collapse navbar-collapse" id="menu_resp">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo PATH?>Home">Home</a><span ></span></li>
					<li><a href="<?php echo PATH?>Produtos">Produtos</a></li>
					<li><a href="<?php echo PATH?>Contatos">Contatos</a></li>				
				</ul>
			</div>
		</div>
	</nav>