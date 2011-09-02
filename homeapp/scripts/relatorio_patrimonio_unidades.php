<?
ob_start();
include("../inc/dompdf/dompdf_config.inc.php");
include("../inc/crislib.php");
include("../inc/functions.php");
include("../mods/dti_patrimonio/functions.php");
conexao();
$idu = str($_GET["idu"]);
$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Intranet > DTI > Imprimir lista de equipamentos...</title>
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
            &nbsp;</b>

            <table width="100%">
                <tr>
                    <td>&nbsp;</td>
                    <td align="center" style="height: 50px; font-size: 16px;">DTI</td>
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
            <td align="center" style="font-size: 20px; text-decoration: underline; font-style: italic;">Lista de equipamentos: ';
            $sel3 = sel("unidades","id = '$idu'");
            $g = fetch($sel3);
            $html .= $g["nome"];
            $html .= '</td>
            <td>&nbsp;</td>
        </tr>
    </table><br><br><br>

    ';

/*
 * LISTA EQUIPAMENTOS
 */

$exibeitens = mysql_query("SELECT * FROM dti_patrimonio WHERE unidade = '$idu' ORDER BY tipo ASC") or die(mysql_error());
while($r = mysql_fetch_array($exibeitens)){
    $tipo = $r["tipo"];

    $sel2 = sel("dti_patrimonio_marcas","id = '".$r["marca"]."'");
    $f = fetch($sel2);

    $html .= "$tipo, ".$f["marca"].", ".$r["modelo"].", N/S: ".$r["numserie"].",  C/B: ".$r["codigobarras"].'<br>';
    $html .= '<b>Setor onde est&aacute; instalado: </b> '.$r["setor_destino"].'<br>';

    //exibe informações de acordo com o tipo de equipamento
    if($tipo == "Gabinete" or $tipo == "Notebook"){
        $html .= '<b>Placa m&atilde;e: </b> '.$r["gab_placamae"].'<br>';
        $html .= '<b>Processador: </b> '.$r["gab_processador"].'<br>';
        $html .= '<b>Tipo de mem&oacute;ria: </b> '.$r["gab_memoria"].'<br>';
        $html .= '<b>Mem&oacute;ria total: </b> '.$r["gab_memoria_mb"].'<br>';
        $html .= '<b>N&ordm; de pentes: </b> '.$r["gab_memoria_qtde"].'<br>';
        $html .= '<b>IP na rede: </b> '.$r["ip_rede"].'<br>';
        $html .= '<b>Impressora: </b> '.$r["impressorasituacao"].'<br>';
    }
    if($tipo == "Monitor"){
        $html .= '<b>Tipo de monitor: </b> '.$r["monitor_tipo"].'<br>';
        $html .= '<b>Polegadas: </b> '.$r["monitor_polegadas"].'&quot;<br>';
    }
    if($tipo == "Teclado"){
        $html .= '<b>Padr&atilde;o do teclado: </b> '.$r["teclado_tipo"].'<br>';
    }
    if($tipo == "Mouse"){
        $html .= '<b>Tipo de mouse: </b> '.$r["mouse_tipo"].'<br>';
    }
    if($tipo == "Roteador"){
        $html .= '<b>N&ordm; de portas: </b> '.$r["roteador_capacidade"].'<br>';
    }
    if($tipo == "Modem"){
        $html .= '<b>N&ordm; de portas: </b> '.$r["modem_capacidade"].'<br>';
    }
    if($tipo == "Estabilizador"){
        $html .= '<b>Pot&ecirc;ncia: </b> '.$r["estabilizador_potencia"].'<br>';
    }
    if($tipo == "No-break"){
        $html .= '<b>Pot&ecirc;ncia: </b> '.$r["nobreak_potencia"].'<br>';
    }
    if($tipo == "Impressora"){
        $html .= '<b>Tipo de impress&atilde;o: </b> '.$r["tipoimpressao"].'<br>';
        $html .= '<b>Cor da impress&atilde;o: </b> '.$r["corimpressao"].'<br>';
        $html .= '<b>Tipo de equipamento: </b> '.$r["impressora_tipo"].'<br>';
        $html .= '<b>Tipo de conex&atilde;o: </b> '.$r["tipoconexao"].'<br>';
    }
    $html .= '<br><br>';
}

$html .= '    </body>
</html>';

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper('a4', 'portrait');
$dompdf->render();
$dompdf->stream("relatorio_patrimonio.pdf");
ob_end();
?>
