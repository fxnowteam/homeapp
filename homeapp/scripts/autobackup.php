<?php
### SOLUÇÃO 1 ###
include("../inc/crislib.php");
include("../inc/functions.php");
$con = conexao();
$res = mysql_list_tables("intranet") or die(mysql_error()); 
while ($row = mysql_fetch_row($res)) { 
	$tableName = $row[0]; // cada uma das tabelas 
	#$tableName  = "mypet";
	$backupFile = "../../../var/www/scripts/bk/".$tableName."_".date("Ymdhis").".sql";
	$query = "SELECT * INTO OUTFILE '$backupFile' FROM $tableName";
	$result = mysql_query($query) or die(mysql_error());
	echo $tableName." ... ok<br>";
}
?>
<?php 
/*
### SOLUÇÃO 2 ###
include("../inc/crislib.php");
include("../inc/functions.php");
$con = conexao();

$back = fopen("bk/geral_".date("Ymd-his").".sql","w"); 
// Pega a lista de todas as tabelas 
$res = mysql_list_tables("intranet") or die(mysql_error()); 
while ($row = mysql_fetch_row($res)) { 
	$table = $row[0]; // cada uma das tabelas 
	$res2 = mysql_query("SHOW CREATE TABLE $table"); 
	while ( $lin = mysql_fetch_row($res2)){ // Para cada tabela 
		fwrite($back,"-- Criando tabela : $table\n"); 
		fwrite($back,"$lin[1]\n--Dump de Dados\n"); 
		$res3 = mysql_query("SELECT * FROM $table"); 
		while($r=mysql_fetch_row($res3)){ // Dump de todos os dados das tabelas 
			$sql="INSERT INTO $table VALUES ('"; 
			$sql .= implode("','",$r); 
			$sql .= "')\n"; 
			fwrite($back,$sql); 
		} 
	} 
} 
fclose($back); 
echo "Ok!";*/
?> 
