<?php

/**
* 
*/
class BD{
	
	//Usa-se o SELF($this) para referenciar uma variavel estatica

	private static $conexao;

	function __construct(){}

	public static function Conectar(){

		if (is_null(self::$conexao)) {

			self::$conexao = new PDO('mysql:host=localhost; dbname=lipeing', 'root', '');
		}

		return self::$conexao;
	}

	
}

?>