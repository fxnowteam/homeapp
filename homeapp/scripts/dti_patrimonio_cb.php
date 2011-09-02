<?
session_start();
?><script type="text/javascript" src="mods/dti_patrimonio/js.js"></script><?
include("../inc/crislib.php");
include("../inc/functions.php");
include("mods/dti_patrimonio/functions.php");
//faz conex�o com banco
$con = conexao();
$cb = str($_GET["e"]);
if(!empty($cb)){
    $sel = sel("dti_patrimonio","id = '$cb'");
    if(total($sel) > 0){
        $d = fetch($sel);
        e("<img src=\"dti_patrimonio_imgcb.php?cb=".$d["codigobarras"]."\" style=\"width: 110px; height: 40px;\" />");
        regLog("Emitiu uma etiqueta para o c&oacute;digo de barras ".$d["codigobarras"].".");
    }else{
        p("<b>Oops! Este c&oacute;digo de barras n&atilde;o est&aacute; cadastrado no banco!</b>",1);
        regLog("Tentou emitir uma etiqueta para o c&oacute;digo de barras ".$d["codigobarras"].".");
    }
}else{
    regLog("<b style=\"font-weight: bold\">Tentou acessar o arquivo /scripts/dti_patrimonio_cb.php direto pelo navegador.</b> (<a href=\"/?painel&m=dti&p=atendimento&sp=ficha&filtro=ip&ip=".$_SERVER['REMOTE_ADDR']."\">".$_SERVER['REMOTE_ADDR']."</a>)");
    $c = 0;
    while($c < 100){
        alert("Te peguei! ;)");
        $c = $c + 1;
    }
    unset($c);
}
?>