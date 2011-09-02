<?
ob_start(); 
include("../inc/dompdf/dompdf_config.inc.php");
include("../inc/crislib.php");
include("../inc/functions.php");
include("../mods/almox/functions.php");
conexao();
$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Intranet > Almoxarifado > Imprimir lista de estoque baixo...</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <link rel="stylesheet" type="text/css" href="../inc/css.css" />
    <style type=\"text/css\">
        <!--
        body, table, tr, td {
            background-color: #fff;
        }
        body {
            margin: 60pt 60pt 60pt 60pt;
        }
        tr {
            height: 25px;
        }
        * {
          font-family: helvetica,georgia,serif;
          font-weight: bold;
        }

        p {
          text-align: justify;
          font-size: 1em;
          margin: 0.5em;
          padding: 10px;
        }

        -->
    </style>
  </head>
  <body>

<script type="text/php">

if ( isset($pdf) ) {

  $font = Font_Metrics::get_font("verdana");;
  $size = 6;
  $color = array(0,0,0);
  $text_height = Font_Metrics::get_font_height($font, $size);

  $foot = $pdf->open_object();

  $w = $pdf->get_width();
  $h = $pdf->get_height();

  // Draw a line along the bottom
  $y = $h - $text_height - 24;
  $pdf->line(16, $y, $w - 16, $y, $color, 0.5);

  $pdf->close_object();
  $pdf->add_object($foot, "all");

  $text = "Page {PAGE_NUM} of {PAGE_COUNT}";

  // Center the text
  $width = Font_Metrics::get_text_width("Page 1 of 2", $font, $size);
  $pdf->page_text($w / 2 - $width / 2, $y, $text, $font, $size, $color);

}
</script>

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
            <td align="center" style="font-size: 20px; text-decoration: underline; font-style: italic;">Estoque atual dos seguintes produtos:</td>
            <td>&nbsp;</td>
        </tr>
    </table>
<br><br><br>';
//$html .= '<table width="100%">';
//$html .= '<ul>';
/*
 * LISTA PRODUTOS
 */
$anohj = date("Y");
$meshj = date("m");
$messoma = $meshj + 4;
if($messoma > 12){
    $anohj = $anohj + 1;
    if($messoma == 13){ $messoma = 1; }
    if($messoma == 14){ $messoma = 2; }
    if($messoma == 15){ $messoma = 3; }
    if($messoma == 16){ $messoma = 4; }
}
if($messoma < 10){
    $messoma = "0".$messoma;
}
$datavalidade = $anohj."-".$messoma."-28";
$sel = mysql_query("SELECT * FROM almox_estoque WHERE validade BETWEEN '".date("Y-m-d")."' AND '$datavalidade'") or die(mysql_error());
while($f = fetch($sel)){
    $html .= '<li>'.$f["produto"].', '.$f["qtde"].' &iacute;tens em estoque, vence em '.data($f["validade"]).'</li>';
}

//$html .= '</table>';

//$html .= '</ul>';
/*
 * DESTINO, DATA DE RECEBIMENTO E ASSINATURA
 */
$html .= '    </body>
</html>';
//App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper('a4', 'portrait');
$dompdf->render();
$dompdf->stream("almox_estoque_validade.pdf");
ob_end(); 
?>
