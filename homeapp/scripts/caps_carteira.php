<?
ob_start(); 
header("Content-Type: text/html; charset=ISO-8859-1",true);
include("../inc/dompdf/dompdf_config.inc.php");
include("../inc/crislib.php");
include("../inc/functions.php");
include("../mods/caps/functions.php");
conexao();
$chave = $_GET["idc"];
$sel = sel("caps_carteiras","id = '$chave'");
$r = fetch($sel);
$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>CAPS > Imprimir carteira...</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <link rel="stylesheet" type="text/css" href="../inc/css.css" />
    <style type=\"text/css\">
        <!--
        body, table, tr, td {
            font-family: Arial, Verdana;
            background-color: #fff;
            font-size: 10px;
            line-height: 1.7;
        }
        -->
    </style>
  </head>
  <body style="margin: 0px; background-color: #fff;" onload="window.print()">
    <table width="700px" style="background-color: #fff;">
        <tr>
            <td style=\"width: 330px;\">
     <table width="100%" style="background-color: #fff;">
        <tr>
            <td widtd="1%"><img src="../img/brasao_p.jpg" style="width: 52px; height: 50px;"></td>
            <td width="98%" style="font-size: 9px; text-align: center; line-height: 1.5; letter-spacing: -1px"><p id=\"topo_pref\">PREFEITURA MUNICIPAL DE OS&Oacute;RIO</p>
            <p>SECRETARIA DA SA&Uacute;DE</p>
            <p>GRATUIDADE NO TRANSPORTE MUNICIPAL DE PASSAGEIROS</p></td>
            <td width="1%">&nbsp;</td>
        </tr>
     </table>
     
     <table width="100%">
     	<tr>
     		<td style="font-size: 11px;">
	<p><img src="../images/'.$r["foto"].'" style="width: 120px; height: 90px; margin-right: 10px; border: solid 5px #ccc;" align="left">	
	<b>Nome:</b> '.$r["nome"].' </p>
	<p><b>RG:</b> '.$r["rg"].' </p>
	<p><b>Nasc:</b> '.data($r["nasc"]).'</p>
	<p><b>Defici&ecirc;ncia:</b> '.$r["deficiencia"].'</p>
	<br><br>
	<p align="center">______________________________________________<br>Assistente Social</p>
	
		</td>
	</tr>
      </table>
	
	
            </td>
            <td style="width: 30px;" valign="top">
            </td>
            <td style="width: 330px;" valign="top">
            
            
     <table width="100%">
     	<tr>
     		<td style="font-size: 11px;">
     		
                <p><b>N&ordm; registro: </b>'.$r["numreg"].'</p>
                <p><b>Emiss&atilde;o: </b>'.data($r["emissao"]).'</p>
                <p><b>Validade: </b>'.data($r["validade"]).'</p>
                <p><b>Resid&ecirc;ncia: </b>'.$r["cidaderesidencia"].'</p>
                <p>______________________________________________</p>
                <p style="text-align: justify"><i>Ficam isentas do pagamento de tarifas nos transportes coletivos que tenham alvar&aacute; de concess&atilde;o, de linha, dentro do Munic&iacute;pio de Os&oacute;rio, as pessoas portadoras de defici&ecirc;ncia f&iacute;sica, mental e sensorial (Art. 1&ordm; da Lei Municipal n&ordm; 2230/1989). </i></p>
                <p>'.$r["obs"].'</p>
	
		</td>
	</tr>
      </table>
      
      
            </td>
        </tr>
     </table>
     </body>
</html>';

#$dompdf = new DOMPDF();
#$dompdf->load_html($html);
#$dompdf->set_paper('a4', 'portrait');
#$dompdf->render();
#$dompdf->stream("caps_carteira.pdf");
echo $html;
ob_end(); 
?>
