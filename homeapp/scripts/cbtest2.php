
<html>
<? 
/*
Rotina para gerar códigos de barra padrão 2of5 ou 25.
Desenvolvido por: Jefferson Otoni
email     -> anjopuc@bol.com.br
Licença   -> GNU GENERAL PUBLIC LICENSE
Categoria -> Algoritmos
Contribuição -> Vanclei Picolli
email        -> vanclei@terra.com.br
versão 3.0
####################
Orientado a Objeto
####################
*/

class WBarCode {
//variaveis privadas
var $_fino;
var $_largo;
var $_altura;

//variaveis publicas
var $BarCodes = array();
var $texto;
var $matrizimg;
var $f1;
var $f2;
var $f;
var $i;

//Construtor da class

function WBarCode($Valor){
$this->fino=1;
$this->largo=3;
$this->altura=30;

if (empty($this->BarCodes[0]))
  {

    $this->BarCodes[0]="00110";
    $this->BarCodes[1]="10001";
    $this->BarCodes[2]="01001";
    $this->BarCodes[3]="11000";
    $this->BarCodes[4]="00101";
    $this->BarCodes[5]="10100";
    $this->BarCodes[6]="01100";
    $this->BarCodes[7]="00011";
    $this->BarCodes[8]="10010";
    $this->BarCodes[9]="01010";


	for ($this->f1=9; $this->f1>=0; $this->f1=$this->f1-1)
    {
      for ($this->f2=9; $this->f2>=0; $this->f2=$this->f2-1)
      {
        $this->f=$this->f1*10+$this->f2;
        $this->texto="";
        for ($this->i=1; $this->i<=5; $this->i=$this->i+1)
        {
$this->texto=$this->texto.substr($this->BarCodes[$this->f1],$this->i-1,1).
	substr($this->BarCodes[$this->f2],$this->i-1,1);
        } 
        $this->BarCodes[$this->f]=$this->texto;
      } 

    } 

  } 

//Desenho da barra
// Guarda inicial
$this->matrizimg.= "
<img src=p.gif width=$this->fino height=$this->altura border=0><img 
src=b.gif width=$this->fino height=$this->altura border=0><img
src=p.gif width=$this->fino height=$this->altura border=0><img
src=b.gif width=$this->fino height=$this->altura border=0><img 
";

$this->texto=$Valor;
if (strlen($this->texto)%2<>0)
 {
  $this->texto="0".$this->texto;
  } 
// Draw dos dados
while(strlen($this->texto)>0)
  {
$this->i=intval(substr($this->texto,0,2));
$this->texto=substr($this->texto,strlen($this->texto)-(strlen($this->texto)-2));
$this->f=$this->BarCodes[$this->i];
for ($this->i=1; $this->i<=10; $this->i=$this->i+2)
    {
      if (substr($this->f,$this->i-1,1)=="0")
      {
       $this->f1=$this->fino;
      }
        else
      {

        $this->f1=$this->largo;
      } 

$this->matrizimg.="src=p.gif width=$this->f1 height=$this->altura border=0><img 
	";
   if (substr($this->f,$this->i+1-1,1)=="0")
      {

        $this->f2=$this->fino;
      }
        else
      {

        $this->f2=$this->largo;
      } 

$this->matrizimg.= "src=b.gif width=$this->f2 height=$this->altura border=0><img ";
	}
}

$this->matrizimg.= "src=p.gif width=$this->largo height=$this->altura border=0><img src=b.gif width=$this->fino height=$this->altura border=0><img 
src=p.gif width=1 height=$this->altura border=0>";

//escreve todo o codigo da barra na tela...
echo $this->matrizimg;

    }//fim da function
}//fim da Class

//Substitua o valor do parâmetro abaixo pelo número do código de barras.
//instânciando a classe
$codigobarras = $_GET["codigobarras"];
$bar = new WBarCode($codigobarras);
echo "<br><small>$codigobarras</small>";
?>	

</html>




