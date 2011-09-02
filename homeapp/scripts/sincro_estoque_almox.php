<?php
header("Content-Type: text/html; charset=ISO-8859-1",true);
/*
 * INSERE PRODUTOS AO ESTOQUE
 * p = entrada
 */
include("../inc/crislib.php");
include("../inc/functions.php");
//faz conexão com banco
$con = conexao();
$sel = sel("almox_estoque_produtos","");
while($r = fetch($sel)){
    $sel2 = sel("almox_estoque","produto = '".$r["nome"]."'");
    $g = fetch($sel2);
    if($g["qtde"] > 0){ //já foi atualizado
        $novaqtde = $g["qtde"] + $r["qtde"];
    }else{
        $novaqtde = $r["qtde"];
    }
    $upd = mysql_query("UPDATE almox_estoque SET qtde = '$novaqtde' WHERE produto = '".$r["nome"]."'");
}
e("Ok!");
?>
