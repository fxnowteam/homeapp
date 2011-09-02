<?php
/*
 * MÓDULO MODELO
 * Menu da administração:
 * incluir no arquivo scripts/menuAdminMods.php
 */


/*
 * configurações do módulo
 */
function confMod($i){ //i = informação a retornar
    if($i == "t"){ return "M&oacute;dulo de exemplo"; } //título do conteúdo na página pública
    if($i == "m"){ return "noticias"; } //título do conteúdo na página pública
}

/*
 * carrega javascript na tag <body>
 */
function onLoad($path){
    /*if($path == "/?painel&m=noticias"){
        $v = "ajax('unidade','Carregando unidades...','mods/erros/unidades.php');";
    }
    return $v;*/
}

/*
 * exibe conteúdo na página pública
 */
function conteudoMod($var = false){
}

/*
 * exibe conteúdo na página de administração
 */
function admMod($p = false){
        $modulo = confMod("m");
	if(permissaoMod($modulo) == true){
            include("mods/$modulo/functions.php");
            includeCSS("mods/$modulo/css.css");
            includeJS("mods/$modulo/js.js");
            if($p == ""){ $subd = " &raquo; Lista"; }
            //if($p == "novo"){ $subd = " &raquo; Novo"; }
            e("<h3>".confMod("t").$subd."</h3>");
            menuLateral();
            e("<div id=\"conteudo_dti\">");
	    if($p == ""){

            }
            e("</div>");
	}else{
		semPermissao();
	}
}
?>