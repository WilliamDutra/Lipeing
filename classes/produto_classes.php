<?php

/**
* 
*/
class Produto extends BD{
	
	

	function __construct()
	{
		# code...
	}

	public function CadastroProduto($imagem, $descricao, $titulo, $valor, $login){
		//Definições da Imagem
		$nome = $imagem['name'];
		$tmp = $imagem['tmp_name'];
		$size = $imagem['size'];
		$formato = end(explode('.', $nome));

		//Formatos aceitos
		$pasta = 'Admin/imagem';
		$extensoes = array('jpg', 'jpeg', 'png', 'gif');
		$tamanho = 1048576;

	
				//Envaindo para a Pasta IMAGEM
				$nome = 'img'.uniqid().'.'.$formato;
				$upload = move_uploaded_file($tmp, $pasta.'/'.$nome);
				if ($upload) {
					$InserirImagem = self::Conectar()->prepare("INSERT INTO `t_imagem`(`cod_imagem`, `nome_produto`, `descricao_produto`, `titulo_produto`, `valor_porduto`, `EMAIL_EMPRESA`) VALUES (?,?,?,?,?,?)");
					$InserirImagem->execute(array(NULL, $nome,  $descricao, $titulo, $valor ,$login));
				}


		
	}


	public function ListaProdutoEmpresa($login){
		$consultaProduto = "SELECT * FROM  `t_imagem` WHERE  `EMAIL_EMPRESA` = ?";
		$consultaProduto = self::Conectar()->prepare($consultaProduto);
		$consultaProduto->execute(array($login));
		if ($consultaProduto->execute(array($login))) {

			foreach ($consultaProduto as $dados_produto) {
				//print_r($dados_produto['nome_produto']);
				echo '
					
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-heading">
									'.$dados_produto['titulo_produto'].'</p>
								</div>
								<div class="panel-body">
									<img class="img-responsive img-thumbnail" src="'.PATH.'/Admin/imagem/'.$dados_produto['nome_produto'].'"> 
									<hr>
									'.wordwrap($dados_produto['descricao_produto'],150,"<br /> \n").'
								</div>
								<div class="panel-footer">
									<span>R$:'.number_format($dados_produto['valor_porduto'], 2,',','').'</p>
										<a href="'.PATH.'Dashboard/Empresa/Deletar/'.$dados_produto['cod_imagem'].'" class="btn btn-danger">Excluir</a></p>
										<input type="button" class="btn btn-warning" data-toggle="modal" data-target="#janela-modal-alterar-produto" value="Alterar"></p>
									</span>
								</div>
							</div>
						</div>

						
									
									
									
								

					';


			}
		}else{
			return false;
		}

	
	}

	public function ListaProdutoBanner(){
		$consulta = "SELECT * FROM `t_imagem`";
		return self::Conectar()->query($consulta);
	}

	public function ListaProduto($pagina){
		$consulta = "SELECT * FROM `t_imagem`";
		$consulta = self::Conectar()->prepare($consulta);
		$consulta->execute();
		if ($consulta->execute()) {
			$total = $consulta->rowCount();
			$registro = 3;
			
			$num_paginas = ceil($total/$registro);
			$inicio = ($num_paginas*$pagina)-$registro;

				$consulta = "SELECT * FROM `t_imagem` LIMIT $inicio,$registro";
				$consulta = self::Conectar()->prepare($consulta);
				$consulta->execute(array($inicio,$registro));

				foreach ($consulta as $dados_produto) {
					echo '
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-heading">
									'.$dados_produto['titulo_produto'].'
								</div>
								<div class="panel-body">
									<img class="img-responsive img-thumbnail" src="Admin/imagem/'.$dados_produto['nome_produto'].'"> 
									'.wordwrap($dados_produto['descricao_produto'],150,"<br /> \n").'</p>
								</div>
								<div class="panel-footer">
									<span><a href="'.PATH.'Detalhes&id='.$dados_produto['cod_imagem'].'"<p>R$: '.$dados_produto['valor_porduto'].'</p></a>
								</div>	
							</div>
						</div>
							
					';

				}
				echo '
				<div class="col-md-12">
					<ul class="pagination">';
				for($i = 1; $i < $num_paginas + 1; $i++) {
        			echo'
        				<li><a href="?p='.$i.'">'.$i.'</a></li>
        				';
    			}
    			echo '
    				</ul>
    			</div>';
		}

		
	}


	public function ListaProdutoItem($id){
		$consulta = "SELECT * FROM `t_imagem` WHERE cod_imagem = ?";
		$consulta =self::Conectar()->prepare($consulta);
		$consulta->execute(array($id));

		if ($consulta->execute(array($id))) {
			
			foreach ($consulta as $dados_produto) {
			echo '
				<form method="post" enctype="multipart/form-data">
					<div class="panel panel-default">
							<div class="panel-heading">
								'.$dados_produto['titulo_produto'].'
							</div>
							<div class="panel-body">
								<div class="col-md-6">
									<img clas="img-responsive img-thumbnail" width="500" src="Admin/imagem/'.$dados_produto['nome_produto'].'"> 
								</div>
								<div class="col-md-6">
									<p>'.wordwrap($dados_produto['descricao_produto'],150,"<br /> \n").'</p>
								<input type="submit" class="btn btn-warning" value="Gostei">
								<select name="rep">
									<option value="-1">1</option>
									<option value="5">5</option>
									<option value="10">10</option>
								</select>
								</div>
							</div>
							<div class="panel-footer">
								<p class="btn btn-success">R$:'.$dados_produto['valor_porduto'].'</p>
							</div>
					</div>
				</form>
									
									
										
										
										
										
									
								

				';
			}
		}
	}




	public function DeletaProduto($id){
		$consulta = "SELECT nome_produto FROM `t_imagem` WHERE cod_imagem = ?";
		$consulta = self::Conectar()->prepare($consulta);
		$consulta->execute(array($id));
		if ($consulta->execute(array($id))) {
			$pasta = 'Admin/imagem';
			foreach ($consulta as $dados) {
				unlink($pasta."/".$dados['nome_produto']);
			}
			

		}
		$deletar = "DELETE FROM `t_imagem` WHERE cod_imagem = ?";
		$deletar = self::Conectar()->prepare($deletar);
		$deletar->execute(array($id));
		if ($deletar->execute(array($id))){
			return true;
		}else{
			return false;
		}

	}


	public function Alterar($imagem, $descricao, $titulo, $valor){
		$consulta = "SELECT * FROM `t_imagem` WHERE cod_imagem = ?";
		$consulta = self::Conectar()->prepare($consulta);
		$consulta->execute(array($imagem, $descricao, $titulo, $valor));
			$pasta = "Admin/imagem";
			$extensao = substr($imagem['name'], -4);
			$nome = "img".uniqid().$extensao;
			move_uploaded_file($imagem['tmp_name'], $pasta."/".$nome);

		if ($consulta->execute(array($imagem, $descricao, $titulo, $valor))) {
			foreach ($consulta as $dados) {
				unlink("imagem/".$dados['nome_produto']);
			}
			$update = "UPDATE `t_imagem` SET `nome_produto`= ?,`descricao_produto`= ?,`titulo_produto`= ?,`valor_porduto`=?, WHERE cod_image = ?";
			$update = self::Conectar()->prepare($update);
			$update->execute(array($nome,$descricao, $titulo, $valor));
			if ($update->execute(array($nome,$descricao, $titulo, $valor))) {
				
			}
		}
	}

	public function ReputacaoProduto($rep,$id)	{
		$Inserir = "UPDATE `t_imagem` SET `REPUTACAO` = `REPUTACAO` +? WHERE cod_imagem = ?";
		$Inserir = self::Conectar()->prepare($Inserir);
		$Inserir->execute(array($rep,$id));
		
		if ($Inserir->execute(array($rep,$id))) {
			return true;
		}else{
			return false;
		}
	}


	public function ListaProdutoSlider(){
		$consulta = "SELECT * FROM `t_imagem` ORDER BY `REPUTACAO` LIMIT 4";
		return self::Conectar()->query($consulta);
			
		

	}


	public function PesquisarProduto($palavra){
		$sql = "SELECT * FROM `t_imagem` WHERE `titulo_produto` LIKE :palavra";
		$sql = self::Conectar()->prepare($sql);
		$sql->bindValue(":palavra", '%'.$palavra.'%', PDO::PARAM_STR);
		$sql->execute();
		foreach ($sql as $dados_produto) {
			//echo $value['titulo_produto'];

			echo '
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-heading">
									'.$dados_produto['titulo_produto'].'
								</div>
								<div class="panel-body">
									<img class="img-responsive img-thumbnail" src="Admin/imagem/'.$dados_produto['nome_produto'].'"> 
									'.wordwrap($dados_produto['descricao_produto'],150,"<br /> \n").'</p>
								</div>
								<div class="panel-footer">
									<span><a href="'.PATH.'Detalhes&id='.$dados_produto['cod_imagem'].'"<p>R$: '.$dados_produto['valor_porduto'].'</p></a>
								</div>	
							</div>
						</div>
							
					';
		}
	}


	public function AdicionaCategoria($nome_categoria){

		try {
			$insere = "INSERT INTO `t_categoria` VALUES(?,?)";
			$insere = self::Conectar()->prepare($insere);
			$insere->execute(array(null, $nome_categoria));	
		} catch (Exception $e) {
			
		}
		
	}



}

