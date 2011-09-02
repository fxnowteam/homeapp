<?
ob_start(); 
include("../inc/dompdf/dompdf_config.inc.php");
include("../inc/crislib.php");
include("../inc/functions.php");
include("../mods/bloqagenda/functions.php");
conexao();
$aut = explode("-",$_GET["aut"]);
$sel = sel("bloqagenda","ano = '".$aut[0]."' and num = '".$aut[1]."'");
$r = fetch($sel);
$html = '<html>
  <head>
    <title>Intranet > Altera&ccedil;&otilde;es em agendas > Imprimir...</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <link rel="stylesheet" type="text/css" href="../inc/css.css" />
    <link rel="stylesheet" type="text/css" href="../mods/bloqagenda/css.css" />
  </head>
  <body style="margin: 30px; background-color: #fff;">
    <table width="100%" style="background-color: #fff;">
        <tr>
            <td style="width: 10%"><img src="../img/pmo_logo_h100.png"></td>
            <td style="width: 10%" align="center"><img src="../img/pmo_brasao_h100.png"></td>
            <td style="width: 10%"> &nbsp;</td>
        </tr>
    </table><br><br>
    
    <table width="100%" style="background-color: #fff;">
        <tr>
            <td height="75px"><h3>AUTORIZA&Ccedil;&Atilde;O '.$r["ano"].'-'.$r["num"].'</h3></td>
        </tr>
        <tr>
            <td height="20px">Eu, '.$r["responsavel"].', '.cargo($r["responsavel"]).', autorizo as seguintes </td>
        </tr>
        <tr>
            <td height="20px">alterações na agenda do (a) profissional '.$r["medico"].' no software SigSaude:</td>
        </tr>
    </table>
    <table width="100%" style="margin: 20px; background-color: #fff;">
        <tr>
            <td height="20px" style="border-left: solid 2px #ccc;">'.$r["descricao"].'</td>
        </tr>
    </table>
    <table width="100%" style="background-color: #fff;">
        <tr>
            <td height="20px">Os&oacute;rio, '.data($r["data"],1).'</td>
        </tr>
        <tr><td height="20px">&nbsp;</td></tr>
        <tr>
            <td height="20px" style="text-align: center">__________________________________________________________ </td>
        </tr>
        <tr>
            <td height="20px" style="text-align: center">'.$r["responsavel"].'</td>
        </tr>
    </table><br><br>
    ';
$html .='  </body>
</html>';
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper('a4', 'portrait');
$dompdf->render();
$dompdf->stream("bloqagenda.pdf");
ob_end(); 
?>
