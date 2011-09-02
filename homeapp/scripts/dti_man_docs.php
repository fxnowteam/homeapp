<?
session_start();
?><script type="text/javascript" src="mods/dti_patrimonio/js.js"></script>
<link rel="stylesheet" type="text/css" href="../inc/ncss.css" />
<link rel="stylesheet" type="text/css" href="../mods/dti_patrimonio/css.css" />
<style type="text/css">
    <!--
    body {
        background-color: #fff;
        padding: 10px;
    }
    textarea {
        width: 100%;
        height: 90px;
    }
    input {
        width: 100%;
    }
    #submit {
        width: auto;
    }
    -->
</style>
<body>
      <script type="text/javascript" src="../inc/jquery-ui-1.8.6.custom.min.js"></script>
      <link rel="stylesheet" type="text/css" href="../inc/jquery-ui-1.8.6.custom.css" />
<?
include("../inc/crislib.php");
include("../inc/functions.php");
include("../mods/dti_patrimonio/functions.php");
//faz conex�o com banco
$con = conexao();
$id = str($_GET["i"]);
if(!empty($id)){
    if($_POST["ac"] == 1){
        $chave = str($_POST["c"]);
        $descricao = str($_POST["descricao"]);
        $destinatario = str($_POST["destino"]);
        if(empty($descricao) or empty($destinatario)){
            error("Oops! Faltou preencher algum campo!");
        }else{
            $dataemissao = date("Y-m-d");
            $data = date("Y-m-d H:i:s");
            $ins = ins("dti_manutencao_docs","chave, idequip, descricao, dataemissao, data, destinatario","'$chave', '$id', '$descricao', '$dataemissao', '$data', '$destinatario'");
            info("<span style=\"font-size: 11px;\">Clique <a href=\"/scripts/dti_patrimonio_manutencao_guia.php?c=$chave\">aqui</a> para imprimir.</span>");
        }
    }
    ?>
    <div id="conteudo_dti">
        <form name="formmmm" method="post" action="">
            <input type="hidden" name="ac" value="1">
            <input type="hidden" name="c" value="<?= sha1(md5(date("YmdHis")."dtipatrimonio")) ?>">
            <p>Descri&ccedil;&atilde;o do problema:</p>
            <textarea name="descricao"></textarea> <br>
            <p>Destino: </p>
            <input type="text" name="destino"> <br>
            <input type="submit" id="submit" value="Gerar documento">
        </form>
    </div>
    <?
}else{
    regLog("<b style=\"font-weight: bold\">Tentou acessar o arquivo /scripts/dti_man_docs.php direto pelo navegador.</b> (<a href=\"/?painel&m=dti&p=atendimento&sp=ficha&filtro=ip&ip=".$_SERVER['REMOTE_ADDR']."\">".$_SERVER['REMOTE_ADDR']."</a>)");
    $c = 0;
    while($c < 100){
        alert("Te peguei! ;) /// \"curioso\" detected!!!");
        $c = $c + 1;
    }
    unset($c);
}
?></body>