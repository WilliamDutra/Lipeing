<?php

/**
* 
*/


class Usuario extends BD{
	
	function __construct()
	{
		# code...
	}

	public function CadastrarCliente($dados = array()){
		$InserirDados = ("INSERT INTO `t_consumidor`(`NOME_CONSUMIDOR`, `DT_NASCIMENTO`, `CEP`, `LOGRADOURO`, `NUMERO`, `BAIRRO`, `CIDADE`, `EMAIL`, `SENHA`) VALUES (?,?,?,?,?,?,?,?,?)");

			$stmt = self::Conectar()->prepare($InserirDados);

			if ($stmt->execute($dados)){
				
				return true;

			}else{
				var_dump($dados);
				return false;
			}
				
	}


	public function CadastrarEmpresa($dadosEmpresa = array()){
		$InserirDados = ("INSERT INTO `t_empresa`(`NOME_FANTASIA`, `RAZAO_SOCIAL`, `CEP`, `LOGRADOURO`, `NUMERO`, `BAIRRO`, `CIDADE`, `UF`, `EMAIL`, `RAMO`, `SENHA`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");


		$stmt = self::Conectar()->prepare($InserirDados);

		if ($stmt->execute($dadosEmpresa)) {
			
			return true;

		}else{

			return false;
		}
	}

		

	public function ListaFoto($login)	{
		$consulta = "SELECT * FROM `imagem_cliente` WHERE email = ? ";
		$consulta = self::Conectar()->prepare($consulta);
		$consulta->execute(array($login));
		if($consulta->rowCount() == 1){
			foreach ($consulta as $dados) {

				echo'
					
						<img src="'.PATH.'Admin/imagemcliente/'.$dados['nome_imagem'].'" class="img-responsive img-thumbnail">


				';
			}	
		}
	}



	public function Upload($imagem,$login){
		$consulta = "SELECT * FROM `imagem_cliente` WHERE email = ? ";
		$consulta = self::Conectar()->prepare($consulta);
		$consulta->execute(array($login));
		if($consulta->rowCount() == 0){
			$extensao = strtolower(substr($imagem['name'], -4));
			$nome = "img".uniqid().$extensao;
			$pasta = "Admin/imagemcliente";
			move_uploaded_file($imagem['tmp_name'], $pasta."/".$nome);
			$inserir = "INSERT INTO `imagem_cliente`(`cod_imagem`, `nome_imagem`, `email`) VALUES (?,?,?)";
			$inserir = self::Conectar()->prepare($inserir);
			$inserir->execute(array(null,$nome,$login));
			$this->ListaFoto($login);
		}else{
			$pasta = "Admin/imagemcliente";	
				foreach ($consulta as $dados) {
					unlink($pasta."/".$dados['nome_imagem']);
					
				}

			$extensao = strtolower(substr($imagem['name'], -4));
			$nome = "img".uniqid().$extensao;
			$pasta = "Admin/imagemcliente";
			move_uploaded_file($imagem['tmp_name'], $pasta."/".$nome);

			$update = "UPDATE `imagem_cliente` SET `nome_imagem` = ? WHERE email = ? ";
			$update = self::Conectar()->prepare($update);
			$update->execute(array($nome,$login));
			}

			
			$this->ListaFoto($login);

			
		}

		
		
	


	
	
	public function ListaEstados(){
		$consulta = "SELECT * FROM `t_estado`";
		return self::Conectar()->query($consulta);
	}


}


?>