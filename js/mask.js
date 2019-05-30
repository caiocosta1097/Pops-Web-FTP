function celData(obj){
	var texto = obj.value
	texto = texto.replace(/[^0-9]/g, "")
	texto = texto.replace(/(.{2})/,"($1)")
	obj.value = texto
}
