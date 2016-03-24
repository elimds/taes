function valida(camposInput, camposTextArea, camposRadio, camposCheck, camposPassw, camposSelect, camposHidden, formulario) {
    var msg         = "";
    var contador    = 0;
    var num         = camposInput.length;
    
    if(num > 0){
        for(i=0; i<num; i++){
            if($('form[name="' + formulario + '"] input:text[name=' + camposInput[i] + ']').val() == "") {
                msg += "&bull; " + replaceAll(camposInput[i], "_", " ") + "<br />";
                contador++;
            }
        }
    }
    
    num = camposTextArea.length;
    
    if(num > 0){
        for(i=0; i<num; i++){
            if($('form[name="' + formulario + '"] textarea[name=' + camposTextArea[i] + ']').val() == "") {
                msg += "&bull; " + replaceAll(camposTextArea[i], "_", " ") + "<br />";
                contador++;
            }
        }
    }

    num = camposRadio.length;
    
    if(num > 0){
        for(i=0; i<num; i++){
            if($('form[name="' + formulario + '"] input:radio[name=' + camposRadio[i] + ']:checked').length == 0) {
                msg += "&bull; " + replaceAll(camposRadio[i], "_", " ") + "<br />";
                contador++;
            }
        }
    }

    num = camposCheck.length;
    
    if(num > 0){
        for(i=0; i<num; i++){
            if($('form[name="' + formulario + '"] input:checkbox[name=' + camposCheck[i] + ']:checked').length == 0) {
                msg += "&bull; " + replaceAll(camposCheck[i], "_", " ") + "<br />";
                contador++;
            }
        }
    }

    num = camposSelect.length;

    if(num > 0){
        for(i=0; i<num; i++){
            if($('form[name="' + formulario + '"] select[name=' + camposSelect[i] + ']').val() == "") {
                msg += "&bull; " + replaceAll(camposSelect[i], "_", " ") + "<br />";
                contador++;
            }
        }
    }

    num = camposHidden.length;

    if(num > 0){
        for(i=0; i<num; i++){
            if($('form[name="' + formulario + '"] input:hidden[name=' + camposHidden[i] + ']').val() == "") {
                msg += "&bull; " + replaceAll(camposHidden[i], "_", " ") + "<br />";
                contador++;
            }
        }
    }

    num = camposPassw.length;

    if(num > 0){
        for(i=0; i<num; i++){
            if($('form[name="' + formulario + '"] input:password[name=' + camposPassw[i] + ']').val() == "") {
                msg += "&bull; " + replaceAll(camposPassw[i], "_", " ") + "<br />";
                contador++;
            }
        }
    }

    if(msg != "") {
        (contador > 1) ? $.prompt("<b>Campos de preenchimento obrigatório:</b><br />" + msg) : $.prompt("<b>Campo de preenchimento obrigatório:</b><br />" + msg);
        return false;
    }
    else
        $("form[name='" + formulario + "']").submit();
}

function replaceAll(string, token, newtoken) {
    while (string.indexOf(token) != -1) {
        string = string.replace(token, newtoken);
    }

    return string;
}