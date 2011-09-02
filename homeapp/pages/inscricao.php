<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">
<link rel="stylesheet" type="text/css" href="inc/preinsc_ccsl_2011.css" />
<script type="text/javascript" src="inc/preinsc_ccsl_2011.js"></script>
<div id="conteudo_curso">
    <div id="logo"><img src="/nimg/preinsc_ccsl_2011/logog.png"></div>
<?
        if($_POST["a"] != ""){
            ?>
            <script type="text/javascript">
                alert("Formulário enviado com sucesso!");
            </script>
            <?
        }
?>
    <div id="menu">
        <ul>
            <li id="homeapresentacao" class="li_selecionado"><a href="#" onclick="spg('homeapresentacao')">Apresenta&ccedil;&atilde;o</a></li>
            <li id="preinscricao" class="outro"><a href="#" onclick="spg('preinscricao')">Pr&eacute;-inscri&ccedil;&atilde;o</a></li>
            <li id="maisinfo" class="outro"><a href="#" onclick="spg('maisinfo')">Mais informa&ccedil;&otilde;es</a></li>
        </ul>
    </div>

    <div style="clear: both"></div>

    <div id="page_homeapresentacao" class="page_conteudo" style="display: block">
        <h3>Apresenta&ccedil;&atilde;o</h3>
        <p>Ol&aacute;, Pessoal! </p>
        <p>Sejam bem-vindos a 2&ordm; temporada do Curso de Capacita&ccedil;&atilde;o em Software Livre da Secretaria de Sa&uacute;de de Os&oacute;rio. Esta iniciativa, de responsabilidade do nosso setor de Tenologia da Informa&ccedil;&atilde;o, visa a disponibiliza&ccedil;&atilde;o de um espaço de natureza t&eacute;cnico-pedag&oacute;gica, para a abordagem dos v&aacute;rios aspectos pertinentes ao sistema operacional Linux, por sua distribui&ccedil;&atilde;o Ubuntu, bem como suas diversas ferramentas de trabalho.</p>
        <p>Assim, buscamos aqui a cria&ccedil;&atilde;o de momentos para debates, trocas de id&eacute;ias, discuss&otilde;es, orienta&ccedil;&otilde;es, disponibiliza&ccedil;&atilde;o de material e muito mais. Para isto, usaremos f&oacute;runs, bate-papos, links para sites e/ou arquivos, gloss&aacute;rios de termos t&eacute;cnicos, entre outros tantos recursos dispon&iacute;veis no ambiente de aprendizagem Moodle.</p>
        <p>Para participar desta ou das futuras edi&ccedil;&otilde;es do Curso, basta clicar <a href="#" onclick="spg('preinscricao')">aqui</a> para realizar sua pr&eacute;-inscri&ccedil;&atilde;o. Fica, ainda, nosso desejo de bom estudo e pesquisa &agrave; todos.
        <p>Grande abraço a todos.</p>
        <p>Equipe Pedag&oacute;gica</p>




    </div>

    <div id="page_preinscricao" style="display: none" class="page_conteudo">
        <?
        include("mods/formularios/functions.php");
        $chave = "df851c02fdb70568ebec3025c207c0e48f906531"; //chave form

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
        ?><h3>Pr&eacute;-inscri&ccedil;&atilde;o</h3><div id="cform">
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
    </div>

    <div id="page_maisinfo" style="display: none" class="page_conteudo">
        <h3>Mais informa&ccedil;&otilde;es</h3>
        <p>(51) 3663-1811, ramal 214<br>
        <a href="mailto:dtisaude@hotmail.com">dtisaude@hotmail.com</a></p>
    </div>
</div>