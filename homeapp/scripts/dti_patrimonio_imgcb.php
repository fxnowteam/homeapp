<?
require_once("Image/Barcode.php"); // chamada para a biblioteca Image_Barcode
$cepfinal = $_GET["cb"]; // recuperando o CEP
$type = "code128"; // tipo de barra gerada
Image_Barcode::draw($cepfinal, $type); // Imprimindo o c�digo de barras na tela
?>