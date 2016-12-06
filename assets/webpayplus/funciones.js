// global variables //
var TIMER = 5;
var SPEED = 10;
var WRAPPER = 'webpayForm';

function isEmpty( inputStr ) {
    if ( null == inputStr || "" == inputStr ) {
        return true;
    }
    return false;
}

function getTimestampParameter() {
    var timestamp = ("_timestamp=" + (new Date()).getTime());
    return timestamp;
}

function serializeForm(formName) {
    var serializedForm = $("form#" + formName).serialize();
    var timestamp = getTimestampParameter();
    if (isEmpty(serializedForm)) {
        serializedForm = timestamp;
    } else {
        serializedForm = serializedForm + "&" + timestamp;
    }
    return serializedForm;
}

function ajaxSubmitForm(urlCgi, formName, divName) {
    var serializedForm = serializeForm(formName);
    $.ajax({
        type: "POST",
        url: urlCgi,
        data: serializedForm,

        dataType: "html",
        success: function(data) {
            var index = verifica(data);
            if(index == -1){
                $("div#" + divName).html(data);
            }else{
                location.href="error.cgi";
            }
        },
        error: function(request, textStatus, errorThrown) {
            location.href="error.cgi";
        }
    });
}

function ajaxSubmitId(urlCgi, idName, divName) {
    var serializedId = $("#" + idName).serialize();
    $.ajax({
        type: "POST",
        url: urlCgi,
        data: serializedId,

        dataType: "html",
        success: function(data) {
            var index = verifica(data);
            if(index == -1){
                $("div#" + divName).html(data);
            }else{
                location.href="error.cgi";
            }
        },
        error: function(request, textStatus, errorThrown) {
            location.href="error.cgi";
        }
    });
}

function activeSubmitButton(time){
    setTimeout("$('#button').removeAttr('disabled')",time);
}

function verifica(cadena){
    var mensaje = "imagenes/error_fatal";
    var posicion = cadena.indexOf(mensaje);   
    return posicion;
}

function cambioEstilo(colorFondo,colorBorde,colorDegrade,opcion) {
    //colores base : colorFondo=#EFEFF0-colorBorde=#D4D4D4-colorDegrade=#F7F7F7
   
    $(document).ready(

        function(){                                        
            $("#wpprincipal").css('border','none');
            $("#wpprincipal").css('border-bottom','solid');
            $("#wpprincipal").css('border-bottom-color',colorBorde);
            $("#wpprincipal").css('border-bottom-width','1px');
            $("#wpprincipal").css('border-left','solid');
            $("#wpprincipal").css('border-left-color',colorBorde);
            $("#wpprincipal").css('border-left-width','1px');
            $("#wpprincipal").css('border-right','solid');
            $("#wpprincipal").css('border-right-color',colorBorde);
            $("#wpprincipal").css('border-right-width','1px');
            $("#wpprincipal").css('border-right-width','1px');
        }
        )

    switch(opcion){

        case 'credito':

            $(document).ready(
                function(){
                    $(".pbs").css('background',colorBorde);
                    $(".pbu").css('background',colorFondo);
                    $(".p2u").css('background',colorFondo);
                    $(".p3u").css('background',colorFondo);
                    $(".p4u").css('background',colorFondo);
                    $(".p2s").css('background',colorDegrade);
                    $(".p3s").css('background',colorDegrade);
                    $(".p4s").css('background',colorDegrade);

                    $(".pselect").css('background',colorDegrade);
                    $(".punselect").css('background',colorFondo);

                }
                )

            break;

        case 'debito':

            $(document).ready(
                function(){
                    $(".pbu").css('background',colorBorde);
                    $(".pbs").css('background',colorFondo);
                    $(".p2u").css('background',colorDegrade);
                    $(".p3u").css('background',colorDegrade);
                    $(".p4u").css('background',colorDegrade);
                    $(".p2s").css('background',colorFondo);
                    $(".p3s").css('background',colorFondo);
                    $(".p4s").css('background',colorFondo);

                    $(".pselect").css('background',colorFondo);
                    $(".punselect").css('background',colorDegrade);
                }
                )

            break;

        default:
            $(document).ready(
                function(){
                    $(".pbs").css('background',colorFondo);
                    $(".pbu").css('background',colorFondo);

                    $(".p2u").css('background',colorFondo);                    

                    $(".p3u").css('background',colorFondo);
                    $(".p4u").css('background',colorFondo);

                    $(".p2s").css('background',colorFondo);
                    $(".p3s").css('background',colorFondo);
                    $(".p4s").css('background',colorFondo);

                    $(".pselect").css('background',colorFondo);
                    $(".punselect").css('background',colorFondo);
                }
                )

    }

}

//alerta tooltip//

function showTT(el) {
    var ttext=el.title;
    var tt=document.createElement('SPAN');
    var tnode=document.createTextNode(ttext);
    tt.appendChild(tnode);
    el.parentNode.insertBefore(tt,el.nextSibling);
    tt.className="tt";
    el.title="";
}
function hideTT(el) {
    var ttext=el.nextSibling.childNodes[0].nodeValue;
    el.parentNode.removeChild(el.nextSibling);
    el.title=ttext;
}
function tooltip() {
    var imgs= $(".alert");
    for (i=0; i<imgs.length; i++) {
        imgs[i].onmouseover=function() {
            showTT(this);
        }
        imgs[i].onmouseout=function() {
            hideTT(this);
        }
    }
}
window.onload=tooltip;

function setFocusById(elementId){
    var isIE = (document.all)? true:false;
    if(isIE){
        setTimeout(function() {
            document.getElementById(elementId).focus();
        }, 1000);   
    }
    else{
        $(document).ready(function(){
            document.getElementById(elementId).focus();
        });
    }
}