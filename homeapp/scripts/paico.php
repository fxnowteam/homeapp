<?
function paico($senha){
	$senha = str_replace("a","1*",$senha);
	$senha = str_replace("b","2*",$senha);
	$senha = str_replace("c","3*",$senha);
	$senha = str_replace("d","4*",$senha);
	$senha = str_replace("e","5*",$senha);
	$senha = str_replace("f","6*",$senha);
	$senha = str_replace("g","7*",$senha);
	$senha = str_replace("h","8*",$senha);
	$senha = str_replace("i","9*",$senha);
	$senha = str_replace("j","10*",$senha);
	$senha = str_replace("l","11*",$senha);
	$senha = str_replace("m","12*",$senha);
	$senha = str_replace("n","13*",$senha);
	$senha = str_replace("o","14*",$senha);
	$senha = str_replace("p","15*",$senha);
	$senha = str_replace("q","16*",$senha);
	$senha = str_replace("r","17*",$senha);
	$senha = str_replace("s","18*",$senha);
	$senha = str_replace("t","19*",$senha);
	$senha = str_replace("u","20*",$senha);
	$senha = str_replace("v","21*",$senha);
	$senha = str_replace("x","22*",$senha);
	$senha = str_replace("z","23*",$senha);
	
	$senha = str_replace("k","24*",$senha);
	$senha = str_replace("w","25*",$senha);
	$senha = str_replace("y","26*",$senha);
	$senha = str_replace("ç","27*",$senha);
	
	return $senha;
}

echo paico($_GET["p"]);
?>
