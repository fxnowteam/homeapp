<?
ob_start();
include("../inc/dompdf/dompdf_config.inc.php");
include("../inc/crislib.php");
include("../inc/functions.php");
include("../mods/vslicencas/functions.php");
conexao();
$idreg = str($_GET["idreg"]);
$sel = sel("vslicencas","chave = '$idreg'");
$r = fetch($sel);
/*$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
  <head>
    <title>Intranet > Vigil&acirc;ncia Sanit&aacute;ria > Imprimir Licen&ccedil;a de Transporte...</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <link rel="stylesheet" type="text/css" href="../inc/css.css" />
    <link rel="stylesheet" type="text/css" href="../mods/vslicencas/css.css" />
  </head>
  <body onload="window.print()">
    <table width="100%" style="margin-left: 1cm;">
        <tr>
            <td widtd="20%"><img src="../../img/brasao_p.jpg"></td>
            <td width="45%"><center><b>PREFEITURA MUNICIPAL DE OS&Oacute;RIO <br>
            SECRETARIA DA SA&Uacute;DE <br>
            FISCALIZA&Ccedil;&Atilde;O SANIT&Aacute;RIA</b></center></td>
            <td width="35%"></td>
        </tr>
    </table>
    
    <div style="text-align: right; margin: 20px;">LICEN&Ccedil;A N&ordm; '.$r["id"].'</div>
    
    <table width="100%">
        <tr>
            <td widtd="25%">
                <div style="text-align: right">CONCEDIDA A </div>
            </td>
            <td width="75%"><b>'.$r["empresa"].'</b></td>
        </tr>
        <tr>
            <td widtd="25%">
                <div style="text-align: right">PARA </div>
            </td>
            <td width="75%"><b>'.$r["descricao"].'</b></td>
        </tr>
    </table>
    
    <div style="text-align: right; margin: 20px;">Os&oacute;rio, '.data($r["data"],1).'</div>
    
    <table width="100%">
        <tr>
            <td widtd="50%" align="center">VALIDADE AT&Eacute; <b>'.data($r["validade"]).'</b></td>
            <td width="50%" align="center"><small>................................................................................<br>
            ASSINATURA DO RESPONS&Aacute;VEL</small></td>
        </tr>
    </table>
    
    <table width="100%">
        <tr>
            <td widtd="50%" align="center" style="border: solid 2px #000;">AMBULANTES/TREILERS</td>
            <td width="50%" align="center" style="border: solid 2px #000;">VE&Iacute;CULOS DE TRANSPORTE DE ALIMENTOS</td>
        </tr>
        <tr>
            <td widtd="50%" align="center" valign="top" style="border: solid 2px #000; padding: 5px;">
                <div id="checkbox"> </div><div id="checklabel">MANTER O M&Aacute;XIMO DE LIMPEZA NO LOCAL</div> <div id="clear">&nbsp;</div>
                <div id="checkbox"> </div><div id="checklabel">ALIMENTOS PEREC&Iacute;VEIS DEVEM SER CONSERVADOS &Agrave; TEMPERATURA REGULAMENTAR RESFRIADOS AT&Eacute; 7&deg;C</div> <div id="clear">&nbsp;</div>
                <div id="checkbox"> </div><div id="checklabel">UTILIZAR SOMENTE MAIONESE INDUSTRIAL EM EMBALAGEM INDIVIDUAL, INVIOL&Aacute;VEL E DESCART&Aacute;VEL</div> <div id="clear"> &nbsp;</div>
                <div id="checkbox"> </div><div id="checklabel">COMERCIALIZAR PRODUTOS COM PROCED&Ecirc;NCIA COMPROVADA E COM REGISTRO LEGAL</div> <div id="clear"> &nbsp;</div>
                <div id="checkbox"> </div><div id="checklabel">DISPOR DE &Aacute;GUA PORT&Aacute;VEL CORRENTE</div> <div id="clear"> &nbsp;</div>
                <div id="checkbox"> </div><div id="checklabel">DISPOR DE ARM&Aacute;RIO FECHADO PARA A GUARDA DE P&Atilde;ES</div> <div id="clear">&nbsp; </div>
                <div id="checkbox"> </div><div id="checklabel">DISPOR DE MESAS DE MANIPULA&Ccedil;&Atilde;O COM TAMPOS IMPERMEABILIZADOS</div> <div id="clear"> &nbsp;</div>
                <div id="checkbox"> </div><div id="checklabel">DISPOR DE UTENS&Iacute;LIOS DE USO DESCART&Aacute;VEL (COPOS, GUARDANAPOS, CANUDINHOS, ETC)</div> <div id="clear">&nbsp; </div>
                <div id="checkbox"> </div><div id="checklabel">FUNCION&Aacute;RIOS DEVEM USAR UNIFORMES ADEQUADOS E LIMPOS</div> <div id="clear">&nbsp; </div>
            </td>
            <td width="50%" align="center" valign="top" style="border: solid 2px #000;">
                TIPO DE CARROCERIA: <div id="clear">&nbsp; </div>
                <div style="width: 33%; float: left">
                    <div id="checkbox" style="width: 17px;"> </div><div id="checklabel" style="width: 80px">ISOT&Eacute;RMICA</div> <div id="clear">&nbsp; </div>
                </div>
                <div style="width: 33%; float: left">
                    <div id="checkbox" style="width: 17px;"> </div><div id="checklabel" style="width: 80px">FRIGOR&Iacute;FICA</div> <div id="clear">&nbsp; </div>
                </div>
                <div style="width: 33%; float: left">
                    <div id="checkbox" style="width: 17px;"> </div><div id="checklabel" style="width: 80px">FECHADA</div>
                </div> <div style="clear: both"></div>
                <div id="checkbox"> </div><div id="checklabel">DISPOR DE COMPARTIMENTOS DE CARGA REVESTIDO COM MATERIAL LISO, RESISTENTE E LAV&Aacute;VEL DE F&Aacute;CIL HIGIENIZA&Ccedil;&Atilde;O</div> <div id="clear">&nbsp; </div>
                <div id="checkbox"> </div><div id="checklabel">DISPOR DE COMPARTIMENTOS DISTINTOS PARA CARGAS DE DIFERENTES NATUREZA, ISOLADAS DA CABINE DO MOTORISTA</div> <div id="clear">&nbsp; </div>
                <div id="checkbox"> </div><div id="checklabel">TRANSPORTAR PRODUTOS COM PROCED&Ecirc;NCIA COMPROVADA, ADEQUADAMENTE EMBALADOS E ROTULADOS</div> <div id="clear">&nbsp; </div>
                <div id="checkbox"> </div><div id="checklabel">DISPOR DE GANCHOS APROPRIADOS PARA PENDURAR PRODUTOS DE ORIGEM ANIMAL</div> <div id="clear">&nbsp; </div>
                <div id="checkbox"> </div><div id="checklabel">DISPOR DE LETREIROS NAS LATERAIS CONSTANDO O NOME DA FIRMA E A NATUREZA DA MERCADORIA TRANSPORTADA</div> <div id="clear">&nbsp; </div>
                <div id="checkbox"> </div><div id="checklabel">DISPOR DE COBERTURA DE GELO EM ESCAMAS AT&Eacute; UMA PROPOR&Ccedil;&Atilde;O DE 30% DA QUANTIDADE DO PESCADO</div> <div id="clear">&nbsp; </div>
                <div id="checkbox"> </div><div id="checklabel">ALIMENTOS PEREC&Iacute;VEIS DEVEM SER TRANSPORTADOS A TEMPERATURA REGULAMENTAR REFRIGERADOS AT&Eacute; 7&deg;C</div> <div id="clear">&nbsp; </div>
            </td>
        </tr>
    </table>
    
    <p><small>OBS: &Eacute; PROIBIDA A VENDA E TRANSPORTE DE ALIMENTOS N&Atilde;O CONSTANTES NA LICEN&Ccedil;A, ASSIM COMO ARMAZENAR E TRASNPORTAR SUBST&Acirc;NCIAS, EQUIPAMENTOS, PRODUTOS E OUTROS MATERIAIS QUE POSSAM ALTERAR O ALIMENTO COMERCIALIZADO.</small></p>
    <p>NOME: ____________________________________ &nbsp;&nbsp;
    ASSINATURA: ____________________________________</p>
    
  </body>
</html>';*/
$html = '<html>
  <head>
    <title>Intranet > Vigil&acirc;ncia Sanit&aacute;ria > Imprimir Licen&ccedil;a de Transporte...</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <link rel="stylesheet" type="text/css" href="../inc/css.css" />
    <style type=\"text/css\">
        <!--
        body, table, tr, td {
            background-color: #fff;
        }
        -->
    </style>
  </head>
  <body style="margin: 80px; background-color: #fff; border: solid 3px #000; padding: 10px; padding-top: 30px;">
      <table width="100%" style="background-color: #fff;">
        <tr>
            <td widtd="20%" align="right"><img src="../img/brasao_p.jpg"></td>
            <td width="40%" align="center" style="height: 100px;"><br>PREFEITURA MUNICIPAL DE OS&Oacute;RIO <br>
            SECRETARIA DA SA&Uacute;DE <br>
            FISCALIZA&Ccedil;&Atilde;O SANIT&Aacute;RIA</td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td align="right"><br><br>LICEN&Ccedil;A N&ordm; '.$r["id"].'</td>
        </tr>
    </table><br><br>

    <table width="100%">
        <tr>
            <td width="30%;" align="right">CONCEDIDA A</td>
            <td>'.$r["empresa"].'</td>
        </tr>
        <tr>
            <td align="right">PARA</td>
            <td>'.$r["descricao"].'</td>
        </tr>
    </table>
    
    <p align="right"><br><br>Os&oacute;rio, '.data($r["data"],1).'</p>
    
    <table width="100%">
        <tr>
            <td width="50%;" align="center"><br><br><br>VALIDADE AT&Eacute; '.data($r["validade"]).'</td>
            <td align="center"><br><br><br>................................................................................<br>
            ASSINATURA DO RESPONS&Aacute;VEL</td>
        </tr>
    </table>
<br><br><br><br><br><br><br>
    <table width="100%" style="font-size: 8px;">
        <tr>
            <td width="50%" style="border: solid 1px #000;"><div style="text-align: center; padding: 10px;">AMBULANTES/TREILERS</div></td>
            <td width="50%" style="border: solid 1px #000;"><div style="text-align: center; padding: 10px;">VE&Iacute;CULOS DE TRANSPORTES DE ALIMENTOS</div></td>
        </tr>
        <tr>
            <td style="border: solid 1px #000;"><div style="padding: 10px;"> <br><br>
                <img src="../img/icon_checkbox_no.gif"> MANTER O M&Aacute;XIMO DE LIMPEZA NO LOCAL <br><br>
                <img src="../img/icon_checkbox_no.gif"> ALIMENTOS PEREC&Iacute;VEIS DEVEM SER CONSERVADOS &Agrave; TEMPERATURA REGULAMENTAR. RESFRIADOS: AT&Eacute; 7&deg;C E CONGELADOS AT&Eacute; -18&deg;C<br><br>
                <img src="../img/icon_checkbox_no.gif"> UTILIZAR SOMENTE MAIONESE INDUSTRIAL EM EMBALAGEM INDIVIDUAL, INVIOL&Aacute;VEL E DESCART&Aacute;VEL <br><br>
                <img src="../img/icon_checkbox_no.gif"> COMERCIALIZAR PRODUTOS COM PROCED&Ecirc;NCIA COMPROVADA E COM REGISTRO LEGAL <br><br>
                <img src="../img/icon_checkbox_no.gif"> DISPOR DE &Aacute;GUA PORT&Aacute;VEL CORRENTE <br><br>
                <img src="../img/icon_checkbox_no.gif"> DISPOR DE ARM&Aacute;RIO FECHADO PARA A GUARDA DE P&Atilde;ES <br><br>
                <img src="../img/icon_checkbox_no.gif"> DISPOR DE MESAS DE MANIPULA&Ccedil;&Atilde;O COM TAMPOS IMPERMEABILIZADOS <br><br>
                <img src="../img/icon_checkbox_no.gif"> DISPOR DE UTENS&Iacute;LIOS DE USO DESCART&Aacute;VEL (COPOS, GUARDANAPOS, CANUDINHOS, ETC) <br><br>
                <img src="../img/icon_checkbox_no.gif"> FUNCION&Aacute;RIOS DEVEM USAR UNIFORMES ADEQUADOS E LIMPOS </div>
            </td>
            <td style="border: solid 1px #000;"><div style="padding: 10px;"> <br><br>
                TIPO DE CARROCERIA: <br>
                <img src="../img/icon_checkbox_no.gif"> FRIGOR&Iacute;FICA <img src="../img/icon_checkbox_no.gif"> FECHADA <img src="../img/icon_checkbox_no.gif"> ISOT&Eacute;RMICA <br><br>
                <img src="../img/icon_checkbox_no.gif"> DISPOR DE COMPARTIMENTOS DE CARGA REVESTIDO COM MATERIAL LISO, RESISTENTE E LAV&Aacute;VEL DE F&Aacute;CIL HIGIENIZA&Ccedil;&Atilde;O <br><br>
                <img src="../img/icon_checkbox_no.gif"> DISPOR DE COMPARTIMENTOS DISTINTOS PARA CARGAS DE DIFERENTES NATUREZA, ISOLADAS DA CABINE DO MOTORISTA <br><br>
                <img src="../img/icon_checkbox_no.gif"> TRANSPORTAR PRODUTOS COM PROCED&Ecirc;NCIA COMPROVADA, ADEQUADAMENTE EMBALADOS E ROTULADOS <br><br>
                <img src="../img/icon_checkbox_no.gif"> DISPOR DE GANCHOS APROPRIADOS PARA PENDURAR PRODUTOS DE ORIGEM ANIMAL <br><br>
                <img src="../img/icon_checkbox_no.gif"> DISPOR DE LETREIROS NAS LATERAIS CONSTANDO O NOME DA FIRMA E A NATUREZA DA MERCADORIA TRANSPORTADA <br><br>
                <img src="../img/icon_checkbox_no.gif"> DISPOR DE COBERTURA DE GELO EM ESCAMAS AT&Eacute; UMA <br>PROPOR&Ccedil;&Atilde;O DE 30% DA QUANTIDADE DO PESCADO <br><br>
                <img src="../img/icon_checkbox_no.gif"> ALIMENTOS PEREC&Iacute;VEIS DEVEM SER TRANSPORTADOS <br>&Agrave; TEMPERATURA REGULAMENTAR. REFRIGERADOS: AT&Eacute; 7&deg;C - CONGELADOS: AT&Eacute; -18&deg;C <br><br></div>
            </td>
        </tr>
    </table>

        <p style="font-size: 8px;"><small>OBS: &Eacute; PROIBIDA A VENDA E TRANSPORTE DE ALIMENTOS N&Atilde;O CONSTANTES NA LICEN&Ccedil;A, ASSIM COMO ARMAZENAR E TRASNPORTAR SUBST&Acirc;NCIAS, EQUIPAMENTOS, PRODUTOS E OUTROS MATERIAIS QUE POSSAM ALTERAR O ALIMENTO COMERCIALIZADO.</small></p>
    <p style="font-size: 8px;">NOME: ____________________________________ &nbsp;&nbsp;
    ASSINATURA: ____________________________________</p>
	<br><br><br>
  </body>
</html>';
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper('a4', 'portrait');
$dompdf->render();
$dompdf->stream("vslicencas.pdf");
ob_end(); 
?>
