<?php include_once("assets/header.php");?>
<!--INICIO CONTEUDO-->
	<div class="container content">
		<div class="col-md-12">
				<?php
					
					@$termo = $_GET['s'];
					$produto->PesquisarProduto($termo);
					
					

					
				?>
		</div>
	</div>
<!--FIM CONTEUDO-->
<?php include_once("assets/footer.php");?>