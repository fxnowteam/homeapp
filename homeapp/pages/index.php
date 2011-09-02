<?php
session_start();
include("inc/crislib.php");
include("inc/functions.php");
//$path = url($_SERVER['REQUEST_URI'],"");
?>
<html>
    <head>
        <title>Intranet - Secretaria Municipal de Sa&uacute;de / Os&oacute;rio - RS</title>
        <script type="text/javascript" src="inc/crislib.js"></script>
        <link rel="stylesheet" type="text/css" href="inc/css.css" />
    </head>
    <body>
        <div id="topo">
            <div id="left">
                <div id="titulo"><a href="/web/" title="Ir para p&aacute;gina inicial">Intranet</a><sup>beta</sup></div>
                <div id="descricao">Secretaria Municipal de Sa&uacute;de / Os&oacute;rio - RS</div>
            </div>
            <div id="right"><?
            formLogin();
            ?></div>
        </div>
        <div style="clear: both"></div>
        <div id="menu">
            <ul>
                <li><a href="/web/"<? thisPage("home",$path) ?>>Home</a></li>
                <li><a href="/web/?erros"<? thisPage("erros",$path) ?>>Erros de digita&ccedil;&atilde;o</a></li>
                <li><a href="/web/?informacoes"<? thisPage("informacoes",$path) ?>>Outras informa&ccedil;&otilde;es</a></li>
            </ul>
        </div>
        <div style="clear: both"></div>
        <div id="conteudo">
            <?
            include($path);
            ?>
        </div>
        <div id="rodape">
            <?= date("Y") ?> - Secretaria Municipal de Sa&uacute;de de Os&oacute;rio - RS <br>
            Desenvolvido por <a href="mailto:dtisaude@hotmail.com">DTI Sa&uacute;de</a>
        </div>
    </body>
</html>
