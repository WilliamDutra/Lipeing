<!DOCTYPE html>
<?php

	session_start();
	$nomeEmp = $_SESSION['nome'];


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
		<script type="text/javascript" src="<?php echo PATH;?>js/bootstrap.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle/3.0.3/jquery.cycle.all.min.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo PATH;?>css/estilo.css">
		<link rel="stylesheet" type="text/css" href="<?php echo PATH;?>css/lipeing.css">
		<title>Lipeing</title>
	</head>
<body>
	<div class="container">
		<div class="page-header">
			<div class="col-md-8">
				<p><img src="<?php echo PATH;?>css/logo.png" width="200"></p>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<p>Bem-Vindo<?php echo" $nomeEmp";?></p>
					</div>
					<div class="panel-body">
						<a href="<?php echo PATH;?>Dashboard/Empresa/Sair" class="btn btn-danger">Sair</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-default menu">
		<div class="container-fluid">
			<div class="navbar-header">
				<input type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu_resp">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</div>
			<div class="collapse navbar-collapse" id="menu_resp">
				<ul class="nav navbar-nav">
					<li><a href="#">Home</a><span ></span></li>
					<li><a href="#">Produtos</a></li>
					<li><a href="#">Contatos</a></li>
					<li><a href="#"><button type="button" data-target="#janela-adiciona-categoria" data-toggle="modal" class="btn btn-info">Adiciona Categoria</button></a></li>
				</ul>
			</div>
		</div>
	</nav>