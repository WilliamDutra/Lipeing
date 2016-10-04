window.onload = function Desabilita() {
	var Nome = document.getElementById('nome_id');
	var DataNasc = document.getElementById('dataNasc_id');
	var CEP = document.getElementById('cep_id');
	var Logradouro = document.getElementById('logradouro_id');
	var Numero = document.getElementById('numero_id');
	var Bairro = document.getElementById('bairro_id');
	var Cidade = document.getElementById('cidade_id');
	var Email = document.getElementById('email_id');
	var Senha = document.getElementById('senha_id');
	

	Nome.disabled = true;
	DataNasc.disabled = true;
	CEP.disabled = true;
	Logradouro.disabled = true;
	Numero.disabled = true;
	Bairro.disabled = true;
	Cidade.disabled = true;
	Email.disabled = true;
	Senha.disabled = true;
	


}


function Habilita() {
		var Nome = document.getElementById('nome_id');
	var DataNasc = document.getElementById('dataNasc_id');
	var CEP = document.getElementById('cep_id');
	var Logradouro = document.getElementById('logradouro_id');
	var Numero = document.getElementById('numero_id');
	var Bairro = document.getElementById('bairro_id');
	var Cidade = document.getElementById('cidade_id');
	var Email = document.getElementById('email_id');
	var Senha = document.getElementById('senha_id');


	Nome.disabled = false;
	DataNasc.disabled = false;
	CEP.disabled = false;
	Logradouro.disabled = false;
	Numero.disabled = false;
	Bairro.disabled = false;
	Cidade.disabled = false;
	Email.disabled = false;
	Senha.disabled = false;
	
}