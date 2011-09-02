<?
include_once("mods/".$_GET["m"].".php");
e("<h3>".confMod("titulo")."</h3>");
conteudoMod($_POST["cnes"]);
?>