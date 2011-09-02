<?php
include_once("../inc/crislib.php");
$nome = $_GET["nome"];
$email = $_GET["email"]; //e-mail
$assunto = $_GET["assunto"];
$mensagem = $_GET["msg"];
if(empty($nome) or empty($email) or empty($assunto) or empty($mensagem)){
    p("<b>Oops! Voc&ecirc; deixou algum campo em branco! Corrija antes de enviar</b>",1);
}else{
    //$m = mail("dtisaude@hotmail.com", "[intranet] $assunto", "Mensagem enviada por $nome ($email) via formmail da intranet: \n\n $mensagem", "From: $nome <$email>");
    $m = true; //offline...
    if($m){
        p("<b>Obrigado por sua mensagem! Em breve entraremos em contato!</b>");
    }else{
        p("<b>Oops! Nosso servi&ccedil;o n&atilde;o funcionou! Por favor, entre em contato pelo fone (51) 3663-1811 / ramal 214.</b>",1);
    }
}
?>
