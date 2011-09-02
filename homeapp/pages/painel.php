<?
/*
 * PAINEL DE ADMINISTRAÇÃO
 * Níveis:
 * - 1 = administrador
 * - 2 = colaborador
 * - 3 = usuário comum
 * Acesso:
 * - array com os arquivos que o usuário tem acesso, se o nível de acesso for 1, este ítem pode ficar em branco
 */
if(estaLogado() == true){

    ?>

    <link type="text/css" href="inc/jqueryui/css/smoothness/jquery-ui-1.8.15.custom.css" rel="stylesheet" />
    <script type="text/javascript" src="inc/jqueryui/js/jquery-ui-1.8.15.custom.min.js"></script>

    <?
    $pg = str($_GET["pg"]); //página da admin
    $p = str($_GET["p"]); //pagina do módulo
    $m = str($_GET["m"]); //módulo a ser incluido
    $ac = $_POST["ac"]; //ação de formulário
	

	
    e("<div id=\"submenu\">");
	e("<div id=\"bemvindo\">Ol&aacute; <b>".$_SESSION["nome"]."</b></div>");
	e("<div id=\"links\">");
    e("<a href=\"?painel\">P&aacute;gina do usu&aacute;rio</a> &#183; ");
    //e("<a href=\"#\" style=\"cursor: help\" title=\"Em breve\">Ajuda</a> &#183; ");
    e("<a href=\"?painel&pg=senha\">Alterar senha</a> &#183; ");
    //e("<a href=\"#\" style=\"cursor: help\" title=\"Em breve\">Correio interno</a> &#183; ");
    $a = acesso(); //verifica o nível de acesso
    /*
     * MONTA MENU
     */
    $arr = explode(",",$a[1]);
    $contador = count($arr);
    $cont = 0;
    $contador = $contador - 1;
    include("scripts/menuAdminMods.php");
    while($cont <= $contador){
        e($menuMod[$arr[$cont]]);
        $cont = $cont + 1;
    }
    //e($menuMod);
    e("<a href=\"?sair\">Sair</a>");
	e("</div>");
    e("</div>");
	//e("<div style=\"clear:both\"></div>");
	
	
	
    /*
     * MONTA CONTEÚDO DA ADMIN
     */
    if($m != ""){ //se tiver acessando uma página do módulo
        /*
         * ADMINISTRAÇÃO DE MÓDULO
         */
        admMod($p);
    }elseif($m == ""){
        /*
         * CAPA
         */
        if($pg == ""){

            /*
             * DTI
             */
            if($_SESSION["unidade"] == "9"){
                /*
                 * ALERTAS DE EQUIPAMENTOS EM MANUTENÇÃO
                 */
                $sel = sel("dti_manutencao_historico","dataalerta = '".date("Y-m-d")."'");
                if(total($sel) > 0){
                    $alertanums = 0;
                    while($j = fetch($sel)){
                        $sel2 = sel("dti_patrimonio","id= '".$j["idequip"]."' and manutencao = '1'");
                        if(total($sel2) > 0){
                            $alertanums = $alertanums + 1;
                        }
                    }
                    if($alertanums > 0){
                        error("<span style=\"font-size: 11px;\"><b>ATEN&Ccedil;&Atilde;O</b>: h&aacute; equipamentos em manuten&ccedil;&atilde;o com lembretes para hoje! Clique <a href=\"?painel&m=dti_patrimonio&p=manutencao&filtro=alertas\">aqui</a> para ver.</span>");
                    }
                }
            }

            ?>
            <div style="clear:both; margin-bottom: 35px;"></div>
            <div id="homeleft">
                <h3><span style="border-bottom: solid 3px #eee; padding: 5px;">Atualiza&ccedil;&otilde;es do SiS</span></h3>
                <?
                $sel = sel("atualizacoes","status = '1'","id DESC","30");
                if(total($sel) == 0){
                    e("Nenhuma atualiza&ccedil;&atilde;o cadastrada at&eacute; este momento.");
                }else{
                    while($r = fetch($sel)){
                        e("- <a href=\"?painel&pg=atualizacoes&c=".$r["chave"]."\">".$r["titulo"]."</a>, ".data($r["data"],1)."<br>");
                        e(substr($r["texto"],0,140));
                        if(strlen($r["texto"]) > 140){
                            e("... <a href=\"?painel&pg=atualizacoes&c=".$r["chave"]."\">Leia mais</a>.");
                        }
                        e("<br><br>");
                    }
                }
                ?>
            </div>
            <div id="homeright">
                <h3><span style="border-bottom: solid 3px #eee; padding: 5px;">Links r&aacute;pidos</span></h3>
                <a href="http://www.osorio.rs.gov.br" target="_blank"><img src="banners/site-pmo.jpg"></a> <br>
                <a href="http://saude.osorio.rs.gov.br/cursos/" target="_blank"><img src="banners/curso-capacitacao-software-livre.jpg"></a> <br>
                <a href="http://www.sistema.osorio.rs.gov.br:6081/dbpref" target="_blank"><img src="banners/contra-cheque.jpg"></a>
            </div>
            <div style="clear: both"> </div>
            <?
        }
        /*
         * CAPA
         */
        if($pg == "atualizacoes"){
            $chave = str($_GET["c"]);
            $sel = sel("atualizacoes","chave = '$chave'");
            $r = fetch($sel);
            e("<h3>".$r["titulo"]."</h3>");
            e($r["texto"]);
            e("<p><br>Publicado em ".data($r["data"])."</p>");
        }
        /*
         * ALTERAR SENHA
         */
        if($pg == "senha"){
            e("<h3>Alterar senha</h3>");
            /*
             * ATUALIZAR SENHA
             */
            if($ac == "up"){
                //verifica se a senha atual é verdadeira
                $senhaatual = sha1(md5(($_POST["senhaatual"])));
                $sel = sel("dti_pessoas","senha = '$senhaatual'");
                if(total($sel) == 0){
                    regLog("Tentou alterar a senha mas, a senha atual informada n&atilde;o estava correta.");
                    p("<b>Oops! Sua senha atual informada n&atilde;o confere com a senha atual.</b>",1);
                }else{
                    $novasenha = sha1(md5(($_POST["novasenha"])));
                    $novasenhaconfirm = sha1(md5($_POST["novasenhaconfirm"]));
                    if($novasenha != $novasenhaconfirm){
                        p("<b>Oops! Sua nova senha e sua confirma&ccedil;&atilde;o n&atilde;o conferem!</b>",1);
                        regLog("Tentou alterar a senha mas, a nova senha e sua confirma&ccedil;&atilde;o n&atilde;o conferiam.");
                    }else{
                        $idu = acesso();
                        $idusuario = $idu[2];
                        $upd = upd("dti_pessoas","senha = '$novasenha'",$idusuario);
                        $_SESSION["senha"] = $novasenha;
                        p("<b>Sua senha foi alterada com sucesso!</b>");
                        regLog("Alterou a senha.");
                    }
                }
            }
            /*
             * FORMULÁRIO PARA INFORMAR OS DADOS
             */
            e("<script type=\"text/javascript\" src=\"/inc/jquery.pwdstr-1.0.source.js\"></script>");
            e("<form name=\"formsenha\" method=\"post\" action=\"\">");
            e("<input type=\"hidden\" name=\"ac\" value=\"up\">");
            e("<label>Informe sua senha atual: </label> <br>");
            e("<input type=\"password\" name=\"senhaatual\"> <br>");
            e("<label>Digite sua nova senha: </label> <br>");
            e("<input id=\"novasenha\"  type=\"password\" name=\"novasenha\"> <br>
                <div style=\"padding: 3px; margin: 3px;\">
                    <small><b>For&ccedil;a da senha: </b>sua senha pode ser quebrada em <span id=\"time\">menos de um segundo</span><br>
                    Procure alterar sua senha periodicamente.</small>
                </div>");
            e("<label>Digite novamente sua nova senha: </label> <br>");
            e("<input type=\"password\" name=\"novasenhaconfirm\"> <br>");
            e("<input type=\"submit\" value=\"Alterar\">");?><script type='text/javascript'>
  //<![CDATA[
  $(window).load(function(){
    $('#novasenha').pwdstr('#time');
  });
  //]]>
  </script><?
            e("</form>");
        }
    }
}else{
    e("Fa&ccedil;a o <a href=\"/?login\">login</a> para acessar esta &aacute;rea.");
}
?>