//////////////////////////////
//// Alias

//limpa campo input
function getId(id){
	return document.getElementById(id);
}

//////////////////////////////
//// Trabalhos com campos de formul�rio

//limpa campo input
function fClear(id){
	return getId(id).value = '';
}

//disabled
function fDisabled(id,tipo){
	return getId(id).disabled = tipo;
}


//////////////////////////////
//// Trabalhos com estilos

//style.display
function sDisplay(id,tipo){
	return getId(id).style.display = tipo;
}

//altera imagem
function sSrc(id,imagem){
	return getId(id).src = imagem;
}

//exibe, oculta
function showHide(id){
        if(getId(id).style.display == 'none'){
		getId(id).style.display = 'block';
	}else{
		getId(id).style.display = 'none';
	}
}

//faz uma requisi��o em AJAX
function ajax(div,msgCarregando,arquivo){
	var xmlHttp;
	try {
		// Firefox, Opera 8.0+, Safari
		xmlHttp=new XMLHttpRequest();
	}
	catch (e) {
		// Internet Explorer
		try {
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e){
			try {
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e) {
				alert("Seu navegador n�o suporta AJAX. Atualize-o em www.getfirefox.com");
				return false;
			}
		}
	}
	xmlHttp.onreadystatechange=function() {
		if(xmlHttp.readyState == 1) {
			document.getElementById(div).innerHTML = msgCarregando;
		}
		if(xmlHttp.readyState == 4) {
			//document.getElementById(div).innerHTML = xmlHttp.responseText;
			// http://forum.imasters.com.br/index.php?/topic/165277-ajax-executando-scripts-dentro-de-uma-pagina-carregada-com-ajax/ 
			// coloca o valor no objeto requisitado
			var texto = unescape(xmlHttp.responseText.replace(/\+/g," "));
			document.getElementById(div).innerHTML=texto;
			// executa scripts
			extraiScript(texto);

		}
	}
	xmlHttp.open("GET",arquivo,true);
	xmlHttp.send(null);
}
