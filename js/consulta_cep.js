$(document).ready(function(){
	$("#cep").blur(function() {


		var cep = $(this).val();

		 $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

		 	if (!("erro" in dados)) {
		 		$("#logradouro").val(dados.logradouro);
		 		$("#bairro").val(dados.bairro);
		 		$("#cidade").val(dados.cidade);

		 	}else{
		 		alert("CEP Invalido!");
		 	}
		 });
	});
});