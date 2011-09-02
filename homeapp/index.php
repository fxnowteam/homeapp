<?
session_start();
/*if($_SERVER["SERVER_NAME"] != "172.16.1.252" && $_SERVER["SERVER_NAME"] != "172.16.1.206" && $_SERVER["SERVER_NAME"] != "localhost"){
    ?><html><body><h1>Est&aacute; p&aacute;gina s&oacute; &eacute; acess&iacute;vel via rede local.</h1></body></html><?
    exit;
}*/
ini_set('display_errors',0);
include("inc/crislib.php");
include("inc/functions.php");
$bu = "/"; //base url
$path = url($_SERVER['REQUEST_URI'],"");
$con = conexao();
$t = $_GET["t"]; 
if($path == "pages/sair.php"){
    regLog("<i style=\"color: red;\">Saiu do sistema</i>");
    $_SESSION["usuario"] = "";
    $_SESSION["nome"] = "";
    $_SESSION["senha"] = "";
    session_destroy();
    e(utf8_decode("<script type=\"text/javascript\"> alert('Você saiu de sua conta.'); </script>"));
    $path == "pages/home.php";
    e("<meta http-equiv=\"refresh\" content=\"0;URL=/\">");
    exit;
}
?>
<html>
    <head>
        <title>Secretaria Municipal da Sa&uacute;de / Os&oacute;rio - RS</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="content-language" content="pt-br">
        <meta name="description" content="Site da Secretaria Municipal da Sa&uacute;de, de Os&oacute;rio/RS" />
        <meta name="keywords" content="saúde,osório,secretaria,médico,gestão,clinica,consultório,odonto,odontológico,prontuário,digital,online,virtual,sistema,aplicativo,sigsaude,consulfarma">
        <meta name="author" content="DTI Secretaria Municipal da Saúde, Tiago Floriano <mail@paico.com.br>" />
        <meta name="reply-to" content="dtisaude@hotmail.com">
        <meta name="google" content="notranslate" />
        <script type="text/javascript" src="inc/crislib.js"></script>
        <script type="text/javascript" src="inc/js.js"></script>
	<script type="text/javascript" src="inc/ajax_dentro_do_ajax.js"></script>
        <script type="text/javascript" src="inc/jquery-1.4.2.min.js"></script>
        <link type="text/css" href="inc/jqueryui/css/smoothness/jquery-ui-1.8.15.custom.css" rel="stylesheet" />
        <script type="text/javascript" src="inc/jqueryui/js/jquery-ui-1.8.15.custom.min.js"></script>
        <?
        $usuario = str($_POST["username"]);
        $senha = str($_POST["password"]);
        if(!empty($usuario) && !empty($senha)){
            $r = fazLogin($usuario,$senha);
            if($r == true){
                $_SESSION["usuario"] = $usuario;
                $_SESSION["senha"] = sha1(md5($senha));
                //e("<script type=\"text/javascript\"> alert('Logado!'); </script>");
                e("<meta http-equiv=\"refresh\" content=\"0;URL=/?painel\">");
                regLog("<b>Logou no sistema.</b>");
                exit;
            }else{
                e("<script type=\"text/javascript\"> alert('Oops! Alguma informação está incorreta!'); </script>");
                regLog("Usu&aacute;rio ".$usuario." tentou logar mas n&atilde;o informou corretamente os dados de acesso.");
            }
        }
        ?>
        <link rel="stylesheet" type="text/css" href="inc/ncss.css" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
        <!--[if IE]>
	<link rel="stylesheet" type="text/css" href="inc/hack_css_explicativo_para_iexplorer_entender.css" />
	<![endif]-->
        <script type="text/javascript">
            $(document).ready(function() {
                //Show the paging and activate its first link
                $(".paging").show();
                $(".paging a:first").addClass("active");

                //Get size of the image, how many images there are, then determin the size of the image reel.
                var imageWidth = $(".window").width();
                var imageSum = $(".image_reel img").size();
                var imageReelWidth = imageWidth * imageSum;

                //Adjust the image reel to its new size
                $(".image_reel").css({'width' : imageReelWidth});

                //Paging  and Slider Function
                rotate = function(){
                    var triggerID = $active.attr("rel") - 1; //Get number of times to slide
                    var image_reelPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide

                    $(".paging a").removeClass('active'); //Remove all active class
                    $active.addClass('active'); //Add active class (the $active is declared in the rotateSwitch function)

                    //Slider Animation
                    $(".image_reel").animate({
                        left: -image_reelPosition
                    }, 500 );

                };

                //Rotation  and Timing Event
                rotateSwitch = function(){
                    play = setInterval(function(){ //Set timer - this will repeat itself every 7 seconds
                        $active = $('.paging a.active').next(); //Move to the next paging
                        if ( $active.length === 0) { //If paging reaches the end...
                            $active = $('.paging a:first'); //go back to first
                        }
                        rotate(); //Trigger the paging and slider function
                    }, 7000); //Timer speed in milliseconds (7 seconds)
                };

                rotateSwitch(); //Run function on launch

                //On Hover
                $(".image_reel a").hover(function() {
                    clearInterval(play); //Stop the rotation
                }, function() {
                    rotateSwitch(); //Resume rotation timer
                });

                //On Click
                $(".paging a").click(function() {
                    $active = $(this); //Activate the clicked paging
                    //Reset Timer
                    clearInterval(play); //Stop the rotation
                    rotate(); //Trigger rotation immediately
                    rotateSwitch(); // Resume rotation timer
                    return false; //Prevent browser jump to link anchor
                });

            });
        </script>
    </head>
    <body<? if($_GET["m"] != ""){ //se for um módulo
                include("mods/".$_GET["m"].".php");
                $v = onLoad($_SERVER['REQUEST_URI']); //verifica quais instruções este módulo trás
                e(" onload=\"$v\"");
            }
         ?>><? /*
         if (using_ie()) {
         	?><div id="ie">Verificamos que voc&ecirc; est&aacute; utilizando o navegador Internet Explorer. Alguns recursos podem n&atilde;o ser exibidos corretamente. Considere atualizar seu navegador clicando <a href="http://br.mozdev.org/download/" target="_blank">aqui</a> ou <a href="http://www.google.com/chrome?hl=pt-BR" target="_blank">aqui</a>.</div><?
         } */
         ?><? /*
         * INÍCIO DA PÁGINA
         */ ?><table width="100%" border="0" cellpadding="0" cellspacing="0" id="tabelaprimaria">
            <tr>
                <td id="fesq">&nbsp;</td>
                <td id="site">

                    <? /*
                     * INÍCIO DO TOPO
                     */ ?>
                    <div id="topo">
                      <div id="left">
                          <div id="logo">
                              <a href="<?= $bu ?>" title="Ir para p&aacute;gina inicial"><img src="<?= $bu ?>nimg/logo.png" alt="Secretaria Municipal da Sa&uacute;de - Os&oacute;rio/RS"></a>
                          </div>
                      </div>
                      <div id="right">
                          <div id="menu">
		                      <img src="<?= $bu ?>nimg/menutopo.png" usemap="#menusuperior">
		                      <? 
								  /*
								   * coords = left,top,right,bottom 
								   * exemplo quadrado de 20px em imagem de 50 height por 100 width:
								   * 5, 10, 25, 30
								   */ 
								  ?>
		                      <map name="menusuperior"><?
						          if(estaLogado() == true){
						                $urlextranet = "$bu?painel";
						          }else{
						          	if(using_ie()){
						          		$urlextranet = "?login";
						          	}else{
						          		$urlextranet = "#\" onmouseover=\"openBox('login');";
						          	}
						          }
						          ?>
					  <area shape="rect" coords="139,5,215,23" href="/" title="Ir para p&aacute;gina inicial" />
				   	  <area shape="rect" coords="235,5,282,23" href="#" onmouseover="openBox('noticias');" title="Not&iacute;cias da Sa&uacute;de" />
				   	  <area shape="rect" coords="305,5,332,23" href="#" onmouseover="openBox('links');" />
				   	  <area shape="rect" coords="353,5,422,23" href="http://saude.osorio.rs.gov.br/cursos/" title="Ir para o ambiente de EAD" />
				   	  <area shape="rect" coords="480,5,525,23" href="/?contato" />
				   	  <area shape="rect" coords="442,5,460,23" href="<?= $urlextranet ?>" title="Acessar Sistema Integrado de Sa&uacute;de" />
					          </map>
                                          <div id="loginbox" style="display: none">
			                  <?
				              if(estaLogado() == false){
                                                  formLogin();
				              }
				  	  ?></div>
				  	  <div id="linksbox" style="display: none">
				  	  	<div style="width: 47%; float: left; padding-left: 10px; border-right: solid 1px #777;">
					  	  	&#183 <a href="https://secweb.procergs.com.br/ame/ame/Interface/Html/index.jsp" target="_blank">AME</a><br>
					  	  	&#183 <a href="http://saude.osorio.rs.gov.br:8080" target="_blank">SigSaude Web</a><br>
					  	  	&#183 <a href="http://201.2.173.42:6081/dbportal2/" target="_blank">e-cidade (DBSeller)</a> <br>
					  	  	&#183 <a href="http://www.sistema.osorio.rs.gov.br:6081/dbpref" target="_blank">Prefeitura Online</a>
				  	  	</div>
				  	  	<div style="width: 47%; float: left; padding-left: 10px">
					  	  	&#183 <a href="http://www.anvisa.gov.br" target="_blank">ANVISA</a> <br>
					  	  	&#183 <a href="http://www.saude.gov.br/influenza" target="_blank">Influenza A (H1N1)</a> <br>
					  	  	&#183 <a href="http://www.sist.saude.gov.br" target="_blank">SOE</a> <br>
					  	  	&#183 <a href="?links">Todos os links</a>
				  	  	</div>
				  	  </div>
				  	  <div id="noticiasbox" style="display: none">
					  	  <a href="?noticias">Todas as not&iacute;cias</a>
					  	  &#183 <a href="?noticias&c=campanhas">Campanhas</a>
					  	  &#183 <a href="?noticias&c=eventos">Eventos</a>
				  	  </div>
                          </div>
                      </div>
                      <div style="clear:both"></div>
                      <div id="rodape"> </div>
                    </div>
					<div id="rodapebox"></div>
                    <? /*
                     * FIM DO TOPO
                     * INÍCIO DO CONTEÚDO
                     */ ?>
                    <div id="conteudo">
                        <?
                        include($path);
                        ?>
                    </div>
                    <div style="clear:both"></div>
                    <div id="copy">
                    	Prefeitura Municipal de Os&oacute;rio - Secretaria Municipal da Sa&uacute;de, R. Garibaldi, 255, Sulbrasileiro, Os&oacute;rio - RS, fone (51) 3663-1811<br>
                    	Desenvolvido por <a href="?dti" title="Departamento de Tecnologia da Informa&ccedil;&atilde;o e Comunica&ccedil;&atilde;o" class="vtip">DTIC</a>
                    </div>
                </td>
                <td id="fdir">&nbsp;</td>
            </tr>
        </table>
         
        <? /*
         * FIM DA PÁGINA
         */ ?>
        
    </body>
</html>
<?
mysql_close($con);
?>
