<?
$idn = str($_GET["i"]);
$cat = str($_GET["c"]);
if(!empty($cat)){
    $cate = "cat = '$cat' and ";
    if($cat == "campanhas"){ $sub = " &raquo; Campanhas"; }
    if($cat == "eventos"){ $sub = " &raquo; Eventos"; }
    $titulo = "Not&iacute;cias$sub";
}else{
    $titulo = "Todas as not&iacute;cias";
}
if(empty($idn)){
    ?>
    <h3><?= $titulo ?></h3>
    <?
    $sel = sel("noticias","{$cate}status = '1'","datapub DESC",50);
    while($r = fetch($sel)){
        $datapub = explode(" ",$r["datapub"]);
        $datapub = data($datapub[0]);
        e("$datapub &#183; <a href=\"?noticias&i=".$r["id"]."\">".$r["titulo"]."</a><br>");
    }
}else{
    //contador de visualizações
    $upcounter = mysql_query("UPDATE noticias SET view = view+1 WHERE id = '$idn'") or die(mysql_error());
    //capta informações da notícia
    $sel = sel("noticias","id = '$idn'");
    $g = fetch($sel);
    $datapub = explode(" ",$g["datapub"]);
    $datapub = data($datapub[0]);

    ?>
    <h3>&raquo; <?= $g["titulo"] ?></h3>
    <div style="margin-left: 50px; margin-right: 50px;">
        <?
        if(!empty($g["fotodestaque"])){


function img($imagem, $h, $w){
	//verifica na $imagem o que � pasta, o que � arquivo e o que � extens�o
	$explode = explode("/",$imagem);
	$pasta = $explode[0]."/".$explode[1]."/"; // $pasta = pasta_de_imagens/
	$arquivo = $explode[2]; // $arquivo = arquivo.jpg ou .gif ou .png
	$explode = explode(".",$arquivo);
	$extensao = $explode[1];
	$nomearquivo = $explode[0];
	//script original: http://sniptools.com/tutorials/generating-jpggifpng-thumbnails-in-php-using-imagegif-imagejpeg-imagepng
	//adaptado por Tiago Floriano Webdesigner em 27 de outubro de 2007
	$thumbWidth = $w; // Intended dimension of thumb
	$thumbHeight = $h;
	if(!file_exists($pasta.$nomearquivo."_".$w.$h.".".$extensao)){
		if($extensao == "jpg" or $extensao == "JPG" or $extensao == "jpeg" or $extensao == "JPEG"){
			// Beyond this point is simply code.
			$sourceImage = imagecreatefromjpeg($imagem);
			$sourceWidth = imagesx($sourceImage);
			$sourceHeight = imagesy($sourceImage);

			$targetImage = imagecreatetruecolor($thumbWidth,$thumbHeight);
			imagecopyresampled($targetImage,$sourceImage,0,0,0,0,$thumbWidth,$thumbHeight,imagesx($sourceImage),imagesy($sourceImage));
			imagejpeg($targetImage,$pasta.$nomearquivo."_".$w.$h.".".$extensao);
			$thumbName = $pasta.$nomearquivo."_".$w.$h.".".$extensao;
		}
		if($extensao == "gif" or $extensao == "GIF"){
			// Beyond this point is simply code.
			$sourceImage = imagecreatefromgif($imagem);
			$sourceWidth = imagesx($sourceImage);
			$sourceHeight = imagesy($sourceImage);

			$targetImage = imagecreatetruecolor($thumbWidth,$thumbHeight);
			imagecopyresampled($targetImage,$sourceImage,0,0,0,0,$thumbWidth,$thumbHeight,imagesx($sourceImage),imagesy($sourceImage));
			imagegif($targetImage, $pasta.$nomearquivo."_".$w.$h.".".$extensao);
			$thumbName = $pasta.$nomearquivo."_".$w.$h.".".$extensao;
		}
		if($extensao == "png" or $extensao == "PNG"){
			// Beyond this point is simply code.
			$sourceImage = imagecreatefrompng($imagem);
			$sourceWidth = imagesx($sourceImage);
			$sourceHeight = imagesy($sourceImage);

			$targetImage = imagecreatetruecolor($thumbWidth,$thumbHeight);
			imagecopyresampled($targetImage,$sourceImage,0,0,0,0,$thumbWidth,$thumbHeight,imagesx($sourceImage),imagesy($sourceImage));
			imagepng($targetImage, $pasta.$nomearquivo."_".$w.$h.".".$extensao);
			$thumbName = $pasta.$nomearquivo."_".$w.$h.".".$extensao;
		}
	}else{
		$thumbName = $pasta.$nomearquivo."_".$w.$h.".".$extensao;
	}
	return $thumbName;
}
                $fotodestaque = '<a href="upl/d/'.$g["fotodestaque"].'" target="_blank"><img src="'.img("upl/d/".$g["fotodestaque"],100,130).'" style="float: left; margin-right: 8px;"></a>';
        }
        ?>
        <?= $fotodestaque.$g["texto"] ?>
        <div style="clear:both"></div>
        <div style="border-left: solid 3px #ccc; font-size: 10px; font-style: italic; padding-left: 4px; margin-top: 30px;">
            Publicado em <?= $datapub ?>
        </div>
    </div>
    <?
}
?>