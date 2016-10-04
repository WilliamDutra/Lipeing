<?php include_once("assets/header.php") ?>
<!--INICIO CONTEUDO-->
	<div class="container">
	aaaaaaaa
		<?php
							
							$id = $_GET['id'];
							$produto->ListaProdutoItem($id);

							$rep = $_POST['rep'];
									$produto->ReputacaoProduto($rep,$id);
							


					?>	
	</div>
<!--FIM CONTEUDO-->