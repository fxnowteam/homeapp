function openBox(opcao){
    var verificador = 0;
    if(opcao == "login"){
    	if(getId("loginbox").style.display == "none"){
                getId('loginbox').style.display = 'block';
                getId('linksbox').style.display = 'none';
                getId('noticiasbox').style.display = 'none';
                verificador = 1;
    	}
    	if(getId("loginbox").style.display == "block" && verificador == 0){
                getId('loginbox').style.display = 'none';
                getId('linksbox').style.display = 'none';
                getId('noticiasbox').style.display = 'none';
    	}
    }
    if(opcao == "links"){
    	if(getId("linksbox").style.display == "none"){
                getId('loginbox').style.display = 'none';
                getId('linksbox').style.display = 'block';
                getId('noticiasbox').style.display = 'none';
    		verificador = 1;
    	}
    	if(getId("linksbox").style.display == "block" && verificador == 0){
                getId('loginbox').style.display = 'none';
                getId('linksbox').style.display = 'none';
                getId('noticiasbox').style.display = 'none';
    	}
    }
    if(opcao == "noticias"){
    	if(getId("noticiasbox").style.display == "none"){
                getId('loginbox').style.display = 'none';
                getId('linksbox').style.display = 'none';
                getId('noticiasbox').style.display = 'block';
    		verificador = 1;
    	}
    	if(getId("noticiasbox").style.display == "block" && verificador == 0){
                getId('loginbox').style.display = 'none';
                getId('linksbox').style.display = 'none';
                getId('noticiasbox').style.display = 'none';
    	}
    }
    window.setTimeout(function() {
        closeBox();
    }, 5000);
}

function closeBox(){
        getId('loginbox').style.display = 'none';
        getId('linksbox').style.display = 'none';
        getId('noticiasbox').style.display = 'none';
}

function prevDesc(){
	item = document.getElementById('da').value;
	var i = parseInt(item);
	var novoPrev = i - 1;
	if(parseInt(novoPrev) < 1){
		novoPrev = 3;
	}
	var novoNext = i + 1;
	if(parseInt(novoNext) > 3){
		novoNext = 1;
	}
	//esconde desc0x atual
	document.getElementById('dest0'+i).style.display = 'none';
	document.getElementById('dest0'+novoPrev).style.display = 'block';
	document.getElementById('dest0'+novoNext).style.display = 'none';
	//altera propriedades do input hidden
	document.getElementById('da').value = novoPrev;
}

function nextDesc(){
	item = document.getElementById('da').value;
	var i = parseInt(item);
	var novoPrev = i - 1;
	if(parseInt(novoPrev) < 1){
		novoPrev = 3;
	}
	var novoNext = i + 1;
	if(parseInt(novoNext) > 3){
		novoNext = 1;
	}
	//esconde desc0x atual
	document.getElementById('dest0'+i).style.display = 'none';
	document.getElementById('dest0'+novoPrev).style.display = 'none';
	document.getElementById('dest0'+novoNext).style.display = 'block';
	//altera propriedades do input hidden
	document.getElementById('da').value = novoNext;
}
