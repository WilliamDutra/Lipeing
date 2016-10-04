<?php include_once("assets/header_empresa.php");?>
<!--INICIO CONTEUDO-->
<?php

		$email = $_SESSION['nome'];

		if ($login->isLogado()) {
			
		}else{
			header('Location:../Home');
		}

		$opcao = $parametro[2];
		print_r($opcao);
		//var_dump($email);

		switch ($opcao) {
			case 'Deletar':
					$id = $parametro[3];
					$produto->DeletaProduto($id);
					echo '<script>swal("Heres a message!");location.href="../"</script>';
				break;
				case 'Sair':
					$login->Sair();
						header('Location:'.PATH.'Home');
				break;
				case 'Alterar':
					$id = $parametro[3];
					$produto->AlterarProduto($imagem, $descricao, $titulo, $valor);
				break;
			default:
				# code...
				break;
		}


	    $imagem = $_FILES['foto'];
	    @$descricao = $_POST['descricao'];
	    @$titulo = $_POST['titulo'];
	    @$valor = $_POST['valor'];

	    if ($produto->CadastroProduto($imagem, $descricao, $titulo, $valor, $email)) {
	    	unset($_FILES['foto'],$_POST['descricao'],$_POST['titulo'],$_POST['valor']);
	    }

	    $categoria = $_POST['nome_categoria'];
	    if ($produto->AdicionaCategoria($categoria)) {
	    	echo'Categoria Adicionada com Sucesso!';
	    }


?>
	
	<div class="container">
		<div class="col-md-4">
			<div class="panel panel-default">
					<div class="panel-heading">
						<h2>Cadastro de Produtos</h2>
					</div>
				<div class="panel-body">
					<form id="frm_cad_produto" method="post" enctype="multipart/form-data">
					<div class="group-form">
						<label>Insira Uma Imagem:</label><br>
						<input class="form-control" type="file" name="foto"><br>
						<label>Digite um Nome para O Produto:</label><br>
						<input class="form-control" type="text" name="titulo"><br>
						<label>Digite um Preço:</label><br>
						<input class="form-control" type="text" name="valor">
						<label>Insira Uma Descrção do Produto:</label><br>
						<textarea class="form-control" name="descricao"></textarea><br>
						<input type="submit" value="Cadastrar" class="btn btn-success">
					</div>
					</form>
				</div>
			</div>
		</div>
		<?php
			$produto->ListaProdutoEmpresa($email);
		?>
	</div>
<!--FIM CONTEUDO-->

<!--INICIO JANELA MODAL ADICIONA CATEGORIA-->
	<div class="modal fade" id="janela-adiciona-categoria" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Adiciona Categoria:</h2>
				</div>
				<div class="modal-body">
					<div class="col-md-4">
						<form id="frm_adiciona_categoria" method="post" enctype="multipart/form-data">
							<div class="group-form">
								<label>Nome da categoria: </label>
								<input type="text" name="nome_categoria" class="form-control">
								<input type="submit" value="Cadastrar" class="btn btn-success">
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Fechar">
				</div>
			</div>
		</div>
	</div>
<!--FIM JANELA MODAL ADICIONA CATEGORIA-->



<!--INICIO JANELA MODAL ALTERAR PRODUTO-->
	<div class="modal fade" id="janela-modal-alterar-produto" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Alterar Produto:</h2>
				</div>
				<div class="modal-body">
					<div class="col-md-4">
						<form id="frm_cad_produto" method="post" enctype="multipart/form-data">
							<div class="group-form">
								<label>Insira Uma Imagem:</label><br>
								<input class="form-control" type="file" name="foto"><br>
								<label>Digite um Nome para O Produto:</label><br>
								<input class="form-control" type="text" name="titulo"><br>
								<label>Digite um Preço:</label><br>
								<input class="form-control" type="text" name="valor">
								<label>Insira Uma Descrção do Produto:</label><br>
								<textarea class="form-control" name="descricao"></textarea><br>
								<input type="submit" value="Cadastrar" class="btn btn-success">
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Fechar">
				</div>
			</div>
		</div>
	</div>
<!--FIM JANELA MODAL ALTERAR PRODUTO-->


