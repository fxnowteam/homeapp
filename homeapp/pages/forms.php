<style type="text/css">
    <!--
    #cform {
        line-height: 2;
        border-left: solid 3px #ccc;
        margin-left: 20px;
        padding-left: 10px; 
    }
    #cform .text {
        border: none;
        border-bottom: solid 1px #ddd;
        padding: 4px;
        width: 50%;
    }
    -->
</style><?
include("mods/formularios/functions.php");
$chave = str($_GET["c"]); //chave form

if($_POST["a"] != ""){
/*
            $valor = $_POST["Turnos"];
            $c = count($valor);
            $contador = 0;
            while($contador != $c){
                #if($valor[$contador] != ""){
                    echo "Valor: ".$valor[$contador];
                #}
                $contador = $contador + 1;
            }
            exit;
*/
    $chaveenvio = str($_POST["a"]);
    $ins = ins("formularios_envios","chaveenvio, data","'$chaveenvio', '".date("Y-m-d H:i:s")."'");

    $sel2 = sel("formularios_campos","chave = '$chave'","id ASC");
    while($c = fetch($sel2)){
        #echo "- ".$c["tipocampo"]."<br>";
        if($c["tipocampo"] != "checkbox" || $c["tipocampo"] != "radio"){
            $ins = ins("formularios_dados","chaveform, chaveenvio, descritivo, valor","'$chave', '$chaveenvio', '".$c["descritivo"]."', '".str($_POST[$c["idname"]])."'");
        }
        if($c["tipocampo"] == "checkbox"){
            #echo "fsd<br>";
            $valorenvio = ""; //inicia variavel
            $valor = $_POST[$c["idname"]]; //pega array
            $conta = count($valor); //quantidade de resultados
            if($conta > 0){
                $contador = 0; //inicia variavel
                while($contador != $conta){
                    $valorenvio .= $valor[$contador].";"; //agrega os valores da array
                    #echo "Valor: ".$valorenvio."<br>";
                    $contador = $contador + 1;
                }
                $ins2 = ins("formularios_dados","chaveform, chaveenvio, descritivo, valor","'$chave', '$chaveenvio', '".$c["descritivo"]."', '$valorenvio'");
            }
        }
    }
    p("<b>Seu formul&aacute;rio foi enviado com sucesso!</b>");
}

$sel = sel("formularios","chave = '$chave'");
$r = fetch($sel);
?><h3><?= $r["nomeform"] ?></h3><div id="cform">
    <form name="formmm" method="post" action="">
        <input type="hidden" id="a" name="a" value="<?= sha1(md5(date("YmdHis"))) ?>">
        <?
        $sel2 = sel("formularios_campos","chave = '$chave'","id ASC");
        while($t = fetch($sel2)){
            codeReplace($t["tipocampo"],$t["descritivo"],$t["idname"],$t["valor"]); e("<br>");
        }
        ?>
    </form>
</div>