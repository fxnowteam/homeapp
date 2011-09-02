<?
ob_start(); 
include("../inc/dompdf/dompdf_config.inc.php");
include("../inc/crislib.php");
include("../inc/functions.php");
include("../mods/almox/functions.php");
conexao();
$html = '<html>
  <head>
    <title>Intranet > Almoxarifado > Imprimir lista de estoque baixo...</title>
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
  <body style="margin: 30px; background-color: #fff;">
      <table width="100%" style="background-color: #fff;">
        <tr>
            <td widtd="20%" align="right"><img src="../img/brasao_p.jpg"></td>
            <td width="60%" align="center" style="height: 100px; font-size: 18px;"><b>PREFEITURA MUNICIPAL DE OS&Oacute;RIO <br>
            POSTO M&Eacute;DICO CENTRAL</b>

            <table width="100%">
                <tr>
                    <td>&nbsp;</td>
                    <td align="center" style="height: 50px; font-size: 16px;">Almoxarifado</td>
                    <td>&nbsp;</td>
                </tr>
            </table>

            </td>
            <td width="20%">&nbsp;</td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td>&nbsp;</td>
            <td align="center" style="font-size: 20px; text-decoration: underline; font-style: italic;">&Iacute;tens com alerta de estoque baixo</td>
            <td>&nbsp;</td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td style="color: #fff">.</td>
        </tr>
        <tr>
            <td style="padding-left: 150px;"><br><br><br><ul>';

/*
 * LISTA PRODUTOS
 */
$exibeitens = sel("almox_estoque_produtos","qtde < alerta","nome ASC");
while($f = fetch($exibeitens)){
   $html .= '<li>'.$f["nome"].' ('.$f["qtde"].' &iacute;tens em estoque, '.$f["alerta"].' para alertar)</li>';
}

$html .= '</ul></td>
        </tr>
    </table>';
/*
 * DESTINO, DATA DE RECEBIMENTO E ASSINATURA
 */
$html .= '    </body>
</html>';
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper('a4', 'portrait');
$dompdf->render();
$dompdf->stream("almox_estoquebaixo.pdf");
ob_end(); 
?>
