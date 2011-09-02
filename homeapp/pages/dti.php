<p align="center">
    <b>Departamento de Tecnologia da Informa&ccedil;&atilde;o</b><br>
    da Secretaria Municipal da Sa&uacute;de<br>
    E-mail: <a href="mailto:dtisaude@hotmail.com">dtisaude@hotmail.com</a><br>
    Telefone: (51) 3663-1811, ramal 214
</p>
<p align="center"><a href="/?inscricao">Curso de Capacita&ccedil;&atilde;o em Software Livre</a></p>
<div id="msg"></div>
<div id="quote" style="display: none">
    <h4>Formul&aacute;rio r&aacute;pido</h4>
    <form name="formcontato" method="post" action="">
        <label>Seu nome: </label> <br>
        <input type="text" id="nome"> <br>
        <label>Seu e-mail: </label> <br>
        <input type="text" id="email"> <br>
        <label>Assunto: </label> <br>
        <input type="text" id="assunto"> <br>
        <label>Mensagem: </label> <br>
        <textarea id="mensagem"></textarea> <br>
        <input type="button" value="Enviar mensagem" onclick="ajax('msg', 'Enviando...', 'scripts/formcontato.php?nome='+getId('nome').value+'&email='+getId('email').value+'&assunto='+getId('assunto').value+'&msg='+getId('mensagem').value)">
    </form>
</div>
<div style="clear:both"></div>