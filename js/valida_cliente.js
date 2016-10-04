$(document).ready(function(){
	$('#form1').validate({
		rules:{
			nome:{
				required: true
			},
			cep:{
				required: true
			},
			logradouro:{
				required: true
			},
			numero:{
				required: true
			},
			bairro:{
				required: true
			},
			uf:{
				required: true
			},
			cidade:{
				required: true
			},
			email:{
				email: true,
				required: true
			},
			senha:{
				required: true, maxLenght:10, minLenght:6
			}
		},
		messages:{
			nome:{
				required: "<span class='menssagem'>Campo Nome Obrigatório</span>"
			},
			cep:{
				required: "<span class='menssagem'>Campo Cep Obrigatório</span>"
			},
			logradouro:{
				required: "<span class='menssagem'>Campo Logradouro Obrigatório</span>"
			},
			numero:{
				required: "<span class='menssagem'>Campo Numero Obrigatório</span>"
			},
			bairro:{
				required: "<span class='menssagem'>Campo Bairro Obrigatório</span>"
			},
			uf:{
				required: "<span class='menssagem'>Campo Uf Obrigatório</span>"
			},
			cidade:{
				required: "<span class='menssagem'>Campo Cidade Obrigatório</span>"
			},
			email:{
				email:"<span class='menssagem'>E-Mail Inválido</span>",
				required: "<span class='menssagem'>Campo E-Mail Obrigatório</span>"
			},
			senha:{
				required: "<span class='menssagem'>Campo Senha Obrigatório</span>", 
				maxLenght:"<span class='menssagem'>Máximo 10 caracteres</span>",
				minLenght: "<span class='menssagem'>Minímo 6 caracteres</span>",
			}
		}
	});
});