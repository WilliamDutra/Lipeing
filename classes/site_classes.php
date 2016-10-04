<?php

/**
* 
*/
class Site extends BD{
	
	function __construct(argument)
	{
		# code...
	}

	public function Pagina($pagina){
		$consulta = "SELECT * FROM `t_imagem`";
		$consulta = self::Conectar()->prepare($consulta);
		$consulta->execute();
		if ($consulta->execute()) {
			$total = $consulta->rowCount();
			$registro = 5;

			$num_paginas = ceil($total/$registro);
			$inicio = ($num_paginas*$pagina)-$registro;

				$consulta = "SELECT * FROM `t_imagem` LIMIT $inicio,$registro";
				$consulta = self::Conectar()->prepare($consulta);
				$consulta->execute(array($inicio,$registro));

				foreach ($$consulta as $pag) {
					$pag['nome_produto'];
				}

				for($i = 1; $i < $num_paginas + 1; $i++) {
        			echo '<a href=?p="$i">'.$i.'</a>';
    			}
		}
		
	}
}