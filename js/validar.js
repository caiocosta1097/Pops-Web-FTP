function validar(){

	//Celular

	var erCel = /^[9]{1} [0-9]{4}-[0-9]{4}$/
	var cel = document.getElementById("txtCelular")

	if(!erCel.test(cel.value)){
		cel.style.border = "solid 1px red"
	}


	// CPF
	var erCpf = /^[0-9]{3}.?[0-9]{3}.?[0-9]{3}-?[0-9]{2}$/
	var cpf = document.getElementById("cpf")

	if(!erCpf.test(cpf.value)){
		cpf.style.border = "solid 1px red"
	}


	//CEP
	var erCep = /[0-9]{5}-[0-9]{3}/
	var cep = document.getElementById("txtCep")

	if(!erCep.test(cep.value)){
		cep.style.border = "solid 1px red"

	}
}
