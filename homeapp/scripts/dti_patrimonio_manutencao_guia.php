<?
ob_start();
include("../inc/dompdf/dompdf_config.inc.php");
include("../inc/crislib.php");
include("../inc/functions.php");
include("../mods/dti_patrimonio/functions.php");
conexao();
$chave = str($_GET["c"]);
$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Intranet > Imprimir...</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
    <link rel="stylesheet" type="text/css" href="../inc/css.css" />
    <link rel="stylesheet" type="text/css" href="../mods/bloqagenda/css.css" />
    <style type=\"text/css\">
        <!--
        body, table, tr, td {
            background-color: #fff;
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
  <body background="#fff;" style="background-color: #fff; margin: 20px; padding: 20px;">

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
            <td style="width: 10%"><img src="../img/pmo_logo_h100.png"></td>
            <td style="width: 10%" align="center"><img src="../img/pmo_brasao_h100.png"></td>
            <td style="width: 10%"> &nbsp;</td>
        </tr>
        <tr>
            <td style="width: 10%; height: 50px;">&nbsp; </td>
            <td style="width: 10%" align="center">&nbsp; </td>
            <td style="width: 10%">&nbsp; </td>
        </tr>
    </table>

    <table width="100%">
        <tr>
            <td style="height: 40px;">&nbsp;</td>
            <td align="center" style="height: 50px; font-size: 16px;">Requisi&ccedil;&atilde;o de manuten&ccedil;&atilde;o</td>
            <td>&nbsp;</td>
        </tr>
    </table>
    <table width="100%">';

$exibeitens = mysql_query("SELECT * FROM dti_manutencao_docs WHERE chave = '$chave'") or die(mysql_error());
$f = mysql_fetch_array($exibeitens);



    //verifica o tipo de equipamento
    $sel = sel("dti_patrimonio","id = '".$f["idequip"]."'");
    $r = fetch($sel);
    $tipo = $r["tipo"];
    $unidade = unidade($r["unidade"]);
    #$html .= '<tr><td style="height: 20px;"><b>Unidade: </b>'.$unidade.'</td></tr>';
    $html .= '<tr><td style="height: 20px;"><b>Tipo: </b>'.$tipo.'</td></tr>';
    $sel2 = sel("dti_patrimonio_marcas","id = '".$r["marca"]."'");
    $h = fetch($sel2);
    $html .= '<tr><td style="height: 20px;"><b>Marca: </b> '.$h["marca"].'</td></tr>';
    $html .= '<tr><td style="height: 20px;"><b>Modelo: </b> '.$r["modelo"].'</td></tr>';
    $html .= '<tr><td style="height: 20px;"><b>N/S: </b> '.$r["numserie"].'</td></tr>';




$html .= '<tr><td style="height: 20px;"><b>Observa&ccedil;&atilde;o: </b>'.$f["descricao"].'</td></tr>';
$html .= '<tr><td style="height: 20px;"><b>Destino: </b>'.$f["destinatario"].'</td></tr>';
$html .= '<tr><td style="height: 100px;"> &nbsp;</td></tr>';
$html .= '<tr><td style="height: 20px;"><center>___________________________________________</center></td></tr>';
$html .= '<tr><td style="height: 20px;"><center>ASSINATURA</center></td></tr>';
$html .= '</table>';

$html .='  </body>
</html>';
/*
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper('a4', 'portrait');
$dompdf->render();
$dompdf->stream("rel_man_dti.pdf");*/
echo $html;
ob_end();
?>
