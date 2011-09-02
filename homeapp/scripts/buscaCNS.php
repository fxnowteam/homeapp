<?
session_start();
include("../inc/crislib.php");
include("../inc/functions.php");
include("../mods/marcpoa/functions.php");
conexao();
buscaCNS($_GET["nome"],$_GET["nasc"]);
?>