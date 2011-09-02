<?
/*
 * FUNÇÕES GERAIS
 */
date_default_timezone_set("America/Sao_Paulo");
/*
 * no cache
 */
$gmtDate = gmdate("D, d M Y H:i:s");
header("Expires: {$gmtDate} GMT");
header("Last-Modified: {$gmtDate} GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
/*
 *
 */
//conecta ao db
function conexao($opcao = false){
    if($_SERVER["SERVER_NAME"] == "172.16.1.206" or $_SERVER["SERVER_NAME"] == "localhost"){
        $usuariodb = "root";
        $senhadb = "";
        $nomedb = "PrW2KqYEbfv5hcQe";
        error_reporting(1);
        #ini_set('display_errors','Off');
    }elseif($_SERVER["SERVER_NAME"] == "172.16.1.252" or $_SERVER["SERVER_NAME"] == "saude.osorio.rs.gov.br"){

    	if($opcao == ""){
        	# usuario para navegar no site /// somente SELECT e INSERT, em banco separado para o site
		$usuariodb = "usrlogin";
		$senhadb = "WAw3RSTchuRN6N4s";
    	}elseif($opcao == "olamundo"){
		$usuariodb = "DH6c6MpPGqNx8S3v";
		$senhadb = "ZhXNCf6J7d4pDVr8";
    	}

        $nomedb = "PrW2KqYEbfv5hcQe";
        // Turn off all error reporting
        error_reporting(0);
        ini_set('display_errors','Off');
        

	if(estaLogado() == true){
		mysql_close();
		$usuariodb = "DH6c6MpPGqNx8S3v";
		$senhadb = "ZhXNCf6J7d4pDVr8";
		$con = con($usuariodb,$senhadb);
		$db = db($nomedb,$con);
	}
    }
    $con = con($usuariodb,$senhadb);
    #$con = mysql_connect("172.16.1.206",$usuariodb,$senhadb) or die(mysql_error());
    $db = db($nomedb,$con);
}

//identifica no menu de navegação, qual página está sendo acessada
function thisPage($link,$require,$modulo = false){
    //paginas do tipo /?pagina
    $exp = explode("/",$require);
    $exp = explode(".",$exp[1]);
    if($exp[0] != "mod"){
        $require2 = explode("/",$require);
        $require2 = explode(".",$require2[1]);
        if($link == $require2[0]){
            e(" id=\"this\"");
        }else{
            e(" id=\"$link\"");
        }
    }else{ //páginas de modulos
        if($link == $modulo){
            e(" id=\"this\"");
        }else{
            e(" id=\"$link\"");
        }
    }
}

//exibe formulário de login ou, exibe uma mensagem de boas vindas, identificando o usuário, com link sair
function formLogin(){
    if(estaLogado() == false){
        e("<form name=\"formm\" method=\"post\" action=\"\">");
        e("<input type=\"text\" name=\"username\" value=\"usuario\" onclick=\"this.value=''\"> ");
        e("<input type=\"password\" name=\"password\" value=\"oi :)\" onclick=\"this.value=''\"> ");
        e("<input type=\"submit\" value=\"Entrar\" id=\"submit\">");
        e("</form>");
    }/*else{
        e("<span style=\"border-bottom: solid 3px #eee; padding: 5px;\">");
        e("Seja bem vindo <a href=\"?painel\">".$_SESSION["nome"]."</a>, <a href=\"?sair\">sair</a>");
        e("</span>");
    }*/
}

//verifica consistência dos dados e, efetua o login (ou não)
function fazLogin($usuario,$senha){
    $sel = sel("dti_pessoas","login = '".str($usuario)."' and senha = '".sha1(md5($senha))."'");
    if(total($sel) == 0){
        return false;
    }else{
        $r = mysql_fetch_array($sel);
        $_SESSION["nome"] = $r["nome"];
        $_SESSION["unidade"] = $r["unidade"];
        return true;
    }
}

//verifica se está logado
function estaLogado(){
    $sel = sel("dti_pessoas","login = '".$_SESSION["usuario"]."' and senha = '".$_SESSION["senha"]."'");
    if(total($sel) == 0){
        return false;
    }else{
        return true;
    }
}

//verifica o nivel e os arquivos que o usuário tem acesso
function acesso(){
    $sel = sel("dti_pessoas","login = '".$_SESSION["usuario"]."' and senha = '".$_SESSION["senha"]."'");
    $r = mysql_fetch_array($sel);
    $v = array($r["nivel"],$r["acesso"],$r["id"]);
    return $v;
}



/*
 * MÓDULO ERROS DE DIGITAÇÃO
 */
function errostat($campo){
    /*
     * OPÇÕES:
     * - paracorrigir
     * - corrigido
     * - subunidade
     * - numunidade
     */
    $selstat = sel("mod_erros_stat","");
    $h = fetch($selstat);
    if($campo != "subunidade"){
        $soma = $h[$campo] + 1;
        if($campo == "corrigido"){
            $paracorrigir = $h["paracorrigir"] - 1;
            $upd = upd("mod_erros_stat","paracorrigir = '$paracorrigir'",1);
        }
        $upd = upd("mod_erros_stat","$campo = '$soma'",1);
    }else{
        $sub = $h["numunidades"] - 1;
        $upd = upd("mod_erros_stat","numunidades = '$sub'",1);
    }
}

/*
 * VERIFICA PERMISSÕES DE ACESSO A MÓDULO DO USUÁRIO 
 */
function permissaoMod($mod){
	$acesso = acesso();
	$permissao = strpos($acesso[1],$mod);
	if($permissao === false){
		return false;
	}else{
		return true;
	}
}
 
function semPermissao(){
	p("Voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar este m&oacute;dulo.",1);
}

/*
 * REGISTRA AÇÕES REALIZADAS PELOS USUÁRIOS DO SISTEMA
 */
function regLog($acao){
    $ins = ins("log","usuario, data, acao","'".$_SESSION["usuario"]."', '".date("Y-m-d H:i:s")."', '$acao'");
}

/*
 * ALIAS PARA O ALERT DO JS
 */
function alert($retorno){
    e("<script type=\"text/javascript\"> alert('$retorno'); </script>");
}

/*
 * ALIAS PARA O DIV CLEAR BOTH DO CSS
 */
function clearboth(){
    e("<div style=\"clear: both;\"></div>");
}

/*
 * forms
 */
function form(){
    e("<form name=\"form_".date("YmdHis")."\" method=\"post\" action=\"\">");
}
function fform(){
    e("</form>");
}
function label($txt){
    e("<label>$txt</label>");
}
function input($idname,$value=false){
    e("<input type=\"text\" id=\"$idname\" name=\"$idname\" value=\"$value\">");
}
function ihidden($idname,$value){
    e("<input type=\"hidden\" id=\"$idname\" name=\"$idname\" value=\"$value\">");
}
function textarea($idname,$value=false){
    e("<textarea id=\"$idname\" name=\"$idname\">$value</textarea>");
}
function submit($value){
    e("<input type=\"submit\" id=\"enviar\" name=\"enviar\" value=\"$value\">");
}
function button($idname,$value,$onclick,$style=false){
    e("<input type=\"button\" id=\"$idname\" name=\"$idname\" value=\"$value\" onclick=\"$onclick\"");
    if($style == true){
        e(" style=\"$style\"");
    }
    e(">");
}

function includeJS($path){
	e("<script type=\"text/javascript\" src=\"$path\"></script>");
}

function includeCSS($path){
        e("<link rel=\"stylesheet\" type=\"text/css\" href=\"$path\">");
}

function br(){
    e("<br>");
}


//http://www.php.net/manual/en/function.get-browser.php#101314
function using_ie(){
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $ub = False;
    if(preg_match('/MSIE/i',$u_agent))
    {
        $ub = True;
    }
    return $ub;
} 

?>
