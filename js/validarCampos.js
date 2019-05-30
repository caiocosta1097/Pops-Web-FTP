function validarCampos(caracter, blockType, campo){
    
    if(window.event){
        var letra = caracter.charCode;
    }else{
        var letra = caracter.which;
    }
    
    if(blockType == "number"){
        
        if(letra >= 48 && letra <=57){
            //document.getElementById(campo).style="background-color: red;";
            return false;
        }
            
    }else if (blockType == "caracter"){
            if(letra < 40 || letra > 57){
            //CANCELA A AÇÃO DA TECLA
                return false;
            }       
    }
   
}