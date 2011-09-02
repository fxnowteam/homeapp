<?php
//menu de opções do correio
function menuLateral(){
    $path = "/?painel&m=dti&p=";
    ?>
    <div id="menulateral">
        <ul>
            <? if($_SESSION["unidade"] == "9"){ ?>
            <li><a href="<?= $path."" ?>">In&iacute;cio</a></li>
            <li><a href="<?= $path."atendimento" ?>">Atendimento online</a></li>
            <li><a href="/?painel&m=dti_patrimonio">Equipamentos</a></li>
            <li><a href="<?= $path."grupos" ?>">Grupos / setores</a></li>
            <li><a href="<?= $path."logs" ?>">Logs</a></li>
            <li><a href="<?= $path."notas" ?>">Notas</a></li>
            <li><a href="<?= $path."pessoas" ?>">Pessoas</a></li>
            <li><a href="<?= $path."processos" ?>">Processos</a></li>
            <? } ?>
            <li><a href="<?= $path."tarefas" ?>">Tarefas</a></li>
            <? if($_SESSION["unidade"] == "9"){ ?>
            <li><a href="<?= $path."unidades" ?>">Unidades</a></li>
            <? } ?>
        </ul>
    </div>
    <?
}
?>
