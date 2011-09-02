<body onload="pegaDados()">
	<script type="text/javascript" src="../mods/farmacia/js.js"></script>
	<script type="text/javascript" src="../inc/jquery-1.4.2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../mods/farmacia/painel.css">
	<script type="text/javascript">
		function pegaDados(){
			$.getJSON("../mods/farmacia/atualiza.php", function(json) {
				$('#b1num').html(json.atendimento[0].ficha);
				$('#b2num').html(json.atendimento[1].ficha);
				$('#b3num').html(json.atendimento[2].ficha);
				if(json.atendimento[0].tipo == 'ficha'){
					$("#b1").css("background","lightblue");
				}
				if(json.atendimento[0].tipo == 'fichaprioritaria'){
					$("#b1").css("background","yellow");
				}
				if(json.atendimento[1].tipo == 'ficha'){
					$("#b2").css("background","lightblue");
				}
				if(json.atendimento[1].tipo == 'fichaprioritaria'){
					$("#b2").css("background","yellow");
				}
				if(json.atendimento[2].tipo == 'ficha'){
					//getId('b1').style.background = '9955fc';
					$("#b3").css("background","lightblue");
				}
				if(json.atendimento[2].tipo == 'fichaprioritaria'){
					$("#b3").css("background","yellow");
				}
			});
		}
		setInterval("pegaDados()",10000); //atualiza a cada 10 segundos
	</script>
	<div id="b1">
		<div id="b1num"></div><span>Balc&atilde;o 1</span>
	</div>
	<div id="b2">
		<div id="b2num"></div><span>Balc&atilde;o 2</span>
	</div>
	<div id="b3">
		<div id="b3num"></div><span>Balc&atilde;o 3</span>
	</div>
	<div style="clear:both"></div>
	<div id="texto">Farm&aacute;cia</div>
</body>