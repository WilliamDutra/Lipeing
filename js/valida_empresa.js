$(document).ready(function(){
	$('#form1').validate({
		rules:{
			nome_fantasia:{
				required: true
			},
			razao_social:{
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
			ramo:{
				required: true
			},
			email:{
				email: true,
				required: true
			},
			senha:{
				required: true, maxlength:10
			}
		},
		messages:{
			nome_fantasia:{
				required: "<span class='menssagem'>Campo Nome Fantasia Obrigatório</span>"
			},
			razao_social:{
				required: "<span class='menssagem'>Campo Razão Social Obrigatório</span>"
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
				required: "<span class='menssagem'>Campo UF Obrigatório</span>"
			},
			cidade:{
				required: "<span class='menssagem'>Campo Cidade Obrigatório</span>"
			},
			ramo:{
				required: "<span class='menssagem'>Campo Ramo Obrigatório</span>"
			},
			email:{
				email: "<span class='menssagem'>Email Inválido</span>",
				required: "<span class='menssagem'>Campo Email Obrigatório</span>"
			},
			senha:{
				required: "<span class='menssagem'>Campo Senha Obrigatório</span>", maxlength:"<span class='menssagem'>Máximo de 10 caratcteres</span>"
			}
			
		}

	});
});


	