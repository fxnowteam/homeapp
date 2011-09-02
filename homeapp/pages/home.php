<style type="text/css">
    <!--
    #preinscricao {
        text-align: center;
    }
    #preinscricao img {
        padding: 5px;
        border: solid 1px #C7BB00;
    }
    -->
</style>
<script type="text/javascript" src="/inc/tooltips/jquery.js"></script>

<script type="text/javascript" src="/inc/tooltips/vtip.js"></script>
<link rel="stylesheet" type="text/css" href="/inc/tooltips/css/vtip.css" />

<?
if($_SERVER["SERVER_NAME"] == "172.16.1.252"){
	#e("<div style=\"z-index: 1000000000000000000000000000; padding-top: -50px;\">");
	#info("<span style=\"font-size: 11px;\">Agora voc&ecirc; pode acessar usando <a href=\"http://saude.osorio.rs.gov.br\">http://saude.osorio.rs.gov.br</a>.</span>",450);
	#e("</div>");
}
?>

<link rel="stylesheet" type="text/css" href="inc/sliderhome.css" />
<? /*
<div id="preinscricao">
    <a href="/?inscricao"><img src="/upl/curso.png"></a><br><a href="/?inscricao">Clique aqui para fazer a pr&eacute;-inscri&ccedil;&atilde;o</a>
</div>
*/ ?>
<div id="ultimas_atualizacoes">
	<div id="destaques">

		<div class="main_view">
		    <div class="window">
			<div class="image_reel">
                            <?
                            $sel = sel("noticias","destaque = '1' and status = '1'","RAND()",4);
                            while($y = fetch($sel)){
                                ?>
                            <a href="?noticias&i=<?= $y["id"] ?>" title="<?= $y["titulo"] ?>" class="vtip"><img src="upl/d/<?= $y["fotodestaque"] ?>" width="790" height="286" alt="<?= $y["titulo"] ?>" border="0" /></a>
                                <?
                            }
                            ?>
			</div>
		    </div>
		    <div class="paging">
			<a href="#" rel="1">1</a>
			<a href="#" rel="2">2</a>
			<a href="#" rel="3">3</a>
			<a href="#" rel="4">4</a>
		    </div>
		</div>

	</div>
	<div id="lista_ultimas">
		<div id="titulo"> </div>
		<ul>
                        <?
                        $sel2 = sel("noticias","status = '1'","view DESC",3);
                        while($r = fetch($sel2)){
                            ?>
                        <li><a href="/?noticias&i=<?= $r["id"] ?>"><?= $r["titulo"] ?></a></li>
                            <?
                        }
                        ?>
		</ul>
		<div id="botao_todos">
			<a href="/?noticias"><img src="nimg/spacer.gif"></a>
		</div>
	</div>
</div>
<div style="clear: both"></div>
<div id="banners">
	<div id="titulo">&nbsp;</div>
	<div id="bannerpub"><a href="http://www.osorio.rs.gov.br" target="_blank"><img src="banners/site-prefeitura.jpg"></a></div>
	<div id="bannerpub"><a href="http://www.saude.rs.gov.br" target="_blank"><img src="banners/site-secsaudeestado.jpg"></a></div>
	<div id="bannerpub"><a href="http://www.saude.gov.br" target="_blank"><img src="banners/site-ministerio-saude.jpg"></a></div>
	<div id="bannerpub"><a href="http://www.cremers.org.br" target="_blank"><img src="banners/site-cremers.jpg"></a></div>
	<div id="bannerpub"><a href="http://www.portalcoren-rs.gov.br" target="_blank"><img src="banners/site-coren.jpg"></a></div>
</div>
