<?php

/**
* 
*/
class Login extends BD{
	
	

	function __construct()
	{

	}


	public function ValidaCliente($email, $senha){
		try {
			
			$valida = self::Conectar()->prepare("SELECT EMAIL, SENHA FROM `t_consumidor` WHERE  email = ? AND senha = ? ");
			$valida->execute(array($email, $senha));
			
			if ($valida->rowCount() == 1) {

				/*session_start();
				$_SESSION['loginCliente'] = $email;

				echo "$email";*/

				return true;

			}else{
				return false;
			}
		} catch (Exception $e) {
			return false;	
		}
	}

	public function ValidaEmpresa($email, $senha){
		try {
			$valida = self::Conectar()->prepare("SELECT * FROM `t_empresa` WHERE email = ? AND senha = ?  ");
			$valida->execute(array($email, $senha));

			while ($linha = $valida->fetch(PDO::FETCH_ASSOC)) {
   			 
   			   $id = $linha['NOME_FANTASIA']  ;
			}


			if ($valida->rowCount() == 1){
								
				return true;
				
			}else{
				return false;
			}


		} catch (Exception $e) {
			return false;
		}
	}

	
	public function LogarUsuario($email, $senha)	{
		if ($this->ValidaEmpresa($email, $senha) || $this->ValidaCliente($email, $senha)) {
			
			session_start();

			$_SESSION['nome'] = $email;
			
			return true;

		}else{

			return false;
			
		}
	}

	public function isLogado(){
		
		if (isset($_SESSION['nome'])) {
			return true;
		}
	}


	public function Sair()	{
		
		if ($this->isLogado()) {
			unset($_SESSION[$this->pref.'nome']);
			session_destroy();
			return true;
		}else {
			return false;
		}
	}
}

?>