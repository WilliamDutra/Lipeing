<!DOCTYPE html>
<?php
		require_once('classes/bd_classe.php');
		require('classes/login_classe.php');
		BD::Conectar();

		$login = new Login();
		
		$opcao = $_POST['opcao'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];

		switch ($opcao) {
			case 'Empresa':
				if($login->isLogado($email, $senha)){
					echo '<script>alert("Login efetuado com Sucesso");location.href="Admin/painel_empresa.php";</script>';
				}else{

				}
				break;
			case 'Cliente':
				if ($login->ValidaCliente($email, $senha)) {
					echo '<script>alert("Login efetuado com Sucesso");location.href="Admin/painel_cliente.php";</script>';
				}else{

				}
				break;
			default:
				if ($login->ValidaCliente($email, $senha)) {
					echo '<script>alert("Login efetuado com Sucesso");location.href="Admin/painel_cliente.php";</script>';
				}else{
					
				}
				break;
		}

		
?>
<html> 
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=600, user-scalable=no">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script type="text/javascript" src="js/menu.js"></script>
		<link type="text/css" rel="stylesheet" href="css/estilo.css"/>
		<title>TCC</title>
	</head>
	<body>				
        <header>
			<img id="logo" src="img/logo.png">
            <section class="a">  
				<form>
					<input placeholder="  Pesquise aqui o produto ou empresa!" id="buscaCaixa" type="search" />
					<button id="btnBuscar" type="search">BUSCAR<img id="lupa" src="img/lupa.png" alt="enviar"></button>
				</form>
			</section>
			
			<section class="logCad">     
				<form>
					<button id="logar" type="button">
						LOGAR
						<img id="imgLogin" src="img/login.png" alt="Login">
					</button>	
				</form>
				<form>					
					<button id="cadastrar" type="button">
						CADASTAR
					<img id="imgCad" src="img/cadastrar.png" alt="cadastro">
					</button>
				</form>
			</section>	
        </header>
			<nav >	
				<ul class="menu">
                    <div class="btn-icon"><a href="#">☰</a></div></li>
                    <li ><a href="#" class="a">Home</a></li>
					<li><a href="#"><!--<img src="img/seta-branca.png" 	class="imgHome0" alt="Login">-->Produtos</a></li>
					<li><a href="#"><!--<img src="img/seta-branca.png" 	class="imgHome0" alt="Login">-->Empresas</a></li>
					<li><a href="#"><!--<img src="img/seta-branca.png" 	class="imgHome0" alt="Login">-->Ofertas</a></li>
					<li><a href="#"><!--<img src="img/seta-branca.png" 	class="imgHome0" alt="Login">-->Parceiros</a></li>
					<li><a href="#"><!--<img src="img/seta-branca.png" 	class="imgHome0" alt="Login">-->História</a></li>
					<li><a href="#"><!--<img src="img/seta-branca.png"	class="imgHome0" alt="Login">-->Contato </a></li>
				</ul>

			</nav>
	<!--	<div id="responca">
        		
        	<nav id="destPosit">
				<ul id="destaques">
					<li class="liDest"><a href="#">-Lorem Ipsum 1 Lorem [...] </a> </li> 
					<li class="liDest"><a href="#">-Lorem Ipsum 2 Lorem [...] </a></li> 
					<li class="liDest"><a href="#">-Lorem Ipsum 3 Lorem [...] </a></li>
					<li class="liDest"><a href="#">-Lorem Ipsum 4 Lorem [...] </a></li> 
					<li class="liDest"><a href="#">-Lorem Ipsum 5 Lorem [...] </a></li> 
				</ul>
            
			</nav>
			<!--acaba destques-->	
			
			
		
		<section class="miolo">		
					

			<form id="form2" method="POST"  enctype="multipart/from-data">	
					<legend id="legend2"> Login: </legend > <br>
					<label for="login_id">E-mail:</label> <br>
					<input type ="text" name ="email" id ="login_id" placeholder="  Digite o seu e-mail aqui:" required>
					<br>
					<label for="senha_id">Senha:</label> <br>
					<input type ="password" name ="senha" id ="senha_id" placeholder="  Digite sua senha aqui:" required>
					<br>
					<label>Empresa</label>
					<input type="radio" value="Empresa" name="opcao" checked>
					<label>Cliente</label>
					<input type="radio" value="Cliente" name="opcao">
					<br>
					<input id="btnLogar_id" type ="submit" name="Logar" value="Logar">
					<input id="btnReset1_id" type="reset" value="Limpar">  <br>
			</form>
				
		<section>

			
		<footer>
<!--Criado por Felipe Sena - 21/03/2016 11:52 E Editado Por Allan lapa 22/03/2016 00:00-->
		<div id="menuFooter">
			<div id="boxFooter">
					Sobre o Lipeing!<br>
				<p class="subBox">
					<a href="#" class="footerLink">Sobre o Lipeing!</a><br>
					<a href="#" class="footerLink">Entre para a equipe!</a><br>
					<a href="#" class="footerLink">Visões da empresa</a>
				</p>	
			</div>

			<div id="boxFooter">
					Seja um parceiro!
				<p class="subBox">
					<a href="#" class="footerLink">Faça seu anúncio</a><br>
					<a href="#" class="footerLink">Planos promocionais</a><br>
					<a href="#" class="footerLink">Parceiros</a>
				</p>	
			</div>

			<div id="boxFooter">
					Atendimento
				<p class="subBox">
					<a href="#" class="footerLink">Central de atendimento</a><br>
					<a href="#" class="footerLink">FAQ</a>
			</div>
		



			<img class="socialF" href="www.facebook.com" src="img/facebook.png">
			<img class="socialH" href="www.twitter.com" src="img/twitter.png">
			<img class="socialH" href="www.google.com" src="img/google.png">
<!--Fim edição Felipe-->
		</footer>

       <script>
function myFunction() {
    document.getElementsByClassName("menu")[0].classList.toggle("responsive");
}
</script>

	</body>
</html>