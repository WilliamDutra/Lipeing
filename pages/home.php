<?php include_once("assets/header.php") ?>
<!--INICIO CONTEUDO-->
	<div class="container content">
			<div class="col-md-12">
				<div class="slider">
						<ul>
							<?php foreach ($produto->ListaProdutoBanner() as $dados) {?>
							<li>
								<a href="#">
										<img src="Admin/imagem/<?php echo $dados['nome_produto'];?>">
								</a>
							</li>
							<?php }?>
						</ul>
				</div>
			</div>
					<h3 class="text-left">Produtos Relacionados:</h3>
				<?php
					
					$pag = isset($_GET['p'])?$_GET['p']:1;

					
					$produto->ListaProduto($pag); 
							
						

					?>	

				</div>
			</div>
	</div>
<!--FIM CONTEUDO-->
<?php include_once("assets/footer.php") ?>