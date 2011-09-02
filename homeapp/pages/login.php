<h3>Acesso ao SiS</h3>
<?
if(using_ie()){
	error("<span style=\"font-size: 11px;\">Oops! Voc&ecirc; est&aacute; Internet Explorer para acessar o SiS. Devido a inseguran&ccedil;a e imcompatibilidade de recursos deste navegador, restringimos o acesso somente via <a href=\"http://br.mozdev.org/download/\" target=\"_blank\">Mozilla Firefox</a> ou <a href=\"http://www.google.com/chrome?hl=pt-BR\" target=\"_blank\">Google Chrome</a>.</span>");
} else{
	formLogin();
}
?>
